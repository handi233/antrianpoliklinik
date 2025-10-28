<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //wajib non modal


class CekKontrolController extends Controller
{
    public function index()
    {
        $nama_instansi = DB::table('settings')->where('id', 1)->value('nama_instansi');

        $today = Carbon::today();

        // Ambil nomor antrian terakhir hari ini
        $Antrian = DB::table('apam_cek_kontrol')
            ->whereDate('datetime', $today)
            ->orderByDesc('no_antrian')
            ->value('no_antrian');

        if ($Antrian) {
            $no = (int) substr($Antrian, 1);
            $lanjut = $no + 1;
        } else {
            $lanjut = 1;
        }


        $no_antrian = 'B' . str_pad($lanjut, 3, '0', STR_PAD_LEFT);


        DB::table('apam_cek_kontrol')->insert([
            'no_antrian' => $no_antrian,
            'poli' => 'Poli Cek Kontrol',
            'datetime' => Carbon::now(),
        ]);

        // Kirim ke view
        return view('cekkontrolprint', [
            'nama_instansi' => $nama_instansi,
            'no_antrian' => $no_antrian,
            'poli' => 'Cek Kontrol',
            'datetime' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function print(Request $request)
    {

        $validated = $request->validate([
            'poli' => 'required|string',
            'datetime' => 'required|date',
        ]);

        $countToday = DB::table('apam_cek_kontrol')->whereDate('datetime', Carbon::today())->count();

        $no_antrian = 'B' . str_pad($countToday + 1, 3, '0', STR_PAD_LEFT);

        // Simpan ke database
        $id = DB::table('apam_cek_kontrol')->insertGetId([
            'no_antrian' => $no_antrian,
            'poli' => $validated['poli'],
            'datetime' => Carbon::now(),
        ]);

        // Redirect ke route
        return redirect()->route('cekkontrolprint', ['id' => $id]);
    }

    public function printt($id)
    {
        // Ambil data antrian 
        $data = DB::table('apam_cek_kontrol')->where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $nama_instansi = DB::table('settings')->where('id', 1)->value('nama_instansi');

        return view('cekkontrolrint', [
            'nama_instansi' => $nama_instansi,
            'no_antrian' => $data->no_antrian,
            'poli' => $data->poli,
            'datetime' => Carbon::parse($data->datetime)->format('Y-m-d H:i:s'),
        ]);
    }
}

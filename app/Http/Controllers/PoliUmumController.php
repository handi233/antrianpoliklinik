<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliUmumController extends Controller
{    //AMBIL DB dari setting 
    public function index()
    {
        $nama_instansi = DB::table('settings')->where('id', 1)->value('nama_instansi');

        //  nomor antrian terakhir hari ini,
        $Antrian = DB::table('apam_poli_umum')
            ->whereDate('datetime', date('Y-m-d'))
            ->orderByDesc('no_antrian')
            ->value('no_antrian');

        //agar tidak duplikat nomer now
        if ($Antrian) {
            $lastNo = (int) substr($Antrian, 1);
            $lanjut = $lastNo + 1;
        } else {
            $lanjut = 1;
        }

        // Buat nomor antrian baru
        $no_antrian = 'A' . str_pad($lanjut, 3, '0', STR_PAD_LEFT);

        // save data antrian ke tabel
        DB::table('apam_poli_umum')->insert([
            'no_antrian' => $no_antrian,
            'poli' => 'Poli Umum',
            'datetime' => now(),
        ]);

        // Kirim ke view
        return view('poliumumprint', [
            'nama_instansi' => $nama_instansi,
            'no_antrian' => $no_antrian,
            'poli' => 'Poli Umum',
            'datetime' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    public function print(Request $request)
    {
        // Validasi data request
        $validated = $request->validate([
            'poli' => 'required|string',
            'datetime' => 'required|date',
        ]);

        //  jumlah antrian hari ini
        $count = DB::table('apam_poli_umum')->whereDate('datetime', date('Y-m-d'))->count();

        //nomor antrian berikutnya
        $no_antrian = 'A' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        //  ambil data get dari db perintah GetId
        $id = DB::table('apam_poli_umum')->insertGetId([
            'no_antrian' => $no_antrian,
            'poli' => $validated['poli'],
            'datetime' => now(),
            'status' => 'menunggu',

        ]);

        // Redirect ke route cetak dengan parameter ID
        return redirect()->route('poliumumprintt', ['id' => $id]);
    }

    public function printt($id)
    {
        // Ambil data antrian berdasar ID
        $data = DB::table('apam_poli_umum')->where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $nama_instansi = DB::table('settings')->where('id', 1)->value('nama_instansi');

        return view('poliumumprint', [
            'nama_instansi' => $nama_instansi,
            'no_antrian' => $data->no_antrian,
            'poli' => $data->poli,
            'datetime' => date('Y-m-d H:i:s', strtotime($data->datetime)),
        ]);
    }
}

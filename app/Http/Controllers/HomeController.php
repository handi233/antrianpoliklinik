<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        //ambil data database

        $setting = DB::table('settings')->first();
        $today = Carbon::now()->format('Y-m-d');
        // get db poli umum
        $antrian = DB::table('apam_poli_umum')
            ->whereDate('datetime', $today)
            ->orderByRaw("CAST(SUBSTRING(no_antrian, 2) AS UNSIGNED) ASC")
            ->get();

        //untuk poli kontrol
        $antriann = DB::table('apam_cek_kontrol')
            ->whereDate('datetime', $today)
            ->orderByRaw("CAST(SUBSTRING(no_antrian, 2) AS UNSIGNED) ASC")
            ->get();

        return view('home', [
            'logo' => $setting->logo ?? '',
            'antrian' => $antrian,
            'antriann' => $antriann,
        ]);
    }
    public function callAntrian(Request $request)
    {

        $antrian = DB::table('apam_poli_umum')->where('id', $request->id)->first();

        if ($antrian) {
            // Update status jadi dipanggil
            DB::table('apam_poli_umum')
                ->where('id', $request->id)
                ->update(['status' => 'dipanggil']);

            return back()->with('success', 'Antrian telah dipanggil.');
        }
        return back()->with('error', 'Data tidak ditemukan.');
    }

    public function callAntrianKontrol(Request $request)
    {
        //next untuk cek kontrol
        $antriann = DB::table('apam_cek_kontrol')->where('id', $request->id)->first();

        if ($antriann) {
            // Update status jadi dipanggil
            DB::table('apam_cek_kontrol')
                ->where('id', $request->id)
                ->update(['status' => 'dipanggil']);

            return back()->with('success', 'Antrian telah dipanggil.');
        }

        return back()->with('error', 'Data tidak ditemukan.');
    }
}

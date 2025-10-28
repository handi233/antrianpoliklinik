<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //wajib non modal
use Carbon\Carbon;

class DisplayPoliklinik extends Controller
{
    public function index()
    {
        //ambil dari db setting
        $setting = DB::table('settings')->where('id', 1)->first();
        //ambil dari db users
        $full = DB::table('users')->where('id', 1)->first();
        //ambil dari db poli_umum
        $antrian_terakhir = DB::table('apam_poli_umum')
            ->where('status', 'dipanggil')
            ->whereDate('datetime', Carbon::today())
            ->orderBy('datetime', 'desc')
            ->first();
        //ambil dari db cek control
        $antrian_terakhirr = DB::table('apam_cek_kontrol')
            ->where('status', 'dipanggil')
            ->whereDate('datetime', Carbon::today())
            ->orderBy('datetime', 'desc')
            ->first();

        // Ambil url video YouTube dari kolom settings

        $youtube_url_raw = $setting->video1 ?? '';

        // mengubah ke embed URL
        $youtube_url = $this->ubahYoutubeKeEmbed($youtube_url_raw);


        return view('displaypoliklinik', [
            'nama_instansi' => $setting->nama_instansi ?? '',
            'logo' => $setting->logo ?? '',
            'fullnama' => $full->fullnama ?? '',
            'antrian_terakhir' => $antrian_terakhir,
            'antrian_terakhirr' => $antrian_terakhirr,
            'video1' => $youtube_url,
        ]);
    }

    private function ubahYoutubeKeEmbed($url)
    {
        if (strpos($url, 'watch?v=') !== false) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            return 'https://www.youtube.com/embed/' . ($query['v'] ?? '');
        }
        return $url;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApamController extends Controller
{
    public function index()
    {
        //get dari DB
        $setting = DB::table('settings')->where('id', 1)->first();

        return view('apam', [
            'nama_instansi' => $setting->nama_instansi,
            'logo' => $setting->logo,
        ]);
    }
}

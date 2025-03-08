<?php

namespace App\Http\Controllers\ControllerSiswa;

use App\Models\Gallery;
use App\Models\Pengumuman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SdController extends Controller
{
    public function index() 
    {
        $pengumumans = Pengumuman::all();
        $gallery = Gallery::all();
        return view('siswa.sd.landingpage', compact('pengumumans', 'gallery'));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}

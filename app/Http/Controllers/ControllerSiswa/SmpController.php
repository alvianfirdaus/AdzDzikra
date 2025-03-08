<?php

namespace App\Http\Controllers\ControllerSiswa;

use App\Models\Gallery;
use App\Models\Pengumuman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmpController extends Controller
{
    public function index() 
    {
        $pengumumans = Pengumuman::all();
        $gallery = Gallery::all();
        return view('siswa.smp.landingpage', compact('pengumumans', 'gallery'));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}

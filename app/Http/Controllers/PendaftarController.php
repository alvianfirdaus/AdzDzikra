<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Pembayaran;
use App\Models\Siswa;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\PDF;

class PendaftarController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        if ($user->level == 'admin') {
            $pendaftars = Pendaftar::with('pembayaran')->paginate(5)->appends($request->query());
            return view('admin.pendaftar', compact('pendaftars'));
        } elseif ($user->level == 'panitia') {
            $pendaftars = Pendaftar::with('pembayaran')->paginate(5)->appends($request->query());
            return view('panitia.pendaftar', compact('pendaftars'));
        } elseif ($user->level == 'user') {
            $pendaftars = Pendaftar::where('user_id', $user->id)->paginate(5)->withQueryString();
            $pembayaran = [];

            if ($pendaftars->isNotEmpty()) {
                $pembayaran = Pembayaran::whereIn('pendaftar_id', $pendaftars->pluck('id'))->paginate(1)->withQueryString();
            }

            return view('user.dashboard.pendaftar', compact('pendaftars', 'pembayaran'));
        }

        // Handle other levels or no level assigned
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function store(Request $request)
    {
        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_wali' => 'required',
            'user_jenKel' => 'required',
            'pendaftar_jenKel' => 'required',
            'alamat' => 'required',
            'tglLahir' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'akte' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jenjangPend' => 'required|in:SMP,MA',
            'nik' => 'required|unique:pendaftars,nik',
            'tempatLahir' => 'required',
            'noHp' => 'required',
        ]);
        $validator->after(function ($validator) use ($request) {
            $existingPendaftar = Pendaftar::where('name', $request->input('name'))
                ->where('tempatLahir', $request->input('tempatLahir'))
                ->where('tglLahir', $request->input('tglLahir'))
                ->first();

            if ($existingPendaftar) {
                $validator->errors()->add('name', 'Sudah ada Pendaftar dengan data Nama, Tempat Lahir, dan Tanggal Lahir tersebut.');
            }
        });
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload image files
        $image_name = $request->file('foto')->store('images', 'public');
        $akte_name = $request->file('akte')->store('images', 'public');
        $kk_name = $request->file('kk')->store('images', 'public');

        // Find the existing user
        $user = User::findOrFail($request->input('user_id'));

        // Update the user's fields
        $user->jenKel = $request->input('user_jenKel');
        $user->noHp = $request->input('noHp');
        $user->save();

        // Create a new pendaftar
        $pendaftar = new Pendaftar;
        $pendaftar->user_id = $user->id;
        $pendaftar->name = $request->input('name');
        $pendaftar->name_wali = $request->input('name_wali');
        $pendaftar->jenKel = $request->input('pendaftar_jenKel');
        $pendaftar->alamat = $request->input('alamat');
        $pendaftar->tglLahir = $request->input('tglLahir');
        $pendaftar->foto = $image_name;
        $pendaftar->akte = $akte_name;
        $pendaftar->kk = $kk_name;
        $pendaftar->jenjangPend = $request->input('jenjangPend');
        $pendaftar->nik = $request->input('nik');
        $pendaftar->tempatLahir = $request->input('tempatLahir');
        $pendaftar->status = 'pending';
        $pendaftar->save();

        // Set jumlah berdasarkan jenjangPend
        if ($pendaftar->jenjangPend == 'SMP') {
            $jml_up = 750000;
            $jumlah = 1000000;
            $jml_perssek = 1500000;
            $jml_pangpon = 1000000;
            $jml_perpon = 1500000;
        } elseif ($pendaftar->jenjangPend == 'MA') {
            $jml_up = 750000;
            $jumlah = 1000000;
            $jml_perssek = 1500000;
            $jml_pangpon = 1000000;
            $jml_perpon = 1500000;
        }

        $pembayaran = new Pembayaran;
        $pembayaran->pendaftar_id = $pendaftar->id;
        $pembayaran->jumlah = $jumlah;
        $pembayaran->status = 'bayar'; // Set status sebagai "bayar" secara default
        $pembayaran->jml_up = $jml_up;
        $pembayaran->jml_perssek = $jml_perssek;
        $pembayaran->jml_pangpon = $jml_pangpon;
        $pembayaran->jml_perpon = $jml_perpon;
        $pembayaran->save();

        return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil disimpan.');
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.show', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        if (!$pendaftar->isEditable()) {
            return redirect()->back()->with('error', 'Tidak dapat mengedit pendaftaran yang sudah diproses.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_wali' => 'required',
            'user_jenKel' => 'required',
            'pendaftar_jenKel' => 'required',
            'alamat' => 'required',
            'tglLahir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'akte' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nik' => [
                'required',
                Rule::unique('pendaftars')->ignore($pendaftar->id),
            ],
            'jenjangPend' => 'required|in:SMP,MA',
            'tempatLahir' => 'required',
            'noHp' => 'required',
        ]);

        $validator->after(function ($validator) use ($request, $pendaftar) {
            $existingPendaftar = Pendaftar::where('name', $request->input('name'))
                ->where('tempatLahir', $request->input('tempatLahir'))
                ->where('tglLahir', $request->input('tglLahir'))
                ->where('id', '!=', $pendaftar->id)
                ->first();

            if ($existingPendaftar) {
                $validator->errors()->add('name', 'Sudah ada Pendaftar dengan data Nama, Tempat Lahir, dan Tanggal Lahir tersebut.');
            }
        });
        $level = Auth::user()->level; // Assuming you have the role stored in the 'role' column of the users table

        // Validate input fields
        if ($validator->fails()) {
            if ($level === 'user') {
                return redirect()->route('pendaftar.dashboard')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('modalError', 'Error'); // Add modalError flash data
            } elseif ($level === 'admin') {
                return redirect()->route('admin.pendaftar')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('modalError', 'Error'); // Add modalError flash data
            } elseif ($level === 'panitia') {
                return redirect()->route('panitia.pendaftar')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('modalError', 'Error'); // Add modalError flash data
            }
        }


        // Update pendaftar data
        $pendaftar->name = $request->name;
        $pendaftar->name_wali = $request->name_wali;
        $pendaftar->jenKel = $request->input('pendaftar_jenKel');
        $pendaftar->alamat = $request->alamat;
        $pendaftar->tglLahir = $request->tglLahir;
        $pendaftar->jenjangPend = $request->jenjangPend;
        $pendaftar->nik = $request->input('nik');
        $pendaftar->tempatLahir = $request->tempatLahir;

        // Update image files if provided
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($pendaftar->foto);
            $pendaftar->foto = $request->file('foto')->store('images', 'public');
        }
        if ($request->hasFile('akte')) {
            Storage::disk('public')->delete($pendaftar->akte);
            $pendaftar->akte = $request->file('akte')->store('images', 'public');
        }
        if ($request->hasFile('kk')) {
            Storage::disk('public')->delete($pendaftar->kk);
            $pendaftar->kk = $request->file('kk')->store('images', 'public');
        }

        // Update related User model
        $user = $pendaftar->user;
        $user->noHp = $request->noHp;
        $user->jenKel = $request->input('user_jenKel');
        $user->save();

        $pendaftar->save();


        if ($level === 'user') {
            return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil diperbarui.');
        } elseif ($level === 'admin') {
            return redirect()->route('admin.pendaftar')->with('success', 'Pendaftaran berhasil diperbarui.');
        } elseif ($level === 'panitia') {
            return redirect()->route('panitia.pendaftar')->with('success', 'Pendaftaran berhasil diperbarui.');
        }
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        if (!$pendaftar->isEditable()) {
            return redirect()->route('admin.pendaftar')->with('error', 'Tidak dapat menghapus pendaftaran yang sudah diproses.');
        }

        // Delete image files
        Storage::disk('public')->delete($pendaftar->foto);
        Storage::disk('public')->delete($pendaftar->akte);
        Storage::disk('public')->delete($pendaftar->kk);

        // Delete the pendaftar
        $pendaftar->delete();

        return redirect()->back()->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the Pendaftar record
        $pendaftar = Pendaftar::find($id);

        if (!$pendaftar) {
            // Handle the case when the Pendaftar record is not found
            abort(404);
        }

        // Get the original status
        $originalStatus = $pendaftar->status;

        // Update the status
        $pendaftar->status = $request->input('status');

        // Check if the new status is "accepted" and the associated Pembayaran status is not "terbayar"
        if ($pendaftar->status === 'accepted') {
            $pembayaran = Pembayaran::where('pendaftar_id', $id)->first();
            if (!$pembayaran || $pembayaran->sts_up !== 'terbayar') {
                // Display a message and redirect back
                return redirect()->back()->with('error', 'Uang Pembayaran harus divalidasi sebelum menerima pendaftar');
            }
        }

        $pendaftar->save();

        if ($originalStatus === 'accepted' && $pendaftar->status !== 'accepted') {
            // Delete the corresponding Siswa record
            if ($pendaftar->siswa) {
                $pendaftar->siswa->delete();
            }
        } elseif ($pendaftar->status === 'accepted' && !$pendaftar->siswa) {
            // Generate a unique NIS for the Siswa record
            $maxNIS = DB::table('siswas')->max('nis');
            $newNIS = ($maxNIS ?? 199999) + 1;

            // Create a new Siswa record
            $siswa = new Siswa([
                'pendaftar_id' => $pendaftar->id,
                'nis' => $newNIS,
            ]);
            $siswa->save();
        }

        // Redirect back or do any other desired actionif ($level === 'user') {
            $level = Auth::user()->level; // Assuming you have the role stored in the 'role' column of the users table

            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function printPDF($id)
    {
        $user = Auth::user();

        if ($user->level == 'admin') {
            $pendaftar = Pendaftar::where('id', $id)->first();

            if (!$pendaftar) {
                return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
            }

            $pdf = PDF::loadView('admin.print', ['pendaftar' => $pendaftar]);
            return $pdf->stream();
        } elseif ($user->level == 'panitia') {
            $pendaftar = Pendaftar::where('id', $id)->first();

            if (!$pendaftar) {
                return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
            }

            $pdf = PDF::loadView('panitia.print', ['pendaftar' => $pendaftar]);
            return $pdf->stream();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{


    public function dashboard(Request $request)
    {
        $user = Auth::user();

        if ($user->level == 'admin') {
            $pembayarans = Pembayaran::orderBy('created_at', 'desc');
            $pembayarans = $pembayarans->paginate(5);

            return view('admin.pembayaran', compact('pembayarans'));
        } elseif ($user->level == 'panitia') {
            $pembayarans = Pembayaran::orderBy('created_at', 'desc');
            
            // Filter by name, name_wali, jenjangPend, status
            if ($request->has('search')) {
                $search = $request->input('search');
                $pembayarans = $pembayarans->whereHas('pendaftar', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('name_wali', 'like', '%' . $search . '%')
                        ->orWhere('jenjangPend', 'like', '%' . $search . '%');
                })->orWhere('status', 'like', '%' . $search . '%');
            }

            $pembayarans = $pembayarans->paginate(5);

            return view('panitia.pembayaran', compact('pembayarans'));
        } elseif ($user->level == 'user') {
            $pendaftars = Pendaftar::where('user_id', $user->id)->get();
            $pembayarans = [];

            if ($pendaftars->isNotEmpty()) {
                $pendaftarIds = $pendaftars->pluck('id')->toArray();
                $pembayarans = Pembayaran::whereIn('pendaftar_id', $pendaftarIds)
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            }

            return view('user.dashboard.pembayaran', compact('pembayarans'));
        }

        // Handle other levels or no level assigned
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($pembayaran->status !== 'invalid' && $pembayaran->status !== 'bayar') {
            return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
        }

        return view('pembayaran.edit', compact('pembayaran'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $pembayaran = Pembayaran::findOrFail($id);

        if ($user->level == 'user') {
            if ($pembayaran->status !== 'invalid' && $pembayaran->status !== 'bayar') {
                return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
            }

            $validator = Validator::make($request->all(), [
                'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image_name = $request->file('bukti_pembayaran')->store('images', 'public');

            $pembayaran->bukti_pembayaran = $image_name;
            $pembayaran->status = 'verifikasi'; // Set the status to 'verifikasi' if it was previously 'bayar' or 'invalid'
        } else if ($user->level == 'admin' || $user->level == 'panitia') {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pembayaran->status = $request->status;
        }

        $pembayaran->save();

        if ($user->level === 'user') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'admin') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'panitia') {
            return redirect()->route('pembayaran.show', ['id' => $id])->with('success', 'Status pembayaran berhasil dirubah.');
        }
// dibuat seperti itu bang messi

    }
    public function updatebktperssek(Request $request, $id)
    {
        $user = Auth::user();
        $pembayaran = Pembayaran::findOrFail($id);

        if ($user->level == 'user') {
            if ($pembayaran->sts_perssek !== 'invalid' && $pembayaran->sts_perssek !== 'bayar') {
                return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
            }

            $validator = Validator::make($request->all(), [
                'bkt_perssek' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image_name = $request->file('bkt_perssek')->store('images', 'public');

            $pembayaran->bkt_perssek = $image_name;
            $pembayaran->sts_perssek = 'verifikasi'; // Set the status to 'verifikasi' if it was previously 'bayar' or 'invalid'
        } else if ($user->level == 'admin' || $user->level == 'panitia') {
            $validator = Validator::make($request->all(), [
                'sts_perssek' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pembayaran->sts_perssek = $request->sts_perssek;
        }

        $pembayaran->save();

        if ($user->level === 'user') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'admin') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'panitia') {
            return redirect()->route('pembayaran.show', ['id' => $id])->with('success', 'Status pembayaran berhasil dirubah.');
        }
// dibuat seperti itu bang messi

    }
    public function updatebktpangpon(Request $request, $id)
    {
        $user = Auth::user();
        $pembayaran = Pembayaran::findOrFail($id);

        if ($user->level == 'user') {
            if ($pembayaran->sts_pangpon !== 'invalid' && $pembayaran->sts_pangpon !== 'bayar') {
                return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
            }

            $validator = Validator::make($request->all(), [
                'bkt_pangpon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image_name = $request->file('bkt_pangpon')->store('images', 'public');

            $pembayaran->bkt_pangpon = $image_name;
            $pembayaran->sts_pangpon = 'verifikasi'; // Set the status to 'verifikasi' if it was previously 'bayar' or 'invalid'
        } else if ($user->level == 'admin' || $user->level == 'panitia') {
            $validator = Validator::make($request->all(), [
                'sts_pangpon' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pembayaran->sts_pangpon = $request->sts_pangpon;
        }

        $pembayaran->save();

        if ($user->level === 'user') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'admin') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'panitia') {
            return redirect()->route('pembayaran.show', ['id' => $id])->with('success', 'Status pembayaran berhasil dirubah.');
        }
// dibuat seperti itu bang messi

    }
    public function updatebktperpon(Request $request, $id)
    {
        $user = Auth::user();
        $pembayaran = Pembayaran::findOrFail($id);

        if ($user->level == 'user') {
            if ($pembayaran->sts_perpon !== 'invalid' && $pembayaran->sts_perpon !== 'bayar') {
                return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
            }

            $validator = Validator::make($request->all(), [
                'bkt_perpon' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image_name = $request->file('bkt_perpon')->store('images', 'public');

            $pembayaran->bkt_perpon = $image_name;
            $pembayaran->sts_perpon = 'verifikasi'; // Set the status to 'verifikasi' if it was previously 'bayar' or 'invalid'
        } else if ($user->level == 'admin' || $user->level == 'panitia') {
            $validator = Validator::make($request->all(), [
                'sts_perpon' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pembayaran->sts_perpon = $request->sts_perpon;
        }

        $pembayaran->save();

        if ($user->level === 'user') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'admin') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'panitia') {
            return redirect()->route('pembayaran.show', ['id' => $id])->with('success', 'Status pembayaran berhasil dirubah.');
        }
// dibuat seperti itu bang messi

    }
    public function updatebktup(Request $request, $id)
    {
        $user = Auth::user();
        $pembayaran = Pembayaran::findOrFail($id);

        if ($user->level == 'user') {
            if ($pembayaran->sts_up !== 'invalid' && $pembayaran->sts_up !== 'bayar') {
                return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
            }

            $validator = Validator::make($request->all(), [
                'bkt_up' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image_name = $request->file('bkt_up')->store('images', 'public');

            $pembayaran->bkt_up = $image_name;
            $pembayaran->sts_up = 'verifikasi'; // Set the status to 'verifikasi' if it was previously 'bayar' or 'invalid'
        } else if ($user->level == 'admin' || $user->level == 'panitia') {
            $validator = Validator::make($request->all(), [
                'sts_up' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pembayaran->sts_up = $request->sts_up;
        }

        $pembayaran->save();

        if ($user->level === 'user') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'admin') {
            return redirect()->route('pembayaran.show')->with('success', 'Status pembayaran berhasil dirubah.');
        } elseif ($user->level === 'panitia') {
            return redirect()->route('pembayaran.show', ['id' => $id])->with('success', 'Status pembayaran berhasil dirubah.');
        }
// dibuat seperti itu bang messi

    }
    

    public function print($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Proses cetak pembayaran

        return view('pembayaran.print', compact('pembayaran'));
    }
}

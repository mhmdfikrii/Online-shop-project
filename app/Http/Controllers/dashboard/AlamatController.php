<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Http\Requests\StoreAlamatRequest;
use App\Http\Requests\UpdateAlamatRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Alamat $userAddresses)
    {
        if (auth()->user()->level == 'admin') {
            abort(403);
        }
        // Mengambil alamat pengguna yang sedang terotentikasi
        if (auth()->user()->check == 0) {
            return redirect()->intended('/users_details/' . auth()->user()->token);
        }
        $userAddresses = Alamat::where('user_id', auth()->id())->get();

        // Menampilkan alamat pengguna
        return view('dashboard.alamat_users.index', [
            'title' => 'Alamat Pengiriman',
            'alamat' => $userAddresses,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->level == 'admin') {
            abort(403);
        }
        return view('dashboard.alamat_users.create', [
            'title' => 'Tambah Alamat',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'penerima' => 'required|max:255',
                'nohp_penerima' => 'required|max:255',
                'alamat' => 'required|max:255',
                'kecamatan' => 'required|max:255',
                'kelurahan' => 'required|max:255',
                'RT' => 'required|max:255',
                'RW' => 'required|max:255',
                'kota' => 'required|max:255',
                'provinsi' => 'required|max:255',
                'KodePos' => 'required|max:255',
            ]);

            $validatedData['user_id'] = auth()->user()->id;


            Alamat::create($validatedData);

            return redirect('/alamat')->with('success', 'Alamat berhasil ditambahkan');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors(); {
                return redirect()->back()->withErrors($errors)->with(['fail' => 'Periksa Kembali Data Alamat Anda']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alamat $userAddresses, $id)
    {

        if (auth()->user()->level == 'admin') {
            abort(403);
        }
        // Cek Apakah id Usernya sama dengan yang login?
        $userAddresses = Alamat::with('user')->where('id', $id)->first();
        if ($userAddresses === null || $userAddresses->user === null) {
            abort(403);
        }
        if ($userAddresses->user->id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        // dd($userAddresses);
        return view('dashboard.alamat_users.edit', [
            'title' => 'Edit Alamat',
            'alamat' => $userAddresses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alamat $alamat, $id)
    {

        // dd($request);
        try {
            $alamat =
                Alamat::with('user')->where('id', $id)->first();
            $rules = [
                'penerima' => 'required|max:255',
                'nohp_penerima' => 'required|max:255',
                'alamat' => 'required|max:255',
                'kecamatan' => 'required|max:255',
                'kelurahan' => 'required|max:255',
                'RT' => 'required|max:255',
                'RW' => 'required|max:255',
                'kota' => 'required|max:255',
                'provinsi' => 'required|max:255',
                'KodePos' => 'required|max:255',
            ];

            $validatedData = $request->validate($rules);
            $validatedData['user_id'] = auth()->user()->id;

            // dd($validatedData);
            Alamat::where('id', $alamat->id)->update($validatedData);

            return redirect('/alamat')->with('success', 'Update Data Alamat Anda berhasil');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            // dd($errors);
            return redirect()->back()->withErrors($errors)->with(['fail' => 'Periksa Kembali Data Alamat Anda']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alamat $alamat, $id)
    {
        $alamat = Alamat::with('user')->where('id', $id)->first();
        if ($alamat === null || $alamat->user === null) {
            abort(403);
        }
        if ($alamat->user->id !== auth()->user()->id) {
            abort(403);
        }
        Alamat::destroy($alamat->id);
        return redirect('/alamat')->with('success', 'Berhasil Hapus Data');
    }
}

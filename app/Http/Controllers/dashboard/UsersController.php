<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class UsersController extends Controller
{
    public function update(Request $request, User $users, $token)
    {      
        // dd($request->all());
       $users = User::with('user')->where('token', $token)->first();

        try{
            $rules = [
                'tgldaftar' => 'required|max:255',
                'posisi' => 'required|max:255',
                'nama_perusahaan' => 'required|max:255',
                'alamat_perusahaan' => 'required|max:255',
                'link' => 'required|max:255',
                'proses' => 'required|max:255',
                'keterangan' => 'max:1000',
            ];

            $validatedData = $request->validate($rules);
            $validatedData['user_id'] = auth()->user()->id;

            // dd($validatedData);
            User::where('id', $users->id)->update($validatedData);

            return redirect('/dashboard')->with('Berhasil', 'Update Data Anda berhasil');
        }
        
        catch (ValidationException $e)
        {
             $errors = $e->validator->errors();
            // dd($errors);
            return redirect()->back()->withErrors($errors)->with(['GagalUpdate' => 'Gagal Mengupdate Data, Silahkan Cek kembali data Anda']);
            
        }       
    }
}

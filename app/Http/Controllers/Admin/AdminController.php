<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(User $user, $token)
    {
        $user = User::where('token', $token)->first();
        User::where('token', $token)->first();

        if (!$user || auth()->user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        // dd($user->first_name);
        return view('admin.detail_profile.index', [
            'title' => 'Users Information',
            'user' => $user
        ]);
    }

    public function ViewAdminChangePassword(User $user, $token)
    {
        if (auth()->user()->check == 0) {
            return redirect()->intended('/admin_details/' . auth()->user()->token);
        }

        $user = User::where('token', $token)->first();
        User::where('token', $token)->first();

        if (!$user || auth()->user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        // dd($user->first_name);
        return view('admin.detail_profile.change-password', [
            'title' => 'Keamanan Akun',
            'user' => $user
        ]);
    }

    public function AdminChangePassword(Request $request)
    {
        try {
            $request->merge(['id' => auth()->user()->id]);
            $rules = [
                'id' => 'required',
                'email' => 'required|email:dns|unique:users,email,' . auth()->user()->id,
                'password' => 'nullable|min:5|required_with:confirm_password|same:confirm_password',
            ];
            $validatedData = $request->validate($rules);

            // Hashing password baru jika ada perubahan
            if (!empty($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            // Validasi password lama
            if (!empty($request->old_password)) {
                if (!Hash::check($request->old_password, auth()->user()->password)) {
                    return redirect('/admin-account-scurity/' . auth()->user()->token)->with('fail', 'Gagal Mengupdate Data, Silahkan Cek kembali password/email anda dengan benar');
                }
                unset($validatedData['old_password']);
            }

            User::where('id', $request->id)
                ->update($validatedData);

            return redirect('/admin-account-scurity/' . auth()->user()->token)->with('success', 'Password Akun berhasil diganti.');
        } catch (\Exception $e) {
            return redirect('/admin-account-scurity/' . auth()->user()->token)->with('fail', 'Gagal Mengupdate Data, Silahkan Cek kembali password/email anda dengan benar');
        }
    }

    public function updateAdmin(Request $request, $token)
    {
        User::with('user')->where('token', $token)->first();
        $request->merge(['id' => auth()->user()->id]);

        try {
            $rules = [
                'id' => 'required',
                'username' => 'required|min:3|max:50|unique:users,username,' .
                    auth()->user()->id,
                'first_name' => 'required|min:3|max:50',
                'last_name' => 'required|min:3|max:50',
                'full_name' => 'required|min:3|max:50',
                'gender' => 'required|min:3|max:50',
                'tgllahir' => 'required',
                'nohp' => 'required|min:9|max:15|unique:users,nohp,' . auth()->user()->id,
                'email' => 'required|email:dns|unique:users,email,' . auth()->user()->id,
            ];

            $validatedData = $request->validate($rules);

            // Hitung umur dari tanggal lahir
            $birthdate = Carbon::parse($validatedData['tgllahir']);
            $validatedData['umur'] = $birthdate->age;

            $validatedData['full_name'] = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
            // $validatedData['level'] = 'users';
            $validatedData['check'] = '1';
            User::where('id', $request->id)->update($validatedData);

            $token = auth()->user()->token;
            // dd($validatedData);
            return redirect('/admin_details/' . $token)->with('success', 'Data Anda Berhasil di Simpan');
            // return redirect()->intended('/admin_details/' . $token);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->with(['fail' => 'Gagal Simpan Data, Silahkan Cek kembali data Anda']);
        }
    }

    public function checkUsernameAvailability($username)
    {
        $user = User::where('username', $username)->first();

        if ($user) {
            return response()->json(['available' => false]);
        }

        return response()->json(['available' => true]);
    }
}

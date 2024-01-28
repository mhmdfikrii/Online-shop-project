<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class DetailUsersController extends Controller
{
    public function index(User $user, $token)
    {

        $user = User::where('token', $token)->first();
        User::where('token', $token)->first();

        if (!$user || auth()->user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        // dd($user->first_name);
        return view('dashboard.detail_profile.index', [
            'title' => 'Users Information',
            'user' => $user
        ]);
    }



    public function updateUser(Request $request, $token)
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
            $validatedData['level'] = 'users';
            $validatedData['check'] = '1';


            User::where('id', $request->id)->update($validatedData);

            $token = auth()->user()->token;
            // dd($validatedData);
            return redirect()->intended('/users_details/' . $token);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->with(['GagalUpdate' => 'Gagal Mengupdate Data, Silahkan Cek kembali data Anda']);
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

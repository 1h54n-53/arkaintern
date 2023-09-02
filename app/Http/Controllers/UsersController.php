<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::latest()->get();

        return view('users.show', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'username'     => 'required|min:5',
            'email'   => 'required|min:10',
            'role'   => 'required',
            'password'   => 'required|min:5',
            'picture'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
        $picture = $request->file('picture');
        $picture->storeAs('public/image', $picture->hashName());

        //create post
        User::create([
            'username'     => $request->username,
            'email'   => $request->email,
            'role'   => $request->role,
            'password' => Hash::make($request->password),
            'picture'     => $picture->hashName(),
        ]);

        //redirect to index
        return redirect()->route('users.show')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.show')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function edit(User $user)
    {
        $title = "Edit User";
        return view('users.edit', ['listtitle' => $title, 'user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        // Validate form data
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required|string',
            'password' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture')->getClientOriginalName();
            $photoPath = $request->file('picture')->storeAs('public/image', $picture);
            $user->picture = $picture;
        }
    
        // Update user data
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Hash the password
            'picture' => isset($picture) ? $picture : $user->picture, // Update picture if uploaded, else use existing
        ]);

        $user->save();
    
        // Redirect to index with success message
        return redirect()->route('users.show')->with(['success' => 'Data Berhasil Diperbarui!']);
    }
    

}






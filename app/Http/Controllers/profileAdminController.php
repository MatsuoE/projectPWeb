<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class profileAdminController extends Controller
{
    public function index(){
        return view('dashboard/profile', [
            'title' => 'Edit Profile',
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request){
        $user = auth()->user();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'number' => 'nullable|max:14',
            'image' => 'nullable|image|file|max:1024'
        ]);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile-images');
        }
        User::where('id', $user->id)->update($validatedData);
        return redirect()->to('/dashboard/myprofile')->with('edited', 'Profile has been edited');
    }
}

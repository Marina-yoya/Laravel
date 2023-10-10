<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('verify', compact('user'));
    }

    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);
    $user->email_verified_at = now();
    $user->save();

    
    return redirect()->route('view_all_products')->with('success', 'Email verification successful.');
    }
}

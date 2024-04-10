<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'userId' => 'required|integer|exists:users,id', 
        ]);
        User::where('id', auth()->user()->id)->update(
            [
                'name' => $request->input('name'),
            ]
            );

        return response()->json(
            [
                'message' =>'Successfully updated'
            ]
            );
    }
}

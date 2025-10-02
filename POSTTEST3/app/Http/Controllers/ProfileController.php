<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::with(['gigs', 'skills', 'portfolios', 'reviews'])
            ->findOrFail($id);
        
        return view('profiles.show', compact('user'));
    }
}

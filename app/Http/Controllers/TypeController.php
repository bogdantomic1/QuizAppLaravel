<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function index()
    {
        $userType = Auth::user()->userType;

        if ($userType->title === 'Admin') {
            return view('admin');
        } elseif ($userType->title === 'Igrac') {
            return view('igrac');
        } 
    }
}

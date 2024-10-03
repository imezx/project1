<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $siswa = SiswaModel::all();
        return view("home.index", compact('siswa'));
    }
}

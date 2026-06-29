<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TempatKuliner;

class PublicController extends Controller
{
    public function index()
    {
        $tempatKuliners = TempatKuliner::latest()->get();
        return view('public.index', compact('tempatKuliners'));
    }
}

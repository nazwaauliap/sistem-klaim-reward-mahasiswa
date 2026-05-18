<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;

class HakAksesController extends Controller
{
    public function index()
    {
        $hakAkses = HakAkses::all();

        return view('admin.hak-akses.index', compact('hakAkses'));
    }
}
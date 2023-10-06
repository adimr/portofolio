<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pengaturanHalamanController extends Controller
{
    public function index()
    {
        $datahalaman = halaman::orderBy('judul', 'asc')->get();
        return view("dashboard.pengaturanhalaman.index")->with(
            'datahalaman', $datahalaman);
    }
    public function update(Request $request)
    {
        metadata::updateOrCreate(['meta_key' => '_halaman_about'],['meta_velue' => $request->_halaman_about]);
        metadata::updateOrCreate(['meta_key' => '_halaman_interest'],['meta_velue' => $request->_halaman_interest]);
        metadata::updateOrCreate(['meta_key' => '_halaman_award'],['meta_velue' => $request->_halaman_award]);

        return redirect()->route('pengaturanhalaman.index')->with('success', 'Berhasil mengubah halaman penaturan');
    }
}

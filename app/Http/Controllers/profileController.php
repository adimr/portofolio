<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index(){
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
        '_foto'=> 'mimes:jpge,jpg,png,gif',
        '_email'=> 'required|email',
        ],[
            '_foto.mimes' => 'Foto harus sesui dengan ketentuan JPEG,JPG,PNG,GIF',
            '_email.required' => 'Email tidak boleh kosong',
            '_email.email' => 'Format email tidak sesuai',
        ]);

        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            // update foto (auto hapus ketika update)
            $foto_lama = get_meta_velue('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);

            $foto_file->move(public_path('foto'), $foto_baru);

            metadata::updateOrCreate(['meta_key'=>'_foto'], ['meta_velue' => $foto_baru]);
        }
        metadata::updateOrCreate(['meta_key'=>'_email'], ['meta_velue' => $request->_email]);
        metadata::updateOrCreate(['meta_key'=>'_provinsi'], ['meta_velue' => $request->_provinsi]);
        metadata::updateOrCreate(['meta_key'=>'_kota'], ['meta_velue' => $request->_kota]);
        metadata::updateOrCreate(['meta_key'=>'_nohp'], ['meta_velue' => $request->_nohp]);

        metadata::updateOrCreate(['meta_key'=>'_linkedin'], ['meta_velue' => $request->_linkedin]);
        metadata::updateOrCreate(['meta_key'=>'_facebook'], ['meta_velue' => $request->_facebook]);
        metadata::updateOrCreate(['meta_key'=>'_twitter'], ['meta_velue' => $request->_twitter]);
        metadata::updateOrCreate(['meta_key'=>'_github'], ['meta_velue' => $request->_github]);

        return redirect()->route('profile.index')->with('success','Date telah berhasil di perbarui');
    }
}

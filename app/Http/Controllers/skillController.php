<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class skillController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" .implode("','", $skill). "'";

        return view('dashboard.skill.index')->with(['skill' => $skill]);
    }

    public function update(Request $request){
       if ($request->method() == 'POST') {
        $request->validate([
            '_skill'=>'required',
            '_workflow' => 'required',
        ],[
            '_skill.required'=> 'Silahkan maukan Skill & Tools yang anda kuasai',
            '_workflow.required'=> 'Silakan maukan Workflow yang anda kuasia',
        ]);

        metadata::updateOrCreate(['meta_key' => '_skill'], ['meta_velue' => $request->_skill]);
        metadata::updateOrCreate(['meta_key' => '_workflow'], ['meta_velue' => $request->_workflow]);

        return redirect()->route('skill.index')->with('success', 'DATA SKILL & WORKFLOW BERHASIL DI TAMBAHKAN');
       }
    }
}

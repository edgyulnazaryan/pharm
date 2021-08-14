<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Imports\MaterialImport;
use App\Exports\MaterialExport;
use Maatwebsite\Excel\Facades\Excel;

class MaterialController extends Controller
{
    public function index()
    {
        $material = Material::all();
        return view('Material.material')->with('material', $material);
    }
    
    public function create(Request $request)
    {
        $input = $request->all();
        $material = Material::create($input);
        return view('Material.material');
    }

    public function export()
    {
    	return Excel::download(new MaterialExport, 'material.xlsx');
    }

    public function import(Request $request) 
    {

        Excel::import(new MaterialImport, $request->file('file')->store('temp'));
    	
        return redirect(route('material-create'))->with('success', 'All good!');
    }


}

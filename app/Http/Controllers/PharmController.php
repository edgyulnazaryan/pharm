<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharm;
use App\Models\Drug;
use App\Models\pharm_drugModel;
use App\Models\Material;
use App\Models\Producer;
use App\Imports\PharmImport;
use App\Exports\PharmExport;
use Maatwebsite\Excel\Facades\Excel;

class PharmController extends Controller
{
    public function index()
    {
        $pharm = Pharm::orderBy('id','desc')->paginate(5, ['*'], 'p_page');
        $drug = Drug::orderBy('id','desc')->paginate(5, ['*'], 'd_page'); 
        $material = Material::all();
        $producer = Producer::all();
        $data = Pharm::get();
        return view('welcome', compact(['pharm','material', 'producer', 'drug', 'data']));
    }
    
    public function action(Request $request)
    {
        if($request->ajax())
        {
            if ($request->action == 'edit') 
            {
                $data = array(
                    'name' => $request->name,
                    'city' => $request->city,
                    'address' => $request->address,
                    'phone' => $request->phone,
                );
                Pharm::where('id', $request->id)->update($data);
            }
            if ($request->action == 'delete') 
            {
                Pharm::where('id', $request->id)->delete();
            }
            return request()->json($request);
        }
    }


    public function create(Request $request)
    {
        $input = $request->all();
        $pharm = Pharm::all();
        $data = Pharm::create($input);
        return redirect(route('pharm-show', compact(['pharm'])));
    }

    public function show_drug($id)
    {
        $pharm = Pharm::orderBy('id','desc')->paginate(5, ['*'], 'p_page');
        $producer = Producer::all();
        $material = Material::all();
        
        $data = pharm_drugModel::where('pharm_id', $id)->pluck('drug_id');
        $drug = Drug::whereIn('id', $data)->paginate(5, ['*'], 'd_page');
        
        return view('welcome', compact(['pharm','material', 'producer', 'drug']));
    }

    public function export()
    {
        return Excel::download(new PharmExport, 'pharm.xlsx');
    }

    public function import() 
    {
        return view('Pharm.excel-import');
        
    }

    public function upload(Request $request)
    {
        $pharm = Pharm::all();
        $drug = Drug::all();
        $material = Material::all();
        $producer = Producer::all();
        Excel::import(new PharmImport, $request->file('file')->store('temp'));
        return redirect(route('pharm-show', compact(['pharm','material', 'producer', 'drug'])));
        
    }

    
}

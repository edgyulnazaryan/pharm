<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pharm;
use App\Models\Drug;
use App\Models\pharm_drugModel;
use App\Models\Producer;
use App\Models\Material;
use App\Imports\DrugImport;
use App\Exports\DrugExport;
use Maatwebsite\Excel\Facades\Excel;

class DrugController extends Controller
{
    public function index_json()
    {
        $drug = Drug::all();
        $pharm = Pharm::all();
        return response()->json($drug);
    }
    
    public function index()
    {
        $pharm = Pharm::orderBy('id','desc')->paginate(5, ['*'], 'p_page');
        $drug = Drug::orderBy('id','desc')->paginate(5, ['*'], 'd_page'); 
        $material = Material::all();
        $producer = Producer::all();
        $data = Drug::get();
        
        return view('welcome', compact(['pharm','material', 'producer', 'drug','data']));
    }
    public function create(Request $request)
    {
        
        $material = Material::all();
        $producer = Producer::all();
        $drug = new Drug();
        
        $drug->name = $request -> input('name');
        $drug->state = $request -> input('state');
        $drug->license = $request -> input('license');
        $drug->date = $request -> input('date');
        $drug->marker = $request -> input('marker');
        $drug->producer_id = $request -> input('producer_id');
        $drug->material_id = $request -> input('material_id');
        $drug->pharm_id = json_encode($request -> input('pharm_id'));
        
        $data = $drug -> save();
        $pharm = $drug->pharm()->attach($request -> input('pharm_id'));
        
        return redirect(route('pharm-show'));
    }


    public function show_pharm($id)
    {
        $drug = Drug::orderBy('id','desc')->paginate(5, ['*'], 'd_page');
        $material = Material::all();
        $producer = Producer::all();
        
        
        $data = pharm_drugModel::where('drug_id', $id)->pluck('pharm_id');
        $pharm = Pharm::whereIn('id', $data)->paginate(5, ['*'], 'p_page');
        
        
        return view('welcome', compact(['pharm', 'material', 'producer', 'drug']));
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if ($request->action == 'edit') 
            {
                $data = array(
                    'name' => $request->name,
                    'state' => $request->state,
                    'license' => $request->license,
                    'marker' => $request->marker,
                );
                Drug::where('id', $request->id)->update($data);
            }
            if ($request->action == 'delete') 
            {
                Drug::where('id', $request->id)->delete();
            }
            return request()->json($request);
        }
    }

    public function export() 
    {
        return Excel::download(new DrugExport, 'drug.xlsx');
    }
     
    
    public function import() 
    {
        return view('Drug.import');
    }

    public function upload(Request $request)
    {
        $pharm = Pharm::all();
        $drug = Drug::all();
        $material = Material::all();
        $producer = Producer::all();
        Excel::import(new DrugImport, $request->file('file')->store('temp'));
        return redirect(route('pharm-show', compact(['pharm','material', 'producer', 'drug'])));
    }

}

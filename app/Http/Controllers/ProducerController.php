<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;
use App\Imports\ProducerImport;
use App\Exports\ProducerExport;
use Maatwebsite\Excel\Facades\Excel;

class ProducerController extends Controller
{
    public function index()
    {
        $producer =  Producer::all();
        return view('Producer.create')->with('producer', $producer);
    }
    
    public function create(Request $request)
    {
        $input = $request->all();
        $producer =  Producer::create($input);
        return view('Producer.create');
    }

    public function export()
    {
        return Excel::download(new ProducerExport, 'producer.xlsx');
    }

    public function import(Request $request) 
    {

        Excel::import(new ProducerImport, $request->file('file')->store('temp'));
        
        return redirect(route('producer-create'))->with('success', 'All good!');
    }
}

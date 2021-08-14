@extends('layouts.app')
@section('content')



<div class="container">
<div class="row mt-3">
<div class="col-6">
<form action="{{route('material-create')}}" method="post" class="form_name">
@csrf
<div class="form-group">
    <h4>Ազդող նյութի անվանում</h4>
    <input type="text" name="name" class="form-control" placeholder="Ազդող նյութի անվանում"> 
</div>

<div class="form-group">
    <input type="submit" name="submit" class="btn btn-success col-12" value="Submit"> 
</div>
</form>
</div>
<div class="col-6">
<h4>IMPORT YOUR EXCEL FILE </h4>

<form action="/material/import/" method="POST" enctype="multipart/form-data" class="form_excel">
@csrf
    <div class="form-group">
        <div class="custom-file text-left">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">ԸՆտրեք ֆայլը ՝՝ material.xlsx ՛՛ անվանումով</label>
        </div>
    </div>
    <button class="btn btn-primary col-12">Import data</button>
</form>
</div>
</div>
</div>
@endsection
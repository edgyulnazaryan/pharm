@extends('layouts.app')
@section('content')


<div class="container">
<div class="row mt-3">
<div class="col-6">
<h4>IMPORT YOUR EXCEL FILE </h4>

<form action="{{route('drug-excel-import')}}" method="POST" enctype="multipart/form-data" class="form_excel">
@csrf
    <div class="form-group">
        <div class="custom-file text-left">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">ԸՆտրեք ֆայլը ՝՝ drug.xlsx ՛՛ անվանումով</label>
        </div>
    </div>
    <button class="btn btn-primary col-12">Import data</button>
</form>
</div>
</div>
</div>
@endsection
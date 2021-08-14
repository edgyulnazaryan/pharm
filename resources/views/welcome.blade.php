@extends('layouts.app')
@section('content')
<style type="text/css">
/*body
{
    background: linear-gradient(#ffffff, #0a5ff1, #ffffff);
}*/
</style>


<a href="{{route('drug-excel-export')}}" style="text-decoration: none;"><img src="/download.png" style="width:50px;">Download Excel </a>
<a href="{{route('drug-excel-import')}}" style="text-decoration: none;"><img src="/upload.png" style=" width:50px;">Upload Excel </a>
<a href="{{route('pharm-show')}}"><img src="/recycle.png" style="width:30px;margin-left: 94%; position: relative; bottom: 45px;"></a>
<button class="btn btn-success btn-create_drug" style="margin-left: 97%; position: relative; bottom: 78px;">+</button>


<h1 align='center'>DRUGS</h1>
@csrf
<table id="editable_drug" class="table table-hover table_data_drug" >
<thead>
<tr>
    <th>id</th>
    <th>name</th>
    <th>state</th>
    <th>license</th>
    <th>date</th>
    <th>marker</th>
    <th></th>
</tr>
</thead>
<tbody >


@foreach($drug as $value)
<tr>
    <td>{{$value->id}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->state}}</td>
    <td>{{$value->license}}</td>
    <td>{{$value->date}}</td>
    <td>{{$value->marker}}</td>
    
    <td>
        <a href="{{route('search-pharm', $value->id)}}" class="btn btn-info">Search</a></td>
</tr>    
@endforeach

</tbody>
</table>



<div class="d-flex justify-content-center">
    {{ $drug->appends(['p_page' => $pharm->currentPage()])->links() }}
</div>



<!-- ############################################################################# -->
<!-- ############################################################################# -->
<!-- ############################   PHARMACY ##################################### -->
<!-- ############################################################################# -->
<!-- ############################################################################# -->
<!-- ############################################################################# -->
<a href="{{route('pharm-excel-export')}}" style="text-decoration: none;"><img src="/download.png" style="width:50px;">Download Excel </a>
<a href="{{route('pharm-excel-import')}}" style="text-decoration: none;"><img src="/upload.png" style="width:50px;">Upload Excel </a>
<button class="btn btn-success btn-create_pharm" style="margin-left: 97%">+</button>
<div class="container form-create">
<table class="table table-hover">
    <tr class="form-pharm">
        <form action="{{route('pharm-create')}}" method="post" >
        @csrf
        <td></td>
        <td><input type="text" name="name" class="form-control"></td>
        <td><input type="text" name="city" class="form-control"> </td>
        <td><input type="text" name="address" class="form-control"> </td>
        <td><input type="phone" name="phone" class="form-control"></td>
        <td><input type="time" name="start_work_time" class="form-control"> </td>
        <td><input type="time" name="finish_work_time" class="form-control"> </td>
        <td><input type="submit" name="submit" class="btn btn-success" value="Submit"></td>
        <td><button type="button" class="btn btn-danger cancel">X</button></td>
        </form>
    </tr>
</table>
</div>




<h1 align='center'>PHARMS</h1>
<table id="editable_pharm"  class="table table-hover table_data" >
<thead>
<tr>
    <th>id</th>
    <th>name</th>
    <th>city</th>
    <th>address</th>
    <th>phone</th>
    <th>start_work_time</th>
    <th>finish_work_time</th>
    <th>created_at</th>
    <th></th>
</tr>
</thead>
<tbody>
@if(!isset($pharm))
@foreach($pharm as $val)
@foreach($val->pharm as $value)
<tr>
    <td>{{$value->id}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->city}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->phone}}</td>
    <td>{{$value->start_work_time}}</td>
    <td>{{$value->finish_work_time}}</td>
    <td>{{$value->created_at}}</td>
    <td><a href="{{route('search-drug', $value->id)}}" class="btn btn-info">Search</a></td>
</tr>    
@endforeach
@endforeach
@else
@foreach($pharm as $value)
<tr>
    <td>{{$value->id}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->city}}</td>
    <td>{{$value->address}}</td>
    <td>{{$value->phone}}</td>
    <td>{{$value->start_work_time}}</td>
    <td>{{$value->finish_work_time}}</td>
    <td>{{$value->created_at}}</td>
    <td><a href="{{route('search-drug', $value->id)}}" class="btn btn-info">Search</a></td>
</tr>    
@endforeach
@endif
</tbody>
</table>

<div class="d-flex justify-content-center">
    @if(isset($pharm))
    {{ $pharm->appends(['d_page' => $drug->currentPage()])->links() }}
    @endif
</div>

<!-- ############################################################################# -->
<!-- ############################################################################# -->
<!-- ############################   DRUGS ######################################## -->
<!-- ############################################################################# -->
<!-- ############################################################################# -->
<!-- ############################################################################# -->

<div class="container create_drug_form">
        
<table class="table table-hover" >
    <tbody class="form-drug">
    <tr>
        <form action="{{route('drug-create')}}" method="post" >
        @csrf
        <td></td>
        <td><input type="text" name="name" class="form-control"></td>
        <td>

            <select class="form-control" name="state">
                <option value="Հայաստան">Հայաստան</option>
                <option value="ԱՄՆ">ԱՄՆ</option>
                <option value="Ֆրանսիա">Ֆրանսիա</option>
                <option value="Իտալիա">Իտալիա</option>
                <option value="Գերմանիա">Գերմանիա</option>
                <option value="Ռուսաստան">Ռուսաստան</option>
                <option value="Հնդասկտան">Հնդասկտան</option>
                <option value="Պակիստան">Պակիստան</option>
                <option value="Ղազախստան">Ղազախստան</option>
            </select>

        </td>
        <td><input type="text" name="license" class="form-control"></td>
        <td><input type="date" name="date" class="form-control"></td>
        
        <td>
            <select class="form-control" name="marker">
                <option>Հոգեմետ</option>
                <option>Դիֆիցիտ</option>
                <option>Քիմիաթերապեիա</option>
                <option>Շարքային</option>
                <option>Չգրանցված</option>
            </select>
        </td>

        <td>
            <select class="form-control" name="pharm_id[]" multiple>
                @foreach($pharm as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </td>
        
        <td>
            <select class="form-control" name="producer_id">
            @foreach($producer as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
            @endforeach
            </select>
        </td>
        <td>
            <select class="form-control" name="material_id">
                @foreach($material as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </td>
        
        
        <td><input type="submit" name="submit" class="btn btn-success" value="Submit"> </td>
        <td><button type="button" class="btn btn-danger cancel_drug">X</button></td>
        </form>
    </tr>
    </tbody>
</table>
</div> 

<script type="text/javascript">
$(document).ready(function()
{
    
    $('.form-create').hide();
    $('.form-drug').hide();
    
    $(".btn-create_pharm").click(function() 
    {
        $('.form-pharm').show();
        $('.table_data').prepend($(".form-pharm"))
    })
    $('.cancel').click(function()
    {
        $('.form-pharm').hide();
    })

    $(".btn-create_drug").click(function() 
    {
        $('.form-drug').show();
        $('.table_data_drug').prepend($(".form-drug"))
    })
    $('.cancel_drug').click(function()
    {
        $('.form-drug').hide();
    })

    $.ajaxSetup(
    {
        headers: {
            'X-CSRF-Token' : $('input[name=_token]').val()
        }
    });

    $('#editable_drug').Tabledit(
    {
        url: "{{ route('tabledit_action_drug') }}",
        dataType: 'json',
        buttons: {
            edit: {
                class: 'btn btn-md btn-default',
                html: '<span class="badge badge-warning">Edit</span>',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-default',
                html: '<span class="badge badge-danger">Remove</span>',
                action: 'delete'
            }
            
        },
        columns:{
            identifier: [0, 'id'],
            editable: [[1, 'name'], [2, 'state'], [3, 'license'], [5, 'marker', '{"Հոգեմետ":"Հոգեմետ", "Դիֆիցիտ":"Դիֆիցիտ", "Քիմիաթերապեիա":"Քիմիաթերապեիա", "Շարքային":"Շարքային", "Չգրանցված":"Չգրանցված"}']]
        },
        restorButton: false,
        onSuccess:function(data, textStatus, jqXHR)
        {
            if(data.action == 'delete')
            {
                $("#"+data.id).remove();
            }

        }
    });

    $('#editable_pharm').Tabledit(
    {
        url: "{{ route('tabledit.action') }}",
        dataType: 'json',
        buttons: {
            edit: {
                class: 'btn btn-md btn-default',
                html: '<span class="badge badge-warning">Edit</span>',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-default',
                html: '<span class="badge badge-danger">Remove</span>',
                action: 'delete'
            }
            
        },
        columns:{
            identifier: [0, 'id'],
            editable: [[1, 'name'], [2, 'city'], [3, 'address'], [4, 'phone']]
        },
        restorButton: true,
        onSuccess:function(data, textStatus, jqXHR)
        {
            if(data.action == 'delete')
            {
                $("#"+data.id).remove();
            }

        }
    });
})
</script>



@endsection

        
        
        
    
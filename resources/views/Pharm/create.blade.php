@section('pharm-create')

<div class="container">
<form action="{{route('pharm-create')}}" method="post">
@csrf
<div class="form-group">
	<label for="name">Name</label>
	<input type="text" name="name" class="form-control"> 
</div>

<div class="form-group">
	<label for="city">city</label>
	<input type="text" name="city" class="form-control"> 
</div>

<div class="form-group">
	<label for="address">address</label>
	<input type="text" name="address" class="form-control"> 
</div>


<div class="form-group">
	<label for="phone">phone</label>
	<input type="phone" name="phone" class="form-control"> 
</div>

<div class="form-group">
	<label for="work_time">Start work time</label>
	<input type="time" name="start_work_time" class="form-control"> 
</div>

<div class="form-group">
	<label for="work_time">Finish work time</label>
	<input type="time" name="finish_work_time" class="form-control"> 
</div>


<div class="form-group">
	<input type="submit" name="submit" class="btn btn-success" value="Submit"> 
</div>

</form>

</div>

@endsection
@extends('admin.layouts.admin_layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header bg-danger text-light  text-center"><h2>Users List</h2></div>
				<div class="card-body">
					<form name="search" method="post" action="">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<label>Filter By Age</label>
							<select name="age" class="form-select">
								<option value="">--select age--</option>
								@foreach($dobs as $dob)
								@php
								  $agecal = date_diff(date_create($dob), date_create(date("Y-m-d")));
								@endphp
								<option value="{{$dob}}" @if(old('age') == $dob) selected @endif>{{$agecal->format('%y')}} Year</option>
								@endforeach
							</select>
						</div>
						
						<div class="col-sm-4">
							<label>Filter By Gender</label>
							<select name="gender" class="form-select">
								<option value="">--select gender--</option>
								<option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
								<option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
							</select>
						</div>
						
						<div class="col-sm-4">
							<label>Income Range</label>
							<select name="income_range" class="form-select">
								<option value="">--select income range--</option>
								@foreach($income_rages as $income)
								<option value="{{$income}}" @if(old('income_range')==$income) selected @endif>{{$income}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="col-sm-4">
							<label>Family Type</label>
							<select name="family_type" class="form-select">
								<option value="">--select family type--</option>
								<option value="Joint family" @if(old('family_type')=='Joint family') selected @endif>Joint family</option>
								<option value="Nuclear family" @if(old('family_type')=='Nuclear family') selected @endif>Nuclear family</option>
							</select>
						</div>
						
						<div class="col-sm-4">
							<label>Manglik.</label>
							<select name="manglik." class="form-select">
								<option value="">--select manglik--</option>
								<option value="Yes" @if(old('manglik')=='Yes') selected @endif>Yes</option>
								<option value="No" @if(old('manglik')=='No') selected @endif>No</option>
							</select>
						</div>
						
						<div class="col-sm-4">
							<input type="submit" name="filter" value="Apply Filter" class="btn btn-primary mt-4">
						</div>
					</div>
					
					</form>
				</div>
			</div>
		</div>
		
	</div>
	<table id="myTable" class="table table-striped" style="width:100%">
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Email</th>
				<th>DOB</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Annual Income</th>
				<th>Occupation</th>
				<th>Family Type</th>
				<th>Manglik</th>
				<th>Partner Income Range</th>
				<th>Partner Occupation</th>
				<th>Partner Manglik</th>
			</tr>
		</thead>
		<tbody>
			@if(count($users)>0)
			@foreach($users as $user)
			@php
				  $dateOfBirth = $user->dob;
				  $today = date("Y-m-d");
				  $diff = date_diff(date_create($dateOfBirth), date_create($today));
			@endphp
		
			<tr>
				<td>{{$user->f_name}} {{$user->l_name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->dob}}</td>
				<td>{{$diff->format('%y')}} Year</td>
				<td>{{$user->gender}}</td>
				<td>{{$user->income}}</td>
				<td>{{$user->occupation}}</td>
				<td>{{$user->family_type}}</td>
				<td>{{$user->manglik}}</td>
				<td>{{$user->partner_income_range}}</td>
				<td>{{$user->partner_occupation}}</td>
				<td>{{$user->partner_manglik}}</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<th>Full Name</th>
				<th>Email</th>
				<th>DOB</th>
				<th>Gender</th>
				<th>Annual Income</th>
				<th>Occupation</th>
				<th>Family Type</th>
				<th>Manglik</th>
				<th>Partner Income Range</th>
				<th>Partner Occupation</th>
				<th>Partner Manglik</th>
			</tr>
		</tfoot>
	</table>
</div>
@endsection
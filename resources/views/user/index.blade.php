@extends('user.layouts.user_layout')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center"><h2>Recommended Profiles</h2></div>
		
		@foreach($users as $user)
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header">
					<div class="row">
					<div class="col-sm-6">{{$user->f_name}} {{$user->l_name}}</div>
					<div class="col-sm-6 pull-right">
						@php
						if($user->family_type == $match_factor['pref_partner_family_type'] && $user->manglik == $match_factor['pref_partner_manglik'] && $user->occupation == $match_factor['pref_partner_occupation'] && ($user->income > $match_factor['pref_min_income'] || $user->income < $match_factor['pref_max_income'])){
							$match = '100%';
						}elseif($user->family_type == $match_factor['pref_partner_family_type'] && $user->manglik == $match_factor['pref_partner_manglik'] && ($user->occupation == $match_factor['pref_partner_occupation'] || ($user->income > $match_factor['pref_min_income'] || $user->income < $match_factor['pref_max_income']))){
							$match = '75%';
						}elseif(   $user->family_type == $match_factor['pref_partner_family_type'] && ($user->manglik == $match_factor['pref_partner_manglik'] || $user->occupation == $match_factor['pref_partner_occupation'] || ($user->income > $match_factor['pref_min_income'] || $user->income < $match_factor['pref_max_income']))){
							$match = '50%';
						}elseif($user->family_type == $match_factor['pref_partner_family_type']){
							$match = '25%';
						}
						@endphp
						<strong>Match: </strong>{{$match}}
					</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<img src="{{asset('images/default-user-image.png')}}" class="img-thumbnail">
						</div>
						<div class="col-sm-6">
							<h5 class="mt-2 text-secondary fw-bold">Basic Information</h5>
							<div><strong>DOB: </strong> {{$user->dob}}</div>
							<div><strong>Income: </strong> {{$user->income}}</div>
							<div><strong>Occupation: </strong> {{$user->occupation}}</div>
							<div><strong>Family Type: </strong> {{$user->family_type}}</div>
							<div><strong>Manglik: </strong> {{$user->manglik}}</div>
							<div><strong>Gender: </strong> {{$user->gender}}</div>
						</div>
						<div class="col-sm-6">
							<h5 class="mt-2 text-secondary fw-bold">Partner Preference</h5>
							<div><strong>Income: </strong> {{$user->partner_income_range}}</div>
							<div><strong>Ooccupation: </strong> {{$user->partner_occupation}}</div>
							<div><strong>Family Type: </strong> {{$user->partner_family_type}}</div>
							<div><strong>Manglik: </strong> {{$user->partner_manglik}}</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		@endforeach
	</div>

</div>

@endsection

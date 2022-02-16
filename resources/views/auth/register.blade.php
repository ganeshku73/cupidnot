@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                        <div class="card-header">{{ __('User Register') }}</div>
						
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
								<h4 class="bg-danger text-light p-2 mb-3">Basic Information Section</h4>	
                                <div class="row mb-3">
                                    <label for="f_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="f_name" autofocus required onkeypress="return /[a-z]/i.test(event.key)" maxlength="35">
										@error('f_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								<div class="row mb-3">
                                    <label for="l_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="l_name" autofocus required onkeypress="return /[a-z]/i.test(event.key)" maxlength="35">
										@error('l_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
									<div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
									</div>
                                </div>
								
								<div class="row mb-3">
                                    <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>
									<div class="col-md-6">
                                        <input id="dob" type="text" class="form-control date @error('dob') is-invalid @enderror" name="dob" required autocomplete="D.O.B" required readonly placeholder="dd/mm/yyyy">
										@error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
                                </div>
								
								<div class="row mb-3">
								
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
									<div class="col-md-6">
										<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" value="Male" checked @if(old('gender')=='Male') checked @endif>
										<label class="btn btn-outline-primary" for="male">Male</label>
										
										<input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" value="Female" @if(old('gender')=='Female') checked @endif>
										<label class="btn btn-outline-primary" for="female">Female</label>
										</div>
									</div>
									
                                </div>
								
								
								<div class="row mb-3">
                                    <label for="income" class="col-md-4 col-form-label text-md-end">{{ __('Annual Income') }}</label>

                                    <div class="col-md-6">
                                        <input id="income" type="text" class="form-control @error('income') is-invalid @enderror" name="income" value="{{ old('income') }}" required autocomplete="income" autofocus required onkeypress="return /[0-9]/i.test(event.key)" maxlength="25">
										@error('income')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								<div class="row mb-3">
                                    <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation ') }}</label>

                                    <div class="col-md-6">
                                        <select name="occupation" class="form-select @error('occupation') is-invalid @enderror" required>
											<option value=""> -- Select Occupation --</option>
											<option value="Private job" @if(old('occupation') == 'Private job') selected @endif> Private Job </option>
											<option value="Government Job" @if(old('occupation') == 'Government Job') selected @endif> Government Job </option>
											<option value="Business" @if(old('occupation') == 'Business') selected @endif> Business </option>
										</select>
										@error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								<div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Family Type ') }}</label>

                                    <div class="col-md-6">
                                        <select name="family_type" class="form-select @error('family_type') is-invalid @enderror" required>
											<option value=""> -- Select Occupation --</option>
											<option value="Joint Family" @if(old('family_type') == 'Joint family') selected @endif> Joint Family </option>
											<option value="Nuclear family" @if(old('family_type') == 'Nuclear family') selected @endif> Nuclear family </option>
										</select>
										@error('family_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								<div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>

                                    <div class="col-md-6">
                                        <select name="manglik" class="form-select @error('manglik') is-invalid @enderror" required>
											<option value=""> -- Select --</option>
											<option value="Yes" @if(old('manglik') == 'Yes') selected @endif> Yes </option>
											<option value="No" @if(old('manglik') == 'No') selected @endif> No </option>
										</select>
										@error('manglik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								
								
								<h4 class="bg-danger text-light p-2 mb-3">Partner Preference</h4>
								
								
								 

								
								<div class="row mb-3">
                                    
									<label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Annual Income') }}</label>
									<div class="col-md-6">
										<input type="text" id="amount" readonly class="text-primary" name="partner_income_range" style="border:0; font-weight:bold;">
										<div id="slider-range"></div>	
									</div>
								</div>
								
								
								<div class="row mb-3">
                                    <label for="occupation" class="col-md-4 col-form-label text-md-end">{{ __('Occupation ') }}</label>

                                    <div class="col-md-6">
                                        <select name="partner_occupation" class="form-select @error('partner_occupation') is-invalid @enderror" required>
											<option value=""> -- Select Occupation --</option>
											<option value="Private job" @if(old('partner_occupation') == 'Private job') selected @endif> Private Job </option>
											<option value="Government Job" @if(old('partner_occupation') == 'Government Job') selected @endif> Government Job </option>
											<option value="Business" @if(old('partner_occupation') == 'Business') selected @endif> Business </option>
										</select>
										@error('partner_occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								<div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Family Type ') }}</label>

                                    <div class="col-md-6">
                                        <select name="partner_family_type" class="form-select @error('partner_family_type') is-invalid @enderror" required>
											<option value=""> -- Select Occupation --</option>
											<option value="Joint Family" @if(old('partner_family_type') == 'Joint family') selected @endif> Joint Family </option>
											<option value="Nuclear family" @if(old('partner_family_type') == 'Nuclear family') selected @endif> Nuclear family </option>
										</select>
										@error('partner_family_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								<div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Manglik') }}</label>

                                    <div class="col-md-6">
                                        <select name="partner_manglik" class="form-select @error('partner_manglik') is-invalid @enderror" required>
											<option value=""> -- Select --</option>
											<option value="Yes" @if(old('partner_manglik') == 'Yes') selected @endif> Yes </option>
											<option value="No" @if(old('partner_manglik') == 'No') selected @endif> No </option>
											<option value="Both" @if(old('partner_manglik') == 'Both') selected @endif> Both </option>
										</select>
										@error('partner_manglik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
								
								
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

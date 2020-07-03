@extends('layouts.guest')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Content
================================================== -->

<!-- Container -->
<div class="container margin-top-50 margin-bottom-50">

	<div class="my-account">

		<ul class="tabs-nav">
			<li class=""><a href="#tab1">Login</a></li>
			<li><a href="#tab2">Register</a></li>
		</ul>

		<div class="tabs-container">
			<!-- Login -->
			<div class="tab-content" id="tab1" style="display: none;">
				<form method="post" class="login" action="{{ route('login') }}">
					@csrf
					<p class="form-row form-row-wide">
						<label for="phone">Phone Number:
							<i class="ln ln-icon-Male"></i>
							<input type="number" class="input-text" name="phone" id="phone" value="" />
						</label>
						@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</p>

					<p class="form-row form-row-wide">
						<label for="password">Password:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="password" name="password" id="password"/>
						</label>
						@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</p>

					<p class="form-row">
						<input type="submit" class="button border fw margin-top-10" name="login" value="Login" />
					</p>
					@if (Route::has('password.request'))
					<p class="lost_password">
						<a href="#" >Lost Your Password?</a>
					</p>
				    @endif
					
				</form>
			</div>

			<!-- Register -->
			<div class="tab-content" id="tab2" style="display: none;">

				<form method="post" class="register" action="{{ route('register') }}">
					@csrf
				<p class="form-row form-row-wide">
					<label for="username2">Fullname:
						<i class="ln ln-icon-Male"></i>
						<input type="text" class="input-text" name="name" value=""  required/>
					</label>
					@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</p>

				<p class="form-row form-row-wide">
					<label for="email2">Phone Number:
						<i class="ln ln-icon-Phone"></i>
						<input type="number" class="input-text" name="phone" value="" required />
					</label>
					@error('phone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				</p>
					
				<!-- <p class="form-row form-row-wide">
					<label for="email2">Email Address:
						<i class="ln ln-icon-Mail"></i>
						<input type="email" class="input-text" name="email" id="email2" value="" />
					</label>
				</p> -->
				
				<div class="row" style="margin-bottom:15px">
					<div class="col-md-6">

					<label for="password1">Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password" id="password1" required/>
						
					</label>
					@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="col-md-6">
					<label for="password2">Confirm Password:
						<i class="ln ln-icon-Lock-2"></i>
						<input class="input-text" type="password" name="password_confirmation" id="password2"/>
					</label>
				</div>
				</div>

				<!-- <p class="form-row form-row-wide">
					<label for="username2">Address:
							<i class="ln ln-icon-Location-2"></i>
							<input type="text" class="input-text" name="address" value="" />
					</label>
				</p> -->
				<div class="row" style="margin-bottom:15px">
					<div class="col-md-6">
					<label for="username2">State:
						<select
							onchange="toggleLGA(this);"
							name="state"
							id="state"
							style="height: 47px;"
							>
						<option value="" selected="selected">- Select -</option>
						<option value="Abia">Abia</option>
						<option value="Adamawa">Adamawa</option>
						<option value="AkwaIbom">AkwaIbom</option>
						<option value="Anambra">Anambra</option>
						<option value="Bauchi">Bauchi</option>
						<option value="Bayelsa">Bayelsa</option>
						<option value="Benue">Benue</option>
						<option value="Borno">Borno</option>
						<option value="Cross River">Cross River</option>
						<option value="Delta">Delta</option>
						<option value="Ebonyi">Ebonyi</option>
						<option value="Edo">Edo</option>
						<option value="Ekiti">Ekiti</option>
						<option value="Enugu">Enugu</option>
						<option value="FCT">FCT</option>
						<option value="Gombe">Gombe</option>
						<option value="Imo">Imo</option>
						<option value="Jigawa">Jigawa</option>
						<option value="Kaduna">Kaduna</option>
						<option value="Kano">Kano</option>
						<option value="Katsina">Katsina</option>
						<option value="Kebbi">Kebbi</option>
						<option value="Kogi">Kogi</option>
						<option value="Kwara">Kwara</option>
						<option value="Lagos">Lagos</option>
						<option value="Nasarawa">Nasarawa</option>
						<option value="Niger">Niger</option>
						<option value="Ogun">Ogun</option>
						<option value="Ondo">Ondo</option>
						<option value="Osun">Osun</option>
						<option value="Oyo">Oyo</option>
						<option value="Plateau">Plateau</option>
						<option value="Rivers">Rivers</option>
						<option value="Sokoto">Sokoto</option>
						<option value="Taraba">Taraba</option>
						<option value="Yobe">Yobe</option>
						<option value="Zamfara">Zamafara</option>
						</select>
					</label>
					@error('state')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="col-md-6">
					<label for="username2">LGA:
						<select
							name="lga"
							id="lga"
							class="select-lga"
							style="height: 47px;"
							required
							>
							</select>
					</label>
					@error('lga')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					
					</div>
				<div class="row" style="margin-bottom:15px">
					<div class="col-md-6">
					<label for="email2">Category:
						<select
							name="type"
							style="height: 47px;"
							required
						>
						<option value="" selected="selected">- Select -</option>
						<option value="4">Artisan</option>
						<option value="3">Vendor</option>

						</select>
					</label>
					@error('type')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					</div>
					<div class="col-md-6">
					<label for="email2">Experience:
						<select
							name="experience"
							style="height: 47px;"
							required
						>
						<option value="" selected="selected">- Select -</option>
						<option value="0to3">0 - 3 years</option>
						<option value="3to5">3 - 5 years</option>
						<option value="5to10">5 - 10 years</option>
						</select>
					</label>
					@error('experience')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					</div>

				<p class="form-row">
					<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
				</p>

				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('styles')
<style>
.invalid-feedback strong{
	color:#ff0000 !important;
}
label, legend {
	margin-bottom: 0;
}

.my-account label input {
	margin-top:0;
}
</style>
@endsection

@section('scripts')
<script src="{{ asset('scripts/lga.min.js') }}"></script>
@endsection

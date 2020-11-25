@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="register-form-wrapper">
                <span class="register-form-header">
                    register
                </span>
                <div class="register-form-section">
                    <form method="POST" action="{{ route('user.register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <select name="designation" class="form-control dropdown_option">
                                    <option disabled selected>---Choose Designation---</option>
                                    <option value="reporter">Reporter</option>
                                    <option value="blogger">Blogger</option>
                                    <option value="eventManager">Event Manager</option>
                                </select>
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

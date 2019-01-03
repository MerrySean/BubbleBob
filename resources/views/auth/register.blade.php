@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- firstname --}}
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('firstname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- lastname --}}
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- date of birth --}}
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- age --}}
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div id="ageWrapper" class="col-md-6">
                                <input id="age" type="text" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required readonly autofocus>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- username --}}
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- user type --}}
                        <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select {{ $errors->has('user_type') ? ' is-invalid' : '' }}" name="user_type" id="user_type" required autofocus>
                                    @if (!old('user_type'))
                                        <option selected>Choose...</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>                                        
                                    @else
                                        <option value="admin" {{ old("user_type") == "admin" ? "selected" : "" }}>Admin</option>
                                        <option value="user" {{ old("user_type") == "user" ? "selected" : "" }}>User</option>
                                    @endif
                                </select>
                                @if ($errors->has('user_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Secret Question --}}
                        <div class="form-group row">
                            <label for="secret_question" class="col-md-4 col-form-label text-md-right">{{ __('Security Question') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select {{ $errors->has('secret_question') ? ' is-invalid' : '' }}" name="secret_question" id="secret_question" required autofocus>
                                    @if (!old('secret_question'))
                                        <option selected>Choose...</option>
                                        <option value="What was the name of your elementary / primary school?">What was the name of your elementary / primary school?</option>
                                        <option value="In what city or town does your nearest sibling live?">In what city or town does your nearest sibling live?</option>                                        
                                        <option value="What time of the day were you born? (hh:mm)">What time of the day were you born? (hh:mm)</option>                                        
                                    @else
                                        <option value="What was the name of your elementary / primary school?"
                                                {{ old("secret_question") == "What was the name of your elementary / primary school?" ? "selected" : "" }}>
                                            What was the name of your elementary / primary school?</option>
                                        <option value="In what city or town does your nearest sibling live?"
                                                {{ old("secret_question") == "In what city or town does your nearest sibling live?" ? "selected" : "" }}>
                                            In what city or town does your nearest sibling live?</option>                                        
                                        <option value="What time of the day were you born? (hh:mm)"
                                                {{ old("secret_question") == "What time of the day were you born? (hh:mm)" ? "selected" : "" }}>
                                            What time of the day were you born? (hh:mm)</option>
                                    @endif
                                </select>
                                @if ($errors->has('secret_question'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secret_question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- secret Answer --}}
                        <div class="form-group row">
                            <label for="secret_answer" class="col-md-4 col-form-label text-md-right">{{ __('Secret Answer') }}</label>

                            <div class="col-md-6">
                                <input id="secret_answer" type="text" class="form-control{{ $errors->has('secret_answer') ? ' is-invalid' : '' }}" name="secret_answer" value="{{ old('secret_answer') }}" required autofocus>

                                @if ($errors->has('secret_answer'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secret_answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- Confirm Password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        {{-- Register Button --}}
                        <div class="form-group row mb-0">
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


@push('scripts')
    <script>
        function setAge(){
            const dob = $('#dob').val()
            const d = new Date(dob);
            const today = new Date();
            const age = Math.floor((today - d) / (365.25 * 24 * 60 * 60 * 1000));
            $('#age').val(age);
            $('#ageError').remove();
            if(Number(age) < 1){
                console.log('wapper')
                $('#ageWrapper').append(`<span id="ageError" class="invalid-feedback d-block" role="alert">
                                    <strong>`+ age +` is very low</strong>
                                </span>`)
            }
        }
        $(document).ready(function(){
            $('#dob').change(function(){
                setAge()
            })
            const rap = Date.parse($('#dob').val())
            if(rap){
                setAge();
            }
        })
    </script>
@endpush
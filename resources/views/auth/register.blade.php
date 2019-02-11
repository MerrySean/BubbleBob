@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col s8">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">{{ __('Register') }}</div>
                    <form class="row" method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- firstname --}}
                        <div class="input-field col s6">
                            <input id="firstname" type="text" class="validate {{ $errors->has('firstname') ? ' invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>
                            <label for="firstname">{{ __('firstname') }}</label>
                            @if ($errors->has('firstname'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- lastname --}}
                        <div class="input-field col s6">
                            <input id="lastname" type="text" class="validate {{ $errors->has('lastname') ? ' invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>
                            <label for="lastname">{{ __('lastname') }}</label>
                            @if ($errors->has('lastname'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- date of birth --}}
                        <div class="input-field col s6">
                            <input id="dob" type="date" class="validate {{ $errors->has('date_of_birth') ? ' invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>
                            <label for="dob">{{ __('date_of_birth') }}</label>
                            @if ($errors->has('date_of_birth'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- age --}}
                        <div class="input-field col s6">
                            <input id="age" type="text" class="validate {{ $errors->has('age') ? ' invalid' : '' }}" name="age" value="{{ old('age') }}" required readonly autofocus>
                            <label for="age">{{ __('age') }}</label>
                            @if ($errors->has('age'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Address --}}
                        <div class="input-field col s6">
                            <input id="address" type="textarea" class="validate {{ $errors->has('address') ? ' invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
                            <label for="address">{{ __('address') }}</label>
                            @if ($errors->has('address'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Address --}}
                        <div class="input-field col s6">
                            <input id="contact" type="text" class="validate {{ $errors->has('contact') ? ' invalid' : '' }}" name="contact" value="{{ old('contact') }}" required autofocus>
                            <label for="contact">{{ __('contact') }}</label>
                            @if ($errors->has('contact'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('contact') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- username --}}
                        <div class="input-field col s6">
                            <input id="username" type="text" class="validate {{ $errors->has('username') ? ' invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                            <label for="username">{{ __('username') }}</label>
                            @if ($errors->has('username'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Email --}}
                        <div class="input-field col s6">
                            <input id="email" type="email" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email">{{ __('Email Address') }}</label>
                            @if ($errors->has('email'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- user type --}}
                        <div class="input-field col s12">
                            <select class="{{ $errors->has('user_type') ? ' invalid' : '' }}" name="user_type" id="user_type" required autofocus>
                                @if (!old('user_type'))
                                    <option selected>Choose...</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Staff</option>                                        
                                @else
                                    <option value="admin" {{ old("user_type") == "admin" ? "selected" : "" }}>Admin</option>
                                    <option value="user" {{ old("user_type") == "user" ? "selected" : "" }}>Staff</option>
                                @endif
                            </select>
                            <label for="user_type">{{ __('User Type') }}</label>
                            @if ($errors->has('user_type'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('user_type') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Secret Question --}}
                        <div class="input-field col s8">
                            <select class="{{ $errors->has('secret_question') ? ' invalid' : '' }}" name="secret_question" id="secret_question" required autofocus>
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
                            <label for="secret_question">{{ __('Security Question') }}</label>
                            @if ($errors->has('secret_question'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('secret_question') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- secret Answer --}}
                        <div class="input-field col s4">
                            <input id="secret_answer" type="text" class="validate {{ $errors->has('secret_answer') ? ' invalid' : '' }}" name="secret_answer" value="{{ old('secret_answer') }}" required autofocus>
                            <label for="secret_answer">{{ __('Secret Answer') }}</label>
                            @if ($errors->has('secret_answer'))
                                <span class="helper-text" data-error="wrong" data-success="right">
                                    <strong>{{ $errors->first('secret_answer') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Password --}}
                        <div class="input-field col s6">
                            <input id="password" type="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" name="password" required autofocus>
                            <label for="password">{{ __('Password') }}</label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Confirm Password --}}
                        <div class="input-field col s6">
                            <input id="password_confirmation" type="password" class="validate {{ $errors->has('password_confirmation') ? ' invalid' : '' }}" name="password_confirmation" required autofocus>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- Register Button --}}
                        <div class="input-field col s6">
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
            $('select').formSelect();
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
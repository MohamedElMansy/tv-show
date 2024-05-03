@extends('layouts.app')

@section('content')
    <div class="sign section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="{{ route('login.submit') }}" method="POST" class="sign__form">
                            @csrf
                            <a class="sign__logo">
                                <img src="{{ asset('img/logo.jpg') }}" alt="">
                            </a>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Email" name="email">
                            </div>
                            @error('email')
                            <span class="error" style="color: #ff5860">{{ $message }}</span>
                            @enderror
                            <div class="sign__group">
                                <input type="password" class="sign__input" placeholder="Password" name="password">
                            </div>
                            @error('password')
                            <span class="error" style="color: #ff5860">{{ $message }}</span>
                            @enderror
                            <button class="sign__btn" type="submit">Login</button>

                            <span class="sign__text">Don't have an account? <a href="{{ route('register') }}">Sign up!</a></span>

                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

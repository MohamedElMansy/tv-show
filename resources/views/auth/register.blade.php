@extends('layouts.app')

@section('content')
    <div class="sign section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- registration form -->
                        <form action="{{ route('register.submit') }}" method="POST" class="sign__form" enctype="multipart/form-data">
                            @csrf
                            <a  class="sign__logo">
                                <img src="img/logo.svg" alt="">
                            </a>

                            <div class="sign__group">
                                <input type="text" class="sign__input" placeholder="Name" name="name">
                            </div>
                            @error('name')
                            <span class="error" style="color: #ff5860">{{ $message }}</span>
                            @enderror

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

                            <div class="sign__group">
                                <input type="file" class="sign__input" name="image" id="image" placeholder="Image">
                            </div>
                            @error('image')
                            <span class="error" style="color: #ff5860">{{ $message }}</span>
                            @enderror

                            <button class="sign__btn" type="submit">Sign up</button>

                            <span class="sign__text">Already have an account? <a href="{{ route('login') }}">Login!</a></span>
                        </form>
                        <!-- registration form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

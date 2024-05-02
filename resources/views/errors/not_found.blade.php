@extends('layouts.app')

@section('content')
    <div class="page-404 section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-404__wrap">
                        <div class="page-404__content">
                            <h1 class="page-404__title">404</h1>
                            <p class="page-404__text">The page you are looking for not available!</p>
                            <a href="{{ route('home') }}" class="page-404__btn">Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

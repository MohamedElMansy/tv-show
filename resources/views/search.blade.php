@extends('layouts.app')

@section('content')
    <!-- page title -->
    <section class="section section--first section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">Search result</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">Search result</li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end page title -->


    <div class="filter"></div>

    <!-- catalog -->
    <div class="catalog">
        <div class="container">
            <div class="row">
                <!-- card -->
                @foreach($results as $result)
                    @php
                        if ($result instanceof \App\Models\Show)
                        {
                            $url = "shows/".$result->id;
                            $image = $result->cover;
                        }else{
                            $url = "shows/{$result->show->id}/episodes/".$result->episode_number;
                            $image = $result->thumbnail;
                        }
                    @endphp
                    <div class="col-6 col-sm-12 col-lg-6">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="card__cover">
                                        <img src="{{ asset($image) }}" alt="">
                                        <a href="#" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="{{ url($url) }}">{{$result->title}}</a></h3>
                                        <div class="card__description">
                                            <p>{{$result->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if($results->count() < 1)
                    <div>
                        <p style="color: #fff">There is no search result with this keyword.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

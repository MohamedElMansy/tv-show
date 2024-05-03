@extends('layouts.app')

@section('content')

    <!-- page title -->
    <section class="section section--first section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">Shows list</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">Shows list</li>
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
                @foreach($shows as $show)
                    <div class="col-6 col-sm-12 col-lg-6">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="card__cover">
                                        <img src="{{ asset($show->cover) }}" alt="">
                                        <a href="{{ url("shows/$show->id") }}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="{{ url("shows/$show->id") }}">{{$show->title}}</a></h3>
                                        <div class="card__description">
                                            <p>{{$show->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- paginator -->
                <div class="col-12">
                    <ul class="paginator paginator--list" style="-webkit-box-shadow: none;">
                        @if ($shows->onFirstPage())
                            <li class="paginator__item paginator__item--prev paginator__item--disabled" >
                                <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                            </li>
                        @else
                            <li class="paginator__item paginator__item--prev">
                                <a href="{{ $shows->previousPageUrl() }}"><i class="icon ion-ios-arrow-back"></i></a>
                            </li>
                        @endif

                            @for ($i = 1; $i <= $shows->lastPage(); $i++)
                                <li class="paginator__item {{ $shows->currentPage() === $i ? 'paginator__item--active' : '' }}">
                                    <a href="{{ $shows->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                        @if ($shows->hasMorePages())
                            <li class="paginator__item paginator__item--next">
                                <a href="{{ $shows->nextPageUrl() }}"><i class="icon ion-ios-arrow-forward"></i></a>
                            </li>
                        @else
                            <li class="paginator__item paginator__item--next paginator__item--disabled">
                                <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- end paginator -->
            </div>
        </div>
    </div>


@endsection

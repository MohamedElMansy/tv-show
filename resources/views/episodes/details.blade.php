@extends('layouts.app')

@section('content')
    <!-- details -->
    <section class="section details">
        <!-- details background -->
        <div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
        <!-- end details background -->

        <!-- details content -->
        <div class="container">
            <div class="row">
                <!-- title -->
                <div class="col-12">
                    <h1 class="details__title">{{ $episode->title }}</h1>
                </div>
                <!-- end title -->

                <!-- content -->
                <div class="col-12 col-xl-6">
                    <div class="card card--details">
                        <div class="row">
                            <!-- card cover -->
                            <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                                <div class="card__cover">
                                    <img src="{{ asset($episode->thumbnail) }}" alt="">
                                </div>
                            </div>
                            <!-- end card cover -->
                            <!-- card content -->
                            <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                                <div class="card__content">
                                    <div class="card__wrap">
                                        <span class="card__rate"><i class="icon ion-ios-star"></i>
                                        @if($episode->likes()->count() > 0)
                                            {{ $episode->likes()->count() }}
                                        @endif
                                        </span>
                                    </div>

                                    <ul class="card__meta">
                                        <li><span>Tv Show:</span> <a href="{{ url("shows/".$episode->show->id) }}">{{ $episode->show->title }}</a> </li>
                                        <li><span>Running time:</span> {{ $episode->duration }} min</li>
                                        <li><span>Time:</span> {{ $episode->time }}</li>
                                        <li><span>Country:</span> <a href="#">USA</a> </li>
                                    </ul>

                                    <div class="card__description card__description--details">
                                        {{ $episode->description }}
                                    </div>
                                </div>
                                @if (Auth::user()->likedEpisodes && Auth::user()->likedEpisodes->contains($episode))
                                    <form action="{{ route('episodes.dislike', ['showId' => $episode->show->id ,'episodeNumber' => $episode->episode_number]) }}" method="POST" style="padding-top: 2%;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="header__sign-in" style="margin-left: 0; color: white">Dislike</button>
                                    </form>
                                @else
                                    <form action="{{ route('episodes.like', ['showId' => $episode->show->id ,'episodeNumber' => $episode->episode_number]) }}" method="POST" style="padding-top: 2%;">
                                        @csrf
                                        <button type="submit" class="header__sign-in" style="margin-left: 0; color: white">Like</button>
                                    </form>
                                @endif
                            </div>
                            <!-- end card content -->
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <!-- player -->
                <div class="col-12 col-xl-6">
                    <video controls width="480" height="300">
                        <source src="{{ $episode->video }}" type="video/mp4" >
                    </video>
                </div>
                <!-- end player -->
            </div>
        </div>
        <!-- end details content -->
    </section>
    <!-- end details -->
@endsection

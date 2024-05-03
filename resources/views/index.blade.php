@extends('layouts.app')

@section('content')
	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>Latest Episodes</b> </h1>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New items">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW RELEASES</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">MOVIES</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV SERIES</a></li>

									<li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">CARTOONS</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
					<div class="row">
						<!-- card -->
                        @foreach($episodes as $episode)
                            <div class="col-6 col-sm-12 col-lg-6">
                                <div class="card card--list">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="card__cover">
                                                <img src="{{ asset($episode->thumbnail) }}" alt="">
                                                <a href="{{ url("shows/{$episode->show->id}/episodes/$episode->episode_number") }}" class="card__play">
                                                    <i class="icon ion-ios-play"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8">
                                            <div class="card__content">
                                                <h3 class="card__title"><a href="{{ url("shows/{$episode->show->id}/episodes/$episode->episode_number") }}">{{ $episode->title }}</a></h3>

                                                <div class="card__wrap">
                                                     <span class="card__rate"><i class="icon ion-ios-star"></i>
                                                         @if($episode->likes()->count() > 0)
                                                             {{ $episode->likes()->count() }}
                                                         @endif
                                                     </span>

                                                    <ul class="card__list">
                                                        <li>HD</li>
                                                    </ul>
                                                </div>

                                                <div class="card__description">
                                                    <p> {{ $episode->description }} </p>
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
                                @if ($episodes->onFirstPage())
                                    <li class="paginator__item paginator__item--prev paginator__item--disabled">
                                        <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                                    </li>
                                @else
                                    <li class="paginator__item paginator__item--prev">
                                        <a href="{{ $episodes->previousPageUrl() }}"><i class="icon ion-ios-arrow-back"></i></a>
                                    </li>
                                @endif

                                @for ($i = 1; $i <= $episodes->lastPage(); $i++)
                                    <li class="paginator__item {{ $episodes->currentPage() === $i ? 'paginator__item--active' : '' }}">
                                        <a href="{{ $episodes->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($episodes->hasMorePages())
                                    <li class="paginator__item paginator__item--next">
                                        <a href="{{ $episodes->nextPageUrl() }}"><i class="icon ion-ios-arrow-forward"></i></a>
                                    </li>
                                @else
                                    <li class="paginator__item paginator__item--next paginator__item--disabled">
                                        <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- end paginator -->
						<!-- end card -->
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->

@endsection

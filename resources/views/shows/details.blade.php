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
					<h1 class="details__title">{{ $show->title }}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-10">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
								<div class="card__cover">
									<img src="{{ asset($show->cover) }}" alt="">
								</div>
							</div>
							<!-- end card cover -->
							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
								<div class="card__content">
									<div class="card__wrap">
									</div>

									<ul class="card__meta">
										<li><span>Show time:</span> {{ $show->time }}</li>
                                        @if($show->followers()->count() > 0)
                                            <li><span>Followers:</span> {{ $show->followers()->count() }}</li>
                                        @endif
									</ul>

									<div class="card__description card__description--details">
                                        {{ $show->description }}
                                    </div>
								</div>
                                @if (Auth::user()->follows && Auth::user()->follows->contains($show))
                                    <form action="{{ route('shows.unfollow', ['id' => $show->id]) }}" method="POST" style="padding-top: 5%;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="header__sign-in" style="margin-left: 0; color: white">Unfollow</button>
                                    </form>
                                @else
                                    <form action="{{ route('shows.follow', ['id' => $show->id]) }}" method="POST" style="padding-top: 5%;">
                                        @csrf
                                        <button type="submit" class="header__sign-in" style="margin-left: 0; color: white">Follow</button>
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
					<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
						<!-- Video files -->
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4" type="video/mp4" size="1440">

						<!-- Caption files -->
						<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

						<!-- Fallback for browsers that don't support the <video> element -->
						<a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
					</video>
				</div>
				<!-- end player -->

				<!-- accordion -->
				<div class="col-12 col-xl-6">
					<div class="accordion" id="accordion">
						<div class="accordion__card">
							<div class="card-header" id="headingOne">
								<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<span>Episodes: </span>
									<span>{{$show->episodes()->count()}} Episodes</span>
								</button>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
                                            @foreach($show->episodes as $episode)
                                                <tr>
                                                    <td>
                                                        <a style="color: #ff55a5" href="{{ url("shows/{$show->id}/episodes/" .$episode->episode_number) }}">
                                                            {{ $episode->title }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $episode->time }}</td>
                                                </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end accordion -->
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

@endsection

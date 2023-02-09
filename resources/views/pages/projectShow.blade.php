@extends('layouts.main-layout')

@section('content')

<section class="card_bg">
<div class="dark">
	<div class="container py-4">
		<article class="postcard dark blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
			</a>
			<div class="postcard__text">
				<h1 class="postcard__title blue">{{ $project -> name }}</h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2">
              </i>{{ $project -> release_date }}
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">
          {{ $project -> description }}
        </div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag mr-2"></i>Laravel</li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>Blade</li>
          <li class="tag__item"><i class="fas fa-clock mr-2"></i>Vite</li>
				</ul>
			</div>
		</article>
  </div>
	</section>


@endsection
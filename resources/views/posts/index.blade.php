@extends('layouts.app')

@section('content')

	<div class="container">
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif
	</div>

	<div class="container">
		@if(session('danger'))
			<div class="alert alert-danger">{{ session('danger') }}</div>
		@endif
	</div>

    <!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">
                    @foreach ($posts as $post)
                        <a href="{{ route('posts.single', $post->id) }}" class="h-entry mb-30 v-height gradient">
						<div class="featured-img" style="background-image: url('{{asset('assets/images/'. $post->image . '')}}');"></div>
						<div class="text">
							<span class="date">{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y H:i') }}</span>
							<h2>{{ Str::words($post->title, 20, ' ...') }}</h2>
						</div>
					</a>
                    @endforeach
				</div>

				<div class="col-md-4">
					@foreach ($postOne as $justPost)
					<a href="{{ route('posts.single', $justPost->id) }}" class="h-entry img-5 h-100 gradient">
						<div class="featured-img" style="background-image: url('{{asset('assets/images/'. $justPost->image . '')}}');"></div>
						<div class="text">
							<span class="date">{{ \Carbon\Carbon::parse($justPost->created_at)->format('d M Y H:i') }}</span>
							<h2>{{ Str::words($justPost->title, 20, ' ...') }}</h2>
						</div>
					</a>
					@endforeach
				</div>

				<div class="col-md-4">
					@foreach ($postTwo as $twoPost)
					<a href="{{ route('posts.single', $twoPost->id) }}" class="h-entry mb-30 v-height gradient">
						<div class="featured-img" style="background-image: url('{{asset('assets/images/'. $twoPost->image . '')}}');"></div>
						<div class="text">
							<span class="date">{{ \Carbon\Carbon::parse($twoPost->created_at)->format('d M Y H:i') }}</span>
							<h2>{{ Str::words($twoPost->title, 20, ' ...') }}</h2>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start business posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Business</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html">View All</a></div>
			</div>

			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
						@foreach ($postBus as $busPost)
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="{{ route('posts.single', $busPost->id) }}" class="img-link">
									<img src="{{asset('assets/images/'. $busPost->image . '')}}" alt="Image" class="img-fluid">
								</a>
								<span class="date">{{ \Carbon\Carbon::parse($busPost->created_at)->format('d M Y H:i') }}</span>
								<h2>
									<a href="{{ route('posts.single', $busPost->id) }}">
										{{ Str::words($busPost->title, 20, ' ...') }}
									</a>
								</h2>
								<p>{{ Str::words($busPost->description, 20, ' ...') }}</p>
								<p><a href="{{ route('posts.single', $busPost->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						@foreach ($postBusTwo as $busTwoPost)
						<li>
							<span class="date">{{ \Carbon\Carbon::parse($busTwoPost->created_at)->format('d M Y H:i') }}</span>
							<h3>
								<a href="{{ route('posts.single', $busTwoPost->id) }}">
									{{ Str::words($busTwoPost->title, 20, ' ...') }}
								</a>
							</h3>
							<p>{{ Str::words($busTwoPost->description, 20, ' ...') }}</p>
							<a href="{{ route('posts.single', $busTwoPost->id) }}">Continue Reading</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End business posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
				@foreach ($randomPosts as $randPost)
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="{{ route('posts.single', $randPost->id) }}" class="img-link">
							<img src="{{asset('assets/images/'. $randPost->image . '')}}" alt="Image" class="img-fluid">
						</a>
						<span class="date">{{ \Carbon\Carbon::parse($randPost->created_at)->format('d M Y H:i') }}</span>
						<h2>
							<a href="{{ route('posts.single', $randPost->id) }}">
								{{ Str::words($randPost->title, 20, ' ...') }}
							</a>
						</h2>
						<p>{{ Str::words($randPost->description, 20, ' ...') }}</p>
						<a href="{{ route('posts.single', $randPost->id) }}">Continue Reading</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start culture posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Culture</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html">View All</a></div>
			</div>

			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
						@foreach ($postCul as $culPost)
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="{{ route('posts.single', $culPost->id) }}" class="img-link">
									<img src="{{asset('assets/images/'. $culPost->image . '')}}" alt="Image" class="img-fluid">
								</a>
								<span class="date">{{ \Carbon\Carbon::parse($culPost->created_at)->format('d M Y H:i') }}</span>
								<h2><a href="{{ route('posts.single', $culPost->id) }}">{{ Str::words($culPost->title, 20, ' ...') }}</a></h2>
								<p>{{ Str::words($culPost->description, 20, ' ...') }}</p>
								<p><a href="{{ route('posts.single', $culPost->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						@foreach ($postCulTwo as $culTwoPost)
						<li>
							<span class="date">{{ \Carbon\Carbon::parse($culTwoPost->created_at)->format('d M Y H:i') }}</span>
							<h3><a href="{{ route('posts.single', $culTwoPost->id) }}">{{ $culTwoPost->title }}</a></h3>
							<p>{{ Str::words($culTwoPost->description, 20, ' ...') }}</p>
							<a href="{{ route('posts.single', $culTwoPost->id) }}">Continue Reading</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
    <!-- End culture posts-entry -->

    <!-- Start politics posts-entry -->
	<section class="section">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html">View All</a></div>
			</div>

			<div class="row">
				@foreach ($postPol as $polPost)
				<div class="col-md-6 col-lg-3">
					<div class="post-entry-alt">
						<a href="{{ route('posts.single', $polPost->id) }}" class="img-link"><img src="{{asset('assets/images/'. $polPost->image . '')}}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							<h2><a href="{{ route('posts.single', $polPost->id) }}">{{ Str::words($polPost->title, 20, ' ...') }}</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								{{-- <figure class="author-figure mb-0 me-3 float-start"><img src="{{asset('assets/images/'. $polPost->image . '')}}" alt="Image" class="img-fluid"></figure> --}}
								{{-- <span class="d-inline-block mt-1">By {{ $polPost->user_name }}</span> --}}
								<span>{{ \Carbon\Carbon::parse($polPost->created_at)->format('d M Y H:i') }}</span>
							</div>
							<p>{{ Str::words($polPost->description, 20, ' ...') }}</p>
							<a href="{{ route('posts.single', $polPost->id) }}">Continue Reading</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
    <!-- End politics posts-entry -->

    <!-- Start travel posts-entry -->
	<section class="section bg-light">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Travel</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">
				<div class="col-md-5 order-md-2">
					@foreach ($postTra as $traPost)
					<a href="{{ route('posts.single', $traPost->id) }}" class="hentry img-1 h-100 gradient">
						<div class="featured-img" style="background-image: url('{{asset('assets/images/'. $traPost->image . '')}}');"></div>
						<div class="text">
							<span>{{ \Carbon\Carbon::parse($traPost->created_at)->format('d M Y H:i') }}</span>
							<h2>{{ $traPost->title }}</h2>
						</div>
					</a>
					@endforeach
				</div>

				<div class="col-md-7">
					@foreach ($postTraOne as $traOnePost)
					<a href="{{ route('posts.single', $traOnePost->id) }}" class="hentry img-2 v-height mb30 gradient">
						<div class="featured-img" style="background-image: url('{{asset('assets/images/'. $traOnePost->image . '')}}');"></div>
						<div class="text text-sm">
							<span>{{ \Carbon\Carbon::parse($traOnePost->created_at)->format('d M Y H:i') }}</span>
							<h2>{{ $traOnePost->title }}</h2>
						</div>
					</a>
					@endforeach

					<div class="two-col d-block d-md-flex justify-content-between">
						@foreach ($postTraTwo as $traTwoPost)
						<a href="{{ route('posts.single', $traTwoPost->id) }}" class="hentry v-height img-2 gradient">
							<div class="featured-img" style="background-image: url('{{asset('assets/images/'. $traTwoPost->image . '')}}');"></div>
							<div class="text text-sm">
								<span>{{ \Carbon\Carbon::parse($traTwoPost->created_at)->format('d M Y H:i') }}</span>
								<h2>{{ $traTwoPost->title }}</h2>
							</div>
						</a>
						@endforeach
					</div>  
				</div>
			</div>
		</div>
	</section>
    <!-- End travel posts-entry -->
@endsection
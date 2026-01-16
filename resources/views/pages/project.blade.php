@extends('layouts.public')

@section('title', 'Project Detail')


@section('content')

<div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Portfolio Details</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Portfolio Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                @if($project->image)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid" loading="lazy">
                    </div>
                @else
                    <div class="swiper-slide">
                    <img src="{{ asset('assets/img/portfolio/portfolio-1.webp') }}" alt="Portfolio Image" class="img-fluid" loading="lazy">
                    </div>
                @endif

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-left" data-aos-delay="200">
              <h3>{{ $project->title }}</h3>
              <ul>
                <li><strong>Diposting pada {{ $project->created_at->format('d F Y') }}</li>
              </ul>
            @if($project->link)
              <ul>
                <li> <a href="{{ $project->link }}" target="_blank"><i class="bi bi-github text-xl"></i> <span>Lihat Repository</span></a></li> 
              </ul>
            @endif
            </div>
          </div>

          <div class="col-lg-12">
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Deskripsi</h2>
              <p>
                {!! nl2br(e($project->description)) !!}
              </p>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

@endsection


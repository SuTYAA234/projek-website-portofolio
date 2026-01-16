@extends('layouts.public')

@section('title', 'Beranda')


@section('content')

@include('pages.public.hero')

@include('pages.public.about')

@include('pages.public.stats')

@include('pages.public.skill')

@include('pages.public.portfolio')

<!-- Testimonials Section -->
    <section id="testimoni" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Orang-orang yang telah berbisnis dengan saya</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="testimonial-masonry">

            @forelse($comments as $comment)
            <div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-content">
                <div class="quote-pattern">
                    <i class="bi bi-quote"></i>
                </div>
                <p>{{ Str::limit($comment->message, 150) }}</p>
                <div class="client-info">
                    <div class="client-image">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->name) }}" alt="Client">
                    </div>
                    <div class="client-details">
                    <h3>{{ $comment->name }}</h3>
                    <span class="position">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: var(--text-secondary);">
                <p>Belum ada komentar.</p>
            </div>
            @endforelse
          


        </div>

      </div>

    </section>
<!-- /Testimonials Section -->

@include('pages.public.contact')

@endsection


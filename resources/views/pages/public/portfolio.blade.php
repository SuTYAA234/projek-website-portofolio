<!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Project yang telah saya kerjakan</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row">

            <div class="col-lg-12">
              <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="200">

                @foreach($projects as $project)
                <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-photography">
                  <div class="portfolio-wrap">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}"  class="img-fluid" alt="{{ $project->title }}" loading="lazy">
                    @else
                        <i class="bi bi-image" style="font-size: 3rem; color: #555;"></i>
                    @endif
                    <div class="portfolio-info">
                      <div class="content">
                        <span class="category">{{ $project->title }}</span>
                        <h4 class="text-white">
                            {{ Str::limit($project->description, 80) }}
                        </h4>
                        <div class="portfolio-links">
                          <a href="{{ route('project.show', $project->id) }}" title="More Details"><i class="bi bi-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->

                @endforeach

      


              </div><!-- End Portfolio Container -->
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Section -->
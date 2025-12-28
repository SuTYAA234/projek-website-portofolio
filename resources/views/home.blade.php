<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Sutya - Dark Mode</title>

    {{-- Bootstrap Icons & AOS CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    {{-- CSS Kustom Kita (Tanpa Tailwind) --}}
    <link rel="stylesheet" href="{{ asset('css/desainhome.css') }}">
    
    {{-- Jika ada style tambahan lain --}}
    @include('tema.styles')
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <div class="nav-content">
                <a class="brand" href="#">SUTYA</a>
                
                <button id="mobile-menu-btn" class="mobile-menu-btn">
                    <i class="bi bi-list"></i>
                </button>

                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#projects">Projek</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div id="mobile-menu" class="mobile-menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#projects">Projek</a></li>
                    <li><a href="#contact">Contact</a></li>
                    @auth
                    {{-- desain home --}}
                        <div style="border-top: 1px solid #333; margin: 0.5rem 0;"></div>
                        <li><a href="{{ route('dashboard') }}" style="color: var(--primary-color);">Dashboard Admin</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Halaman Perkenalan --}}
    <section id="home" class="hero-wrapper">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text" data-aos="fade-right">
                    <h1>
                        Hai, Saya <br>
                        <span class="highlight">Muhammad Rivan Surya</span>
                    </h1>
                    <h3 class="subtitle">Web Developer & Designer.</h3>
                    <p class="description">
                        Saya membangun website yang fungsional, estetis, dan berfokus pada pengalaman pengguna di era digital yang serba gelap ini.
                    </p>
                    <h4 class="subtitle">Status Pendidikan.</h4>
                    <p class="description">
                        Saya adalah mahasiswa aktif di Universitas Djuanda, dan saat ini sedang menempuh semester 2 di jurusan Ilmu Komputer.
                    </p>
                    <p class="description">
                        Berikut adalah beberapa projek yang telah saya kerjakan.
                    </p>
                    <a href="#projects" class="btn-primary">Lihat Projek</a>
                </div>
                
                <div class="hero-image" data-aos="fade-left">
                    <div class="image-container">
                        <img src="{{ asset('images/MUKA.jpg') }}" alt="Muhammad Rivan Surya">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Projek --}}
    <section id="projects" class="section-padding" style="background-color: rgba(255,255,255,0.02);">
        <div class="container">
            <h3 class="section-title">Projek Terbaru</h3>
            
            <div class="grid-3">
                @foreach($projects as $project)
                <div data-aos="fade-up">
                    <div class="card group">
                        <div class="card-img-wrapper">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                            @else
                                <i class="bi bi-image" style="font-size: 3rem; color: #555;"></i>
                            @endif
                            {{-- Overlay link (optional) --}}
                            <a href="{{ route('project.show', $project->id) }}" style="position:absolute; inset:0;"></a>
                        </div>
                        
                        <div class="card-body">
                            <a href="{{ route('project.show', $project->id) }}" style="text-decoration: none;">
                                <h5 class="card-title">{{ $project->title }}</h5>
                            </a>
                            <p class="card-text">
                                {{ Str::limit($project->description, 80) }}
                            </p>
                            
                            <a href="{{ route('project.show', $project->id) }}" class="read-more">
                                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Komentar --}}
    <section id="comments" class="section-padding">
        <div class="container">
            <h3 class="section-title">Komentar Orang</h3>
            <div class="grid-3">
                @forelse($comments as $comment)
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="comment-card">
                        <div class="comment-header">
                            <div class="avatar">
                                {{ strtoupper(substr($comment->name, 0, 1)) }}
                            </div>
                            <div class="comment-info">
                                <h6>{{ $comment->name }}</h6>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <p class="comment-text">
                            "{{ Str::limit($comment->message, 150) }}"
                        </p>
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

    {{-- Contact & Skills --}}
    <section id="contact" class="section-padding" style="position: relative; overflow: hidden; background-color: rgba(255,255,255,0.02);">
        {{-- Background Decoration --}}
        <div style="position: absolute; top:0; right:0; width: 300px; height:300px; background: rgba(79, 70, 229, 0.1); filter: blur(80px); border-radius: 50%;"></div>
        <div style="position: absolute; bottom:0; left:0; width: 300px; height:300px; background: rgba(147, 51, 234, 0.1); filter: blur(80px); border-radius: 50%;"></div>

        <div class="container" style="position: relative; z-index: 10;">
            <div class="contact-layout">

                {{-- Form Kontak --}}
                <div data-aos="fade-right">
                    <div class="form-card">
                        <h3 style="font-size: 1.8rem; font-weight: bold; color: white; margin-bottom: 0.5rem;">Let's Connect</h3>
                        <p style="color: var(--text-secondary); margin-bottom: 2rem;">Punya ide proyek atau ingin berkolaborasi? Kirimkan pesan di bawah ini.</p>
                        
                        @if(session('success'))
                            <div style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); color: #4ade80; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; display: flex; align-items: center;">
                                <i class="bi bi-check-circle-fill" style="margin-right: 0.5rem;"></i> 
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div>
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Nama Lengkap" required>
                                </div>
                                <div>
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="email@contoh.com" required>
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-top: 1.25rem;">
                                <label>Message</label>
                                <textarea name="message" rows="5" placeholder="Ceritakan detail proyek Anda..." required style="resize: none;"></textarea>
                            </div>
                            
                            <button type="submit" class="btn-submit">
                                Kirim Pesan <i class="bi bi-send-fill" style="margin-left: 0.5rem;"></i>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Tech Stack --}}
                <div style="display: flex; flex-direction: column; justify-content: center;" data-aos="fade-left">
                    <div style="margin-bottom: 2rem;">
                        <h3 style="font-size: 1.8rem; font-weight: bold; color: white; margin-bottom: 1rem;">Tech Stack</h3>
                        <p style="color: var(--text-secondary); line-height: 1.6;">
                            Tools dan teknologi yang saya gunakan untuk menciptakan solusi digital yang handal dan skalabel.
                        </p>
                    </div>
                    
                    <div class="skills-container">
                        <div class="skill-tag">
                            <img src="https://laravel.com/img/logomark.min.svg" style="width: 1.25rem;" alt="Laravel">
                            <span>Laravel</span>
                        </div>
                        
                        <div class="skill-tag">
                            <i class="bi bi-filetype-php" style="color: #818cf8;"></i>
                            <span>PHP</span>
                        </div>

                        <div class="skill-tag">
                            <i class="bi bi-filetype-js" style="color: #facc15;"></i>
                            <span>JavaScript</span>
                        </div>

                        <div class="skill-tag">
                            <i class="bi bi-code-slash" style="color: #3b82f6;"></i> <span>Python</span>
                        </div>

                         <div class="skill-tag">
                            <i class="bi bi-filetype-java" style="color: #ef4444;"></i>
                            <span>Java</span>
                        </div>

                        <div class="skill-tag"><i class="bi bi-filetype-html" style="color: #f97316;"></i><span>HTML5</span></div>
                        <div class="skill-tag"><i class="bi bi-filetype-css" style="color: #3b82f6;"></i><span>CSS3</span></div>
                        <div class="skill-tag"><i class="bi bi-wind" style="color: #22d3ee;"></i><span>Tailwind</span></div>
                        <div class="skill-tag"><i class="bi bi-bootstrap" style="color: #a855f7;"></i><span>Bootstrap</span></div>
                        <div class="skill-tag"><i class="bi bi-git" style="color: #ea580c;"></i><span>Git</span></div>
                    </div>
                    
                    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--border-color);">
                        <p style="color: var(--text-secondary); font-size: 0.875rem; margin-bottom: 1rem;">Atau hubungi saya melalui:</p>
                        <div style="display: flex; gap: 1rem;">
                            <a href="https://github.com/SuTYAA234?tab=repositories" style="width: 2.5rem; height: 2.5rem; border-radius: 50%; background: #27272a; display: flex; align-items: center; justify-content: center; color: #a1a1aa; text-decoration: none;"><i class="bi bi-github"></i></a>
                            <a href="#" style="width: 2.5rem; height: 2.5rem; border-radius: 50%; background: #27272a; display: flex; align-items: center; justify-content: center; color: #a1a1aa; text-decoration: none;"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer style="text-align: center;">
        <div class="container">
            <small>&copy; {{ date('Y') }} Sutya.</small>
        </div>
    </footer>

    <button id="back-to-top" aria-label="Back to Top">
        <i class="bi bi-arrow-up" style="font-size: 1.5rem;"></i>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, offset: 100, duration: 800 });

        // Logic Mobile Menu
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileBtn.addEventListener('click', () => { 
            if (mobileMenu.style.display === 'block') {
                mobileMenu.style.display = 'none';
            } else {
                mobileMenu.style.display = 'block';
            }
        });

        // Logic Back to Top Button
        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
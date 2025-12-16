<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Sutya - Dark Mode</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    @include('tema.styles')
    
    <style>
        /* Animasi tambahan untuk Back to Top */
        .fade-enter { opacity: 0; transform: translateY(20px); }
        .fade-enter-active { opacity: 1; transform: translateY(0); transition: opacity 0.3s, transform 0.3s; }
        .fade-exit { opacity: 1; transform: translateY(0); }
        .fade-exit-active { opacity: 0; transform: translateY(20px); transition: opacity 0.3s, transform 0.3s; }
    </style>
</head>

{{-- desain halaman --}}
<body class="antialiased">

    <nav class="fixed top-0 left-0 right-0 z-50 bg-zinc-950/90 backdrop-blur-md border-b border-zinc-800">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a class="text-2xl font-bold tracking-wider text-white" href="#">
                    SUTYA
                </a>
                
                <button id="mobile-menu-btn" class="lg:hidden text-zinc-300 text-3xl focus:outline-none">
                    <i class="bi bi-list"></i>
                </button>

                <ul class="hidden lg:flex space-x-8 font-medium text-zinc-300">
                    <li><a class="hover:text-indigo-400 transition-colors" href="#home">Home</a></li>
                    <li><a class="hover:text-indigo-400 transition-colors" href="#about">About</a></li>
                    <li><a class="hover:text-indigo-400 transition-colors" href="#projects">Portfolio</a></li>
                    <li><a class="hover:text-indigo-400 transition-colors" href="#contact">Contact</a></li>
                    
                </ul>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden mt-4 bg-zinc-900 rounded-xl border border-zinc-800 shadow-2xl overflow-hidden">
                <ul class="flex flex-col p-4 space-y-2 font-medium text-zinc-300">
                    <li><a class="block py-3 px-4 hover:bg-zinc-800 hover:text-indigo-400 rounded-lg transition-colors" href="#home">Home</a></li>
                    <li><a class="block py-3 px-4 hover:bg-zinc-800 hover:text-indigo-400 rounded-lg transition-colors" href="#about">About</a></li>
                    <li><a class="block py-3 px-4 hover:bg-zinc-800 hover:text-indigo-400 rounded-lg transition-colors" href="#projects">Portfolio</a></li>
                    <li><a class="block py-3 px-4 hover:bg-zinc-800 hover:text-indigo-400 rounded-lg transition-colors" href="#contact">Contact</a></li>
                    @auth
                        <div class="border-t border-zinc-700 my-2 pt-2"></div>
                        <li><a class="block py-3 px-4 bg-indigo-900/30 text-indigo-400 hover:bg-indigo-900/50 rounded-lg font-bold" href="{{ route('dashboard') }}">Dashboard Admin</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- halaman perkenalan --}}
    <section id="home" class="section-padding min-h-screen flex items-center pt-32">
        <div class="container mx-auto px-4">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                <div class="lg:w-7/12 text-center lg:text-left" data-aos="fade-right">
                    <h1 class="text-4xl lg:text-6xl mb-4 leading-tight">
                        Hai, Saya <br>
                        <span class="text-indigo-500 text-5xl lg:text-7xl">Muhammad Rivan Surya</span>
                    </h1>
                    <h3 class="text-xl lg:text-2xl text-zinc-400 mb-6 font-semibold">Web Developer & Designer.</h3>
                    <p class="text-lg text-zinc-500 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Saya membangun website yang fungsional, estetis, dan berfokus pada pengalaman pengguna di era digital yang serba gelap ini.
                    </p>
                     <h4 class="text-xl lg:text-2xl text-zinc-400 mb-6 font-semibold">Status Pendidikan.</h4>
                    <p class="text-lg text-zinc-500 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Saya adalah mahasiswa aktif di Universitas Djuanda, dan saat ini sedang menempuh semester 2 di jurusan Ilmu Komputer.
                    <p class="text-lg text-zinc-500 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Berikut adalah beberapa projek yang telah saya kerjakan.
                    </p>
                    <a href="#projects" class="btn-custom-indigo">Lihat Projek</a>
                </div>
                <div class="lg:w-5/12 mb-8 lg:mb-0" data-aos="fade-left">
                    <div class="relative rounded-2xl overflow-hidden p-2 bg-gradient-to-br from-indigo-600 to-purple-700 shadow-2xl shadow-indigo-500/30 rotate-3 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/MUKA.jpg') }}" alt="Muhammad Rivan Surya" class="w-full h-auto max-h-[500px] object-cover rounded-xl bg-zinc-900">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- untuk bagian projek --}}
    <section id="projects" class="section-padding bg-zinc-900/50">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold mb-12 text-center lg:text-left">Projek Terbaru</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div data-aos="fade-up">
                    <div class="card-dark h-full flex flex-col group relative">
                        <div class="h-64 bg-zinc-800 flex items-center justify-center overflow-hidden relative">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <i class="bi bi-image text-6xl text-zinc-700"></i>
                            @endif
                            
                            <a href="{{ route('project.show', $project->id) }}" class="absolute inset-0 bg-black/0 transition-colors group-hover:bg-black/20 z-10"></a>
                        </div>
                        
                        <div class="p-6 flex-grow flex flex-col">
                            <a href="{{ route('project.show', $project->id) }}" class="hover:text-indigo-400 transition-colors">
                                <h5 class="text-xl font-bold mb-3">{{ $project->title }}</h5>
                            </a>
                            <p class="text-zinc-400 text-sm mb-4 flex-grow">
                                {{ Str::limit($project->description, 80) }}
                            </p>
                            
                            <a href="{{ route('project.show', $project->id) }}" class="inline-flex items-center text-indigo-400 font-semibold text-sm group-hover:underline">
                                Baca Selengkapnya <i class="bi bi-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="comments" class="section-padding">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold mb-12 text-center lg:text-left">Komentar Orang</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($comments as $comment)
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="card-dark p-8 h-full border-l-4 border-indigo-500">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold text-xl shadow-lg shadow-indigo-500/30 shrink-0 me-4">
                                {{ strtoupper(substr($comment->name, 0, 1)) }}
                            </div>
                            <div>
                                <h6 class="font-bold text-lg text-white">{{ $comment->name }}</h6>
                                <small class="text-zinc-500 text-xs block mt-1">
                                    {{ $comment->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                        <p class="text-zinc-300 italic leading-relaxed relative pl-4 before:content-['\201C'] before:absolute before:left-0 before:top-0 before:text-4xl before:text-indigo-800 before:-translate-y-4">
                            "{{ Str::limit($comment->message, 150) }}"
                        </p>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-zinc-500 text-xl">Belum ada komentar.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    
    {{-- untuk desain skill --}}
    <section id="contact" class="section-padding bg-zinc-900/50">
        <div data-aos="fade-right">
    <h3 class="text-3xl font-bold mb-8">Tech Stack & Tools</h3>
    <p class="text-zinc-400 mb-6">Teknologi yang saya gunakan untuk membangun aplikasi:</p>
    
    <div class="flex flex-wrap gap-3">
        
        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-red-500/50 hover:bg-zinc-800 transition-all cursor-default group">
            <img src="https://laravel.com/img/logomark.min.svg" class="w-6 h-6 group-hover:scale-110 transition-transform" alt="Laravel Logo">
            <span class="text-zinc-300 font-medium group-hover:text-white">Laravel</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-indigo-400/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-filetype-php text-2xl text-indigo-400 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">PHP</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-yellow-400/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-filetype-js text-2xl text-yellow-400 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">JavaScript</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-blue-400/50 hover:bg-zinc-800 transition-all cursor-default group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 group-hover:scale-110 transition-transform" viewBox="0 0 448 512"><path fill="#3776AB" d="M439.8 209.8c0-97.2-71.4-121.3-116.7-121.3-26.9 0-55.7 8.4-76.6 16.1v29.6c17.9-6.1 39.1-13.9 66.2-13.9 45.9 0 72.7 25.5 72.7 62.5v4.4h-55.1c-78.3 0-120.7 37.7-120.7 87.1 0 51.3 41.5 85.5 109.5 85.5 33.1 0 66.4-9.6 86.3-21.3l2.6 12.4h38.3V218.7c0-3.8.2-6.8.2-8.9zM246.4 330c-16.1 8.4-38.7 13.9-59.6 13.9-33.8 0-53.9-17.5-53.9-47.3 0-33.1 26.1-51.1 72.7-51.1h40.9v84.5zm-86-263.4C260.2 13.8 332.6 0 407.8 0v107.5h-39.3c-35.9 0-59.4 18.1-59.4 47.3v33.1h98.6l-4.4 53.9h-94.2v168.5c26.9 8.4 55.7 13.3 85.5 13.3 81.6 0 148.1-27.9 148.1-133.1V245H292.3v-39.6h144c1.8-7.6 2.6-15.3 2.6-23.1 0-66.7-20.3-107.8-77.5-107.8-37.5 0-68.1 12.8-92.3 32.1L246.4 66.6z"/></svg>
            <span class="text-zinc-300 font-medium group-hover:text-white">Python</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-red-400/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-filetype-java text-2xl text-red-500 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">Java</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-blue-600/50 hover:bg-zinc-800 transition-all cursor-default group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 group-hover:scale-110 transition-transform" viewBox="0 0 384 512"><path fill="#00599C" d="M329.1 142.9c-62.5-62.5-163.8-62.5-226.3 0s-62.5 163.8 0 226.3s163.8 62.5 226.3 0c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3c-87.5 87.5-229.3 87.5-316.8 0s-87.5-229.3 0-316.8s229.3-87.5 316.8 0c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0zM239.5 251.4h40.2c6.4 0 11.6 5.2 11.6 11.6v8.3c0 6.4-5.2 11.6-11.6 11.6h-40.2v40.2c0 6.4-5.2 11.6-11.6 11.6h-8.3c-6.4 0-11.6-5.2-11.6-11.6v-40.2h-40.2c-6.4 0-11.6-5.2-11.6-11.6v-8.3c0-6.4 5.2-11.6 11.6-11.6h40.2v-40.2c0-6.4 5.2-11.6 11.6-11.6h8.3c6.4 0 11.6 5.2 11.6 11.6v40.2zm108 0h40.2c6.4 0 11.6 5.2 11.6 11.6v8.3c0 6.4-5.2 11.6-11.6 11.6h-40.2v40.2c0 6.4-5.2 11.6-11.6 11.6h-8.3c-6.4 0-11.6-5.2-11.6-11.6v-40.2h-40.2c-6.4 0-11.6-5.2-11.6-11.6v-8.3c0-6.4 5.2-11.6 11.6-11.6h40.2v-40.2c0-6.4 5.2-11.6 11.6-11.6h8.3c6.4 0 11.6 5.2 11.6 11.6v40.2z"/></svg>
            <span class="text-zinc-300 font-medium group-hover:text-white">C++</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-orange-500/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-filetype-html text-2xl text-orange-500 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">HTML5</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-blue-500/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-filetype-css text-2xl text-blue-500 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">CSS3</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-cyan-400/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-wind text-2xl text-cyan-400 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">Tailwind</span>
        </div>
        
        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-purple-500/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-bootstrap text-2xl text-purple-500 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">Bootstrap</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-orange-600/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-git text-2xl text-orange-600 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">Git</span>
        </div>

        <div class="flex items-center space-x-2 bg-zinc-800/80 border border-zinc-700 px-4 py-2.5 rounded-xl hover:border-pink-500/50 hover:bg-zinc-800 transition-all cursor-default group">
            <i class="bi bi-bezier2 text-2xl text-pink-500 group-hover:scale-110 transition-transform"></i>
            <span class="text-zinc-300 font-medium group-hover:text-white">UI/UX Design</span>
        </div>

    </div>
</div>
    </section>

    <footer class="py-8 text-center text-zinc-500 border-t border-zinc-800 bg-zinc-950">
        <div class="container mx-auto px-4">
            <small class="text-base">&copy; {{ date('Y') }} Sutya.</small>
        </div>
    </footer>

    <button id="back-to-top" class="fixed bottom-8 right-8 bg-indigo-600 text-white p-3 rounded-full shadow-lg hover:bg-indigo-700 transition-all duration-300 opacity-0 translate-y-10 z-40 pointer-events-none" aria-label="Back to Top">
        <i class="bi bi-arrow-up text-2xl"></i>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, offset: 100, duration: 800 });

        // Logic Mobile Menu
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileBtn.addEventListener('click', () => { mobileMenu.classList.toggle('hidden'); });
        mobileMenu.querySelectorAll('a').forEach(link => { link.addEventListener('click', () => { mobileMenu.classList.add('hidden'); }); });

        // Logic Back to Top Button
        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                // Munculkan tombol jika scroll > 300px
                backToTopBtn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                backToTopBtn.classList.add('opacity-100', 'translate-y-0');
            } else {
                // Sembunyikan tombol
                backToTopBtn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
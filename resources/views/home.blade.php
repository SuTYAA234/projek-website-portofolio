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

    <section id="contact" class="section-padding bg-zinc-900/50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div data-aos="fade-right">
                    <h3 class="text-3xl font-bold mb-8">Skills</h3>
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-zinc-800 text-indigo-400 rounded-xl flex items-center justify-center text-2xl mr-6 shrink-0 border border-zinc-700 shadow-md"><i class="bi bi-globe"></i></div>
                            <div class="w-full">
                                <div class="flex justify-between font-semibold text-zinc-300 mb-2"><span>Web Development</span><span class="text-indigo-400">50%</span></div>
                                <div class="h-3 bg-zinc-800 rounded-full overflow-hidden border border-zinc-700/50"><div class="h-full bg-indigo-600 rounded-full shadow-[0_0_10px_rgba(79,70,229,0.5)]" style="width: 50%"></div></div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-zinc-800 text-indigo-400 rounded-xl flex items-center justify-center text-2xl mr-6 shrink-0 border border-zinc-700 shadow-md"><i class="bi bi-filetype-html"></i></div>
                            <div class="w-full">
                                <div class="flex justify-between font-semibold text-zinc-300 mb-2"><span>HTML & CSS</span><span class="text-indigo-400">70%</span></div>
                                <div class="h-3 bg-zinc-800 rounded-full overflow-hidden border border-zinc-700/50"><div class="h-full bg-indigo-600 rounded-full shadow-[0_0_10px_rgba(79,70,229,0.5)]" style="width: 70%"></div></div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-zinc-800 text-indigo-400 rounded-xl flex items-center justify-center text-2xl mr-6 shrink-0 border border-zinc-700 shadow-md"><i class="bi bi-code-slash"></i></div>
                            <div class="w-full">
                                <div class="flex justify-between font-semibold text-zinc-300 mb-2"><span>PHP & Laravel</span><span class="text-indigo-400">65%</span></div>
                                <div class="h-3 bg-zinc-800 rounded-full overflow-hidden border border-zinc-700/50"><div class="h-full bg-indigo-600 rounded-full shadow-[0_0_10px_rgba(79,70,229,0.5)]" style="width: 65%"></div></div>
                            </div>
                        </div>
                         <div class="flex items-start">
                            <div class="w-12 h-12 bg-zinc-800 text-indigo-400 rounded-xl flex items-center justify-center text-2xl mr-6 shrink-0 border border-zinc-700 shadow-md"><i class="bi bi-layout-text-window-reverse"></i></div>
                            <div class="w-full">
                                <div class="flex justify-between font-semibold text-zinc-300 mb-2"><span>UI/UX Design</span><span class="text-indigo-400">50%</span></div>
                                <div class="h-3 bg-zinc-800 rounded-full overflow-hidden border border-zinc-700/50"><div class="h-full bg-indigo-600 rounded-full shadow-[0_0_10px_rgba(79,70,229,0.5)]" style="width: 50%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left">
                    <div class="card-dark p-8 lg:p-10">
                        <h3 class="text-3xl font-bold mb-8">Contact Me</h3>
                        @if(session('success'))
                            <div class="bg-green-900/30 border border-green-600 text-green-300 px-4 py-3 rounded-lg mb-6 flex items-center" role="alert">
                                <i class="bi bi-check-circle-fill mr-3"></i> <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div><label class="block text-zinc-400 text-sm font-semibold mb-2 pl-1">Name</label><input type="text" name="name" class="form-input-dark" placeholder="Nama Lengkap" required></div>
                            <div><label class="block text-zinc-400 text-sm font-semibold mb-2 pl-1">Email</label><input type="email" name="email" class="form-input-dark" placeholder="alamat@email.com" required></div>
                            <div><label class="block text-zinc-400 text-sm font-semibold mb-2 pl-1">Message</label><textarea name="message" rows="5" class="form-input-dark resize-none" placeholder="Tulis pesan Anda di sini..." required></textarea></div>
                            <button type="submit" class="btn-custom-indigo w-full text-lg">Send Message <i class="bi bi-send-fill ml-2"></i></button>
                        </form>
                    </div>
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
<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Detail Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    @include('tema.styles') 
</head>
<body class="antialiased bg-zinc-950 text-zinc-200">

    <nav class="fixed top-0 left-0 right-0 z-50 bg-zinc-950/90 backdrop-blur-md border-b border-zinc-800">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a class="text-2xl font-bold tracking-wider text-white" href="{{ route('home') }}">
                SUTYA
            </a>
            <a href="{{ route('home') }}#projects" class="text-zinc-400 hover:text-white transition-colors">
                <i class="bi bi-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </nav>

    <section class="pt-32 pb-20 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                
                <div class="text-center mb-10">
                    <h1 class="text-3xl lg:text-5xl font-bold mb-4 text-white">{{ $project->title }}</h1>
                    <p class="text-zinc-500">
                        Diposting pada {{ $project->created_at->format('d F Y') }}

                    </p>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-2xl border border-zinc-800 mb-10 bg-zinc-900">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-auto object-cover max-h-[600px]">
                    @else
                        <div class="h-64 flex items-center justify-center bg-zinc-800">
                            <i class="bi bi-image text-6xl text-zinc-600"></i>
                            
                        </div>
                    @endif
                </div>

                <div class="prose prose-invert prose-lg max-w-none text-zinc-300 leading-relaxed mb-10 bg-zinc-900/50 p-8 rounded-2xl border border-zinc-800/50">
                    {!! nl2br(e($project->description)) !!}
                </div>

                @if($project->link)
                    <div class="flex justify-center mt-12 mb-8">
                        <a href="{{ $project->link }}" target="_blank" class="inline-flex items-center gap-3 px-8 py-3 bg-zinc-800 hover:bg-zinc-700 text-white font-semibold rounded-xl border border-zinc-700 transition-all duration-300 hover:scale-105 shadow-lg shadow-zinc-900/50">
                            <i class="bi bi-github text-xl"></i>
                            
                            <span>Lihat Repository</span>
                      </a>
                     </div>
                @endif

            </div>
        </div>
    </section>

    <footer class="py-8 text-center text-zinc-500 border-t border-zinc-800 bg-zinc-950">
        <div class="container mx-auto px-4">
            <small class="text-base">&copy; {{ date('Y') }} Sutya.</small>
        </div>
    </footer>

</body>
</html>
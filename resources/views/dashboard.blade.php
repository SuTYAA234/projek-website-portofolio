<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Sutya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-400 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        {{ __("You're logged in!") }}
        ...
    </div>
</div>
                <div class="p-6 bg-gray-200 border-b border-gray-200">
<div class="text-center">
    <h1 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Saya!</h1>
    <p class="mb-4">ANDA ADALAH ADMIN</p>
    
    <div class="mt-4">
        <a href="{{ route('projects.index') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            Kelola Portofolio Saya
        <a href="{{ route('contacts.index') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded ms-2">
            Lihat Pesan Masuk
</a>
        </a>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

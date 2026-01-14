<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::insert([
            [
                'title' => 'Website Portfolio',
                'description' => 'Website portfolio pribadi menggunakan Laravel.',
                'image' => 'portfolio.png',
                'link' => 'https://example.com/portfolio',
            ],
            [
                'title' => 'Sistem Informasi Akademik',
                'description' => 'Aplikasi pengelolaan data akademik berbasis web.',
                'image' => 'siakad.png',
                'link' => 'https://example.com/siakad',
            ],
            [
                'title' => 'Landing Page Produk',
                'description' => 'Landing page promosi produk dengan desain responsif.',
                'image' => 'landing-page.png',
                'link' => 'https://example.com/landing-page',
            ],
        ]);
    }
}

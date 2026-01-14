<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::insert([
            [
                'name' => 'Muhammad Surya',
                'email' => 'surya@gmail.com',
                'message' => 'Halo, saya tertarik dengan website portfolio Anda.',
            ],
            [
                'name' => 'Andi Pratama',
                'email' => 'andi@gmail.com',
                'message' => 'Apakah website ini menerima project freelance?',
            ],
            [
                'name' => 'Siti Aisyah',
                'email' => 'siti@gmail.com',
                'message' => 'Desain websitenya sangat bagus dan rapi.',
            ],
        ]);
    }
}

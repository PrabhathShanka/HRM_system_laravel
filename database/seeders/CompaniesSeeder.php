<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Google',
                'email' => 'contact@google.com',
                'website' => 'https://google.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Apple',
                'email' => 'contact@apple.com',
                'website' => 'https://apple.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Microsoft',
                'email' => 'contact@microsoft.com',
                'website' => 'https://microsoft.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amazon',
                'email' => 'contact@amazon.com',
                'website' => 'https://amazon.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        foreach(Company::all() as $company) {
            $company->users()->attach(1);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([
            [
                'title' => 'Welcome To <br> Thewayshop',
                'subtitle' => 'See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.',
                'img' => 'home/tso2aAbnM3oZoqOTdZORYp3e8meGGJnvwoOoLS1z.jpg'
            ],
            [
                'title' => 'Welcome To <br> Thewayshop',
                'subtitle' => 'See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.',
                'img' => 'home/hlqQb2Yl7E1YW4OdaAQtZ5QDzigXYzJzhzimMvYw.jpg'
            ],
            [
                'title' => 'Welcome To <br> Thewayshop',
                'subtitle' => 'See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.',
                'img' => 'home/HHvEHym0aTmjTjUzqDXmiboJg7L4zHXs8IkgDv5B.jpg'
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        if ($posts->isEmpty()) {
            $posts = Post::factory(5)->create(); // fallback
        }

        foreach ($posts as $post) {
            Media::factory(rand(1, 3))->create([
                'post_id' => $post->id
            ]);
        }
    }
}

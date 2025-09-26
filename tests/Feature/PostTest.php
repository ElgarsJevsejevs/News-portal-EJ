<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_post()
    {
        $post = Post::create([
            'title' => 'Testa virsraksts',
            'content' => 'Testa saturs',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Testa virsraksts',
        ]);
    }
}

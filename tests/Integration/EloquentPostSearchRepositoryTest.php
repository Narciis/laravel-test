<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\Repositories\EloquentPostSearchRepository;
use App\Models\Post;

class EloquentPostSearchRepositoryTest extends TestCase
{
    
    /**
     * testActive
     *
     * @return void
     */
    public function testActive()
    {
        $posts = Post::factory()->count(50)->make();
        $this->assertNotNull($posts);
        $allActive = true;
        foreach ($posts as $post) {
                if ($post['active'] == false) {
                    $allActive = false;
                    break;
                }
        }
        $this->assertTrue($allActive);
    
    }
    
    /**
     * testInactive
     *
     * @return void
     */
    public function testInactive()
    {
        $posts = Post::factory()->count(50)->make();
        $this->assertNotNull($posts);
        $allInactive = true;
        foreach ($posts as $post) {
                if ($post['active'] == false) {
                    $allInactive = false;
                    break;
                }
        }
        $this->assertTrue($allInactive);
    }
}

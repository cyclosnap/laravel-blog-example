<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanDeleteOwnPost()
    {

        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();

        $userPost = factory(Post::class)->create([
            'user_id' => $user->id,
        ]);

        $otherUserPost = factory(Post::class)->create([
            'user_id' => $otherUser->id,
        ]);

        $this->assertDatabaseCount('users', 2);
        $this->assertDatabaseCount('posts', 2);

        auth()->login($user);
        
        //should fail, so same # posts exists
        $response = $this->delete("posts/2");
        $this->assertDatabaseCount('posts', 2);
        $response->assertStatus(403);

        //should succeed, expect a redirect (302)
        $response = $this->delete("posts/1");
        $this->assertDatabaseCount('posts', 1);
        $response->assertStatus(302);
    }
}

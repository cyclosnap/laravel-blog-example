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
        $this->assertDatabaseHas('users', ['email' => $user->email]);

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

        //should not be able to delete someone else's posts
        //try
        $response = $this->delete("posts/2");
        //fail
        $this->assertDatabaseCount('posts', 2);
        $response->assertStatus(403);

        //should succeed, expect a redirect (302)
        $response = $this->delete("posts/1");
        $this->assertDatabaseCount('posts', 1);
        $response->assertStatus(302);
    }
}

<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewAnotherUsersTweetsTest extends TestCase
{

    // Setup database migration
    use DatabaseMigrations;

    public function test_can_view_another_users_tweets()
    {
        //A User must exist - Passed
        $user = factory(User::class)->create([
            'username' => 'johndoe',
        ]);

        //User has Tweets
        $tweets = factory(Tweet::class)->make([
            'body' => 'This is my first tweet',
        ]);
        $user->tweets()->save($tweets); // attach tweets to user

        //Go to User's Profile
        $this->visit('/johndoe')
            ->see('This is my first tweet');

        //View User's Tweet

    }
}

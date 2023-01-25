<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class PostTest extends TestCase
{
    public function testCreatePost()
{
    // setup data
    $data = [
        'title' => 'Test Title',
        'content' => 'Test Content',
    ];

    // send post request
    $response = $this->json('POST', '/v1/posts', $data);

    // check for successful response
    $response->assertStatus(201);

    // check for correct data in response
    $response->assertJson([
        'title' => 'Test Title',
        'content' => 'Test Content',
    ]);

    // check for data in database
    $this->assertDatabaseHas('posts', [
        'title' => 'Test Title',
        'content' => 'Test Content',
    ]);
}

    // test cases
}


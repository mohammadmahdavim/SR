<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @group apilogintests
     */
    public function testApiLogin() {
        $body = [
            'user_name' => 'brook75',
            'password' => '1234567890'
        ];
        $this->json('POST','/api/login',$body,['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['success' => [
                'token',
                'user' => [
                    'id',
                    'user_name'
                ]
            ]
            ]);
    }
    /**
     * @group apilogintests
     */
    public function testOauthLogin() {
        $oauth_client_id = env('PASSPORT_CLIENT_ID');
        $oauth_client = \Laravel\Passport\Client::findOrFail($oauth_client_id);

        $body = [
            'user_name' => 'brook75',
            'password' => '1234567890',
            'client_id' => $oauth_client_id,
            'client_secret' => $oauth_client->secret,
            'grant_type' => 'client_credentials',
            'scope' => '*'
        ];
        $this->json('POST','/oauth/token',$body,['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type','expires_in','access_token']);
    }
}

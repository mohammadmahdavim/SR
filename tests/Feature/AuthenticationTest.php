<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    /**
     * @group logintest
     */
    public function testlogin() {
        $user = User::factory()->create();

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }

    /**
     * @group apilogintests
     */
    public function testApiLogin() {
        $body = [
            'user_name' => 'brook75',
            'type' => '1',
            'password' => '1234567890'
        ];
        $this->json('POST','/api/login',$body,['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    /**
     * @group apilogintests
     */
    public function testOauthLogin() {
        $oauth_client_id = env('PASSPORT_CLIENT_ID');
//        $oauth_client =  DB::table('oauth_clients')->where('id', $oauth_client_id)->first();
        $oauth_client = Client::findorfail('972f37ce-5fb9-45d4-88ef-ac76da7cc3b3');

        $body = [
            'user_name' => 'brook75',
            'password' => '1234567890',
            'client_id' => '972f37ce-5fb9-45d4-88ef-ac76da7cc3b3',
            'client_secret' => $oauth_client->secret,
            'grant_type' => 'client_credentials',
            'scope' => ''
        ];
        $this->json('POST',config('app.url') .'/oauth/token',$body,['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token_type','expires_in','access_token']);
    }


}

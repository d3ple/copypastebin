<?php

namespace Tests\Feature;

use App\Paste;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;



class ExampleTest extends TestCase
{

    public function testNewPasteView()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


    public function testShowPaste()
    {
        $paste = Paste::find('1');
        $response = $this->get('/'.$paste->url);
        $response->assertOk();
    }


    public function testUserPastes()
    {
        $user = User::find('1');
        $response = $this->get('/pastes');
        $response->assertRedirect('/login');
    }


    public function testShowPasteWrong()
    {
        $response = $this->get('/wrongurltest');
        $response->assertStatus(404);
    }


    public function testShowSearch()
    {
        $response = $this->get('/search');
        $response->assertOk();
    }


    public function testSearchPasteWrong()
    {
        $data = [
            'query' => "query",
            'search-type' => ""
        ];

        $response = $this->json('POST', '/search', $data);
        $response->assertStatus(422);
    }


    public function testSearchPaste()
    {
        $data = [
            'query' => "query",
            'search-type' => "both"
        ];

        $response = $this->json('POST', '/search', $data);
        $response->assertOk();
    }


    public function testCreatePasteWithEmptyData()
    {
        $data = [
            'title' => "Paste",
            'data' => "",
            'expiration-time' => '[{"unit": "", "time": ""}]',
            'syntax' => "html",
            'access_type' => "public"
        ];

        $response = $this->json('POST', '/', $data);
        $response->assertStatus(422);
    }


    public function testUpdatePasteUnauthorized()
    {
        $data = [
            'id' => "3",
            'access_type' => "public"
        ];

        $response = $this->json('PATCH', '/', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }


    public function testUpdateUserUnauthorized()
    {
        $data = [
            'name' => "name",
            'email' => "email@email.email",
            'password' => "password"
        ];

        $response = $this->json('PATCH', '/profile', $data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }


    public function testCreatePasteAuthorized()
    {
        $data = [
            'title' => "Paste",
            'data' => "This is a paste",
            'expiration-time' => '[{"unit": "", "time": ""}]',
            'syntax' => "html",
            'access_type' => "public"
        ];

        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->json('POST', '/', $data);
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'created');
    }








}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_insert_election(){
        $response = $this->withHeaders([
            'x-Header' =>'Value',
        ])->post("/user.store",[
            "nom" => "Fokoua",
            "prenom" => "Ange",
            "sexe" => "M",
            "age" => 28,
            "telephone" => "685421578",
            "username" => "DG",
            "password" => "fokouAnge123"
        ]);
        $response->assertStatus(200);
    }

    
}

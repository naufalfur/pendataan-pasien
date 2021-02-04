<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelurahanControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function testExample()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }
    /**
     * @test
     */
    public function it_shows_index()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('kelurahan.index'));

        $response->assertStatus(200);
    }

    public function it_shows_create()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('kelurahan.create'));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_stores_data()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post(route('kelurahan.store'), [
                'nama_kelurahan' => $this->faker->words(3, true),
                'nama_kecamatan' => $this->faker->words(3, true),
                'nama_kota' => $this->faker->words(3, true)
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('kelurahan.index'));
    }

    /**
     * @test
     */
    public function it_stores_failed_data()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->from(route('kelurahan.create'))
            ->post(route('kelurahan.store'), [
                'nama' => $this->faker->words(3, true),
                'nama_kecamatan' => $this->faker->words(3, true),
                'nama_kota' => $this->faker->words(3, true)
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('kelurahan.create'));

        $response->assertSessionHasErrors('nama_kelurahan');
    }
}

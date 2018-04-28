<?php

namespace Tests\Feature;

use App\Domains\Superheros\Superhero;
use App\Domains\Superheros\SuperheroesImage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuperheroTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200);
    }

    public function testCreatePage()
    {
        $response = $this->get('/create');

        $response->assertStatus(200);
    }

    public function testEditPage()
    {
        factory(Superhero::class)->create([
            'nickname' => 'Superman',
            'real_name' => 'Clark Kent',
            'origin_description' => 'he was born Kal-El on the planet Krypton, before being rocketed to Earth as an infant by his scientist father Jor-El, moments before Krypton\'s destruction',
            'superpowers' => 'solar energy absorption and healing factor, solar flare and heat vision, solar invulnerability, flight',
            'catch_phrase' => '“ Look, up in the sky, it\'s a bird, it\'s a plane, it\'s Superman!”',
        ]);

        $response = $this->get('/edit/1');

        $response->assertStatus(200);
    }

    public function testSuperheroCreated()
    {
        $superhero = factory(Superhero::class)->create([
            'nickname' => 'Superman',
            'real_name' => 'Clark Kent',
            'origin_description' => 'he was born Kal-El on the planet Krypton, before being rocketed to Earth as an infant by his scientist father Jor-El, moments before Krypton\'s destruction',
            'superpowers' => 'solar energy absorption and healing factor, solar flare and heat vision, solar invulnerability, flight',
            'catch_phrase' => '“ Look, up in the sky, it\'s a bird, it\'s a plane, it\'s Superman!”',
        ]);

        $this->assertEquals($superhero->id, 2);
        $this->assertEquals($superhero->nickname, 'Superman');
        $this->assertEquals($superhero->real_name, 'Clark Kent');
        $this->assertEquals($superhero->origin_description, 'he was born Kal-El on the planet Krypton, before being rocketed to Earth as an infant by his scientist father Jor-El, moments before Krypton\'s destruction');
        $this->assertEquals($superhero->superpowers, 'solar energy absorption and healing factor, solar flare and heat vision, solar invulnerability, flight');
        $this->assertEquals($superhero->catch_phrase, '“ Look, up in the sky, it\'s a bird, it\'s a plane, it\'s Superman!”');

        $image = factory(SuperheroesImage::class)->create([
            'path' => 'images/teste.jpg',
            'superhero_id' => $superhero->id
        ]);

        $this->assertEquals($image->path, $superhero->images()->first()->path);
        $this->assertEquals($image->id, $superhero->images()->first()->id);

        $this->assertEquals($image->superhero->id, $superhero->id);

        $found_superhero = Superhero::first();

        $this->assertEquals($superhero->id, $found_superhero->id);
        $this->assertEquals($superhero->nickname, $found_superhero->nickname);
        $this->assertEquals($superhero->real_name, $found_superhero->real_name);
        $this->assertEquals($superhero->origin_description, $found_superhero->origin_description);
        $this->assertEquals($superhero->superpowers, $found_superhero->superpowers);
        $this->assertEquals($superhero->catch_phrase, $found_superhero->catch_phrase);
    }

    public function testCreateSuperhero()
    {
        $this->post('/store', [
            'nickname' => 'Batman',
            'real_name' => 'Bruce Wayne',
            'origin_description' => 'Batman\'s secret identity is Bruce Wayne, a wealthy American industrialist. As a child, Bruce witnessed the murder of his parents',
            'superpowers' => 'Genius-level intellect, Peak human physical condition, Skilled martial artist and hand-to-hand combatant, Expert detective, Utilizes high-tech equipment and weapons',
            'catch_phrase' => 'I\'m Batman'
        ])->assertStatus(302)->assertSessionHas('success', 'New Superhero created.');

        $this->assertDatabaseHas('superheroes', ['nickname' => 'Batman']);
    }

    public function testEditSuperhero()
    {
        $superhero = factory(Superhero::class)->create([
            'nickname' => 'Batman',
            'real_name' => 'Bruce Wayne',
            'origin_description' => 'Batman\'s secret identity is Bruce Wayne, a wealthy American industrialist. As a child, Bruce witnessed the murder of his parents',
            'superpowers' => 'Genius-level intellect, Peak human physical condition, Skilled martial artist and hand-to-hand combatant, Expert detective, Utilizes high-tech equipment and weapons',
            'catch_phrase' => 'I\'m Batman'
        ]);

        $this->post('/update', [
            'nickname' => 'Batman',
            'real_name' => 'Bruce',
            'origin_description' => 'Batman\'s secret identity is Bruce Wayne, a wealthy American industrialist. As a child, Bruce witnessed the murder of his parents',
            'superpowers' => 'Genius-level intellect, Peak human physical condition, Skilled martial artist and hand-to-hand combatant, Expert detective, Utilizes high-tech equipment and weapons',
            'catch_phrase' => 'I\'m Batman',
            'id' => $superhero->id
        ])->assertStatus(302)->assertSessionHas('success', 'Superhero edited.');

        $found_superhero = Superhero::find($superhero->id);

        $this->assertEquals($found_superhero->real_name, 'Bruce');
    }

    public function testDestroySuperhero()
    {
        $superhero = factory(Superhero::class)->create([
            'nickname' => 'Batman',
            'real_name' => 'Bruce Wayne',
            'origin_description' => 'Batman\'s secret identity is Bruce Wayne, a wealthy American industrialist. As a child, Bruce witnessed the murder of his parents',
            'superpowers' => 'Genius-level intellect, Peak human physical condition, Skilled martial artist and hand-to-hand combatant, Expert detective, Utilizes high-tech equipment and weapons',
            'catch_phrase' => 'I\'m Batman'
        ]);

        $this->get('/destroy/' . $superhero->id)->assertStatus(302)->assertSessionHas('success', 'Superhero deleted.');
    }
}

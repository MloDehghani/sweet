<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Card;
use App\Models\Category;

class CardTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    /** @test */
    public function a_user_can_create_a_card() {

        // $this->withOutExceptionHandling();
        
        $this->actingAs(User::factory()->create())->get('/cards/create')->assertStatus(200);
        
        $attributes = [
            'name' => $this->faker->name,
            'score' => random_int(100,10000),
            'description' => $this->faker->sentence,
            'category_id' => Category::factory()->create()->id
        ];


        $this->actingAs(User::factory()->create())->post('/cards',$attributes)->assertRedirect('/cards');
        $this->assertDatabaseHas('cards',$attributes);
    }

    /** @test */
    public function a_card_require_a_name() {

        $card = Card::factory()->raw(['name' => '']);

        $this->actingAs(User::factory()->create())->post('/cards',$card)
            ->assertSessionHasErrors('name');
    }    
    
    /** @test */
    public function a_card_require_a_category() {

        $card = Card::factory()->raw(['category_id' => '']);

        $this->actingAs(User::factory()->create())->post('/cards',$card)
            ->assertSessionHasErrors('category_id');
    }  

    /** @test */
    public function can_see_all_cards() {

        $this->withOutExceptionHandling();

        $attributes = [
            'name' => $this->faker->name,
            'score' => random_int(100,10000),
            // 'image' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'category_id' => Category::factory()->create()->id
        ];
        $this->actingAs(User::factory()->create())->post('/cards',$attributes);
        
        $this->get('/cards')->assertSee($attributes['name']);
    }

     /** @test */
    public function can_see_a_card() {

        $this->withOutExceptionHandling();
        $card = Card::factory()->create();
        
        $this->get($card->path())
            ->assertSee($card->name);
    }

    /** @test */
    public function a_card_has_a_path() {
        $card = Card::factory()->create();
        $this->assertEquals('/cards/' .$card->id, $card->path());
    }
    /** @test */
    public function it_belongs_to_a_category(){
        $card = Card::factory()->create();

        $this->assertInstanceOf('App\Models\Category', $card->category);
    }

}

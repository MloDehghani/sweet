<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;

class CategoryTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    /** @test */
    public function a_user_can_create_a_category() {
        $this->withOutExceptionHandling();

        $this->actingAs(User::factory()->create())->get('/categories/create')->assertStatus(200);

        $attributes =[
            'name' =>$this->faker->name,
        ];

        $this->actingAs(User::factory()->create())->post('/categories',$attributes)->assertRedirect('/categories');

        $this->assertDatabaseHas('categories',$attributes);
    }

    // /** @test */
    public function can_see_all_categories() {

        $this->withOutExceptionHandling();

        $attributes =[
            'name' =>$this->faker->name,
        ];

        $this->actingAs(User::factory()->create())->post('/categories',$attributes);
        
        $this->get('/categories')->assertSee($attributes['name']);
    }
     //  /** @test */
    public function a_category_require_a_name() {

        $category = Category::factory()->raw(['name' => '']);

        $this->actingAs(User::factory()->create())->post('/categories',$category)
            ->assertSessionHasErrors('name');
    } 

    /** @test */
    public function a_category_require_an_owner() {
        $category = Category::factory()->raw();

        $this->post('/categories',$category)
            ->assertRedirect('login');
    } 
    // /** @test */
    public function can_see_a_category() {

        $this->withOutExceptionHandling();

        $category = Category::factory()->create();
        
        $this->get($category->path())
            ->assertSee($category->name);
    }

     /** @test */
    public function a_category_has_a_path() {
        $category = Category::factory()->create();
        $this->assertEquals('/categories/' .$category->id, $category->path());
    }

    /** @test */

    public function it_belongs_to_owner(){
        $category = Category::factory()->create();

        $this->assertInstanceOf('App\Models\User', $category->owner);
    }
}

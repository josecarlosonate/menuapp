<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Category;
use App\User;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_category_api()
    {
        $category = factory(Category::class)->make();
        $data = $category->attributesToArray();
        $response = $this->json('POST','api/categories',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_category_api()
    {
        $category = factory(Category::class)->create();
        $data = factory(Category::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/categories/'.$category->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_category_api()
    {
        $category = factory(Category::class)->create();
        $response = $this->json('DELETE','api/categories/'.$category->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $category->refresh();
        $this->assertDatabaseMissing('categories',['id' => $category->id]);

    }
}

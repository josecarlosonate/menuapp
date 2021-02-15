<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_category_and_redirects()
    {

        $category = factory(Category::class)->make();
        $data = $category->attributesToArray();
        $response = $this->post(route('categories.store'), $data);
        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('status', 'Category created!');
    }

    /**
     * @test
     */
    public function it_updates_category_and_redirects()
    {
        $category = factory(Category::class)->create();
        $data = factory(Category::class)->make()->attributesToArray();
        $response = $this->put(route('categories.update', ['category' => $category]), $data);
        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('status', 'Category updated!');
    }

    /**
     * @test
     */
    public function it_destroys_category_and_redirects()
    {
        $category = factory(Category::class)->create();
        $response = $this->delete(route('categories.destroy', ['category' => $category]));
        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('status', 'Category destroyed!');
    }
}

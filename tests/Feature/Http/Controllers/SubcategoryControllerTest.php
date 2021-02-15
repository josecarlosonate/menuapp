<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Subcategory;

class SubcategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_subcategory_and_redirects()
    {

        $subcategory = factory(Subcategory::class)->make();
        $data = $subcategory->attributesToArray();
        $response = $this->post(route('subcategories.store'), $data);
        $response->assertRedirect(route('subcategories.index'));
        $response->assertSessionHas('status', 'Subcategory created!');
    }

    /**
     * @test
     */
    public function it_updates_subcategory_and_redirects()
    {
        $subcategory = factory(Subcategory::class)->create();
        $data = factory(Subcategory::class)->make()->attributesToArray();
        $response = $this->put(route('subcategories.update', ['subcategory' => $subcategory]), $data);
        $response->assertRedirect(route('subcategories.index'));
        $response->assertSessionHas('status', 'Subcategory updated!');
    }

    /**
     * @test
     */
    public function it_destroys_subcategory_and_redirects()
    {
        $subcategory = factory(Subcategory::class)->create();
        $response = $this->delete(route('subcategories.destroy', ['subcategory' => $subcategory]));
        $response->assertRedirect(route('subcategories.index'));
        $response->assertSessionHas('status', 'Subcategory destroyed!');
    }
}

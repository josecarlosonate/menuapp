<?php

namespace Tests\Feature\Http\API\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Subcategory;
use App\User;

class SubcategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_subcategory_api()
    {
        $subcategory = factory(Subcategory::class)->make();
        $data = $subcategory->attributesToArray();
        $response = $this->json('POST','api/subcategories',$data);
        $response->assertStatus(201)->assertJson(['created_at'=>true]);
    }

    /**
     * @test
     */
    public function it_updates_subcategory_api()
    {
        $subcategory = factory(Subcategory::class)->create();
        $data = factory(Subcategory::class)->make()->attributesToArray();
        $response = $this->json('PUT','api/subcategories/'.$subcategory->id,$data);
        $response->assertStatus(200)->assertJson(['updated_at'=>true]);
    }

    /**
     * @test
     */
    public function it_destroys_subcategory_api()
    {
        $subcategory = factory(Subcategory::class)->create();
        $response = $this->json('DELETE','api/subcategories/'.$subcategory->id);
        $response->assertStatus(200)->assertJson(['deleted_at'=>true]);
        $subcategory->refresh();
        $this->assertDatabaseMissing('subcategories',['id' => $subcategory->id]);

    }
}

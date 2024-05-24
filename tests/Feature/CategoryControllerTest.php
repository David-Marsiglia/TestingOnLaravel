<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

	public function test_a_category_can_be_created()
    {
		$name = 'Nuevo';
        $this->post('/categories',[
			'name' => $name,
	   	]);
		$category = Category::first();
		$this->assertNotEmpty($category);
		$this->assertEquals($category->name, $name);
    }

	public function test_a_category_can_be_updated()
    {
		$newCategoryData = [
			'name' => 'Nuevo 2',
	   	];
		$category = Category::factory()->create();
        $response = $this->put('/categories/'. $category->id, $newCategoryData);

		$this->assertNotEmpty($response);
		$this->assertDatabaseHas('categories', $newCategoryData);
    }

	public function test_list_of_categories_can_be_received()
    {
		Category::factory()->create();
        $response = $this->get('/categories');

		$response->assertStatus(200);
		$response->assertViewIs('index');
    }

	public function test_a_category_can_be_received()
    {
		$category = Category::factory()->create();
        $response = $this->get('/categories/'.$category->id);

		$response->assertStatus(200);
		$response->assertViewIs('index');
    }

	public function test_list_of_categories_for_datatables_can_be_received()
    {
		Category::factory()->create();
        $response = $this->get('/categories/get-all-dt');

		$response->assertStatus(200);
    }

	public function test_a_category_can_be_deleted()
    {
		$newCategory = Category::factory()->create();
        $this->delete('/categories/'. $newCategory->id);

		$category = Category::first();
		$this->assertEmpty($category);
    }
}
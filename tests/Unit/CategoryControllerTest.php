<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

	private static $request;

    public static function setUpBeforeClass(): void
    {
        self::$request = new CategoryRequest([
			'name' => 'Nuevo',
	   	]);
    }

    public static function tearDownAfterClass(): void
    {
        self::$request = null;
    }

	public function test_index_returns_view()
    {
        $request = new Request();
        $controller = new CategoryController();
        $response = $controller->index($request);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }
	public function test_get_all_returns_json()
    {
        $controller = new CategoryController();
        $response = $controller->getAll();
		$content = $response->getContent();
        $this->assertJson($content);
    }

	public function test_store_returns_redurection_code()
    {
        $controller = new CategoryController();
        $response = $controller->store(self::$request);
		$this->assertEquals(302, $response->getStatusCode());
    }

	public function test_show_returns_view()
    {
        $request = new Request();
		$category = new Category($request->all());
        $controller = new CategoryController();
        $response = $controller->show($request, $category);

		$this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }

	public function test_update_returns_redurection_code()
    {
    	$category = new Category(self::$request->all());
		$controller = new CategoryController();
        $response = $controller->store(self::$request, $category);

        $this->assertEquals(302, $response->getStatusCode());
    }

	public function test_destroy_returns_redurection_code()
    {
		$category = new Category(self::$request->all());
        $controller = new CategoryController();
        $response = $controller->destroy(self::$request, $category);

        $this->assertEquals(302, $response->getStatusCode());
    }
}

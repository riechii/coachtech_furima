<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class ItemControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200)
            ->assertViewIs('top_page')
            ->assertViewHas('items');
    }

    public function testSell()
    {
        $response = $this->get(route('sell'));

        $response->assertStatus(200)
            ->assertViewIs('sell');
    }

    public function listing()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $requestData = [
            'category' => $category->id,
            'situation' => '良好',
            'product_name' => 'テスト商品',
            'brand' => 'テストブランド',
            'explanation' => 'テスト説明',
            'price' => 1000,
            'image' => UploadedFile::fake()->image('test-image.jpg'),
        ];

        $response = $this->actingAs($user)
            ->post(route('listing'), $requestData);

        $response->assertRedirect('/')
            ->assertSessionHas('message', '出品されました');

        $this->assertDatabaseHas('items', [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'situation' => 'new',
            'product_name' => 'Test Product',
            'brand' => 'Test Brand',
            'explanation' => 'Test explanation',
            'price' => 1000,
        ]);
    }

    public function testItem()
    {
        $item = Item::factory()->create();
        $category = Category::factory()->create();

        $response = $this->get(route('item', ['item_id' => $item->id]));
        $response->assertStatus(200)
            ->assertViewIs('item_detail')
            ->assertViewHas('item', $item);
    }

    public function testSearch()
    {
        $item = Item::factory()->create(['product_name' => 'テスト商品', 'explanation' => 'テスト説明']);

        $itemId = $item->id;

        $url = route('item', ['item_id' => $itemId]);
        $keyword = 'テスト';

        $response = $this->get($url);

        $response->assertStatus(200);
        $response->assertViewIs('item_detail')
            ->assertSee($item->product_name)
            ->assertSee($item->explanation);
}
}

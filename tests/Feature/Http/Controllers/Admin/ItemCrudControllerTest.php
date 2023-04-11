<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemCrudControllerTest extends TestCase
{
    use RefreshDatabase;

    private ?User $user = null;

    protected function setup(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->user = null;
    }


    public function testCreate()
    {
        // 準備 (Arrange)
        $this->assertDatabaseCount('items', 0);
        $item_params = ['name' => 'Item1', 'price' => 1, 'description' => 'Desc1'];
        // 実行 (Action)
        $response = $this->actingAs($this->user, backpack_guard_name())
            ->post(backpack_url('item'), $item_params);

        // 宣言 (Assert)
        $response->assertRedirect('/admin/item');
        $this->assertDatabaseCount('items', 1);
        $this->assertDatabaseHas('items', $item_params);

    }
}

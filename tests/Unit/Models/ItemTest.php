<?php

namespace Tests\Unit\Models;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate(): void
    {
        // 準備 (Arrange)
        $this->assertDatabaseCount('items', 0);
        $item_params = ['name' => 'Item1', 'price' => 1, 'description' => 'Desc1'];
        // 実行 (Action)
//        Item::factory($item_params)->create();
        $item = new Item($item_params);
        $item->save();
        // 宣言 (Assert)
        $this->assertDatabaseCount('items', 1);
        $this->assertDatabaseHas('items', $item_params);
    }


}

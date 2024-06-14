<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory()->create([
            'id' => 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    
        Book::factory(10)->create();

        Cart::factory()->create([
            'id' => 1,
            'user_id' => 1
        ]);

        CartItem::factory()->create([
            'id' => 1,
            'quantity' => 1,
            'book_id' => 1,
            'cart_id' => 1
        ]);

        CartItem::factory()->create([
            'id' => 2,
            'quantity' => 2,
            'book_id' => 2,
            'cart_id' => 1
        ]);

        // Write search in tinker to see all Cart items inside cart with id 1
        // $cart = Cart::find(1);

    }
}

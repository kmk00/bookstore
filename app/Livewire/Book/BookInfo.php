<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Attributes\Url;
use Livewire\Component;

class BookInfo extends Component
{
    
    // Book ID
    public $id;

    public function addToCart(){
        $book = Book::find($this->id);

        // Check if user is logged in if not redirect to login page
        if(!auth()->check()){
            return redirect('/login');
        }

        $user = auth()->user();

        // Get user's cart
        $usersCart = Cart::where('user_id', $user->id )->first();

        // If user has no cart create one
        if(!$usersCart){
            $usersCart = Cart::create([
                'user_id' => $user->id
            ]);
        }

        // Create cart item and add into cart
        CartItem::create([
            'book_id' => $book->id,
            'quantity' => 1,
            'cart_id' => $usersCart->id
        ]);

        // Send message to user
        session()->flash('message', 'Book added to cart successfully');

        return redirect('/');
        
    }

    public function render()
    {

        return view('livewire.book.book-info',[
            'book' => Book::find($this->id),
        ]);
    }
}

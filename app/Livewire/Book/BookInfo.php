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

    public function addToCart($bookId = null){


        if($bookId != null){
            // bookId passed in Welcome page
            $this->id = $bookId;
        }
        
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


        // Check if book is already in cart
        $cartItem = CartItem::where('cart_id', $usersCart->id)->where('book_id', $book->id)->first();
        if($cartItem){
            // Update quantity
            $cartItem->update([
                'quantity' => $cartItem->quantity + 1,
                'totalPrice' => $cartItem->price * $cartItem->quantity
            ]);

            //Update cart total price
            $usersCart->update([
                'totalPrice' => $usersCart->totalPrice + $book->price
            ]);


            $this->dispatch('cart-changed');
            // Send message to user
            session()->flash('message', $book->title . ' has been added to cart successfully!');
            return ;
        }

        // Create cart item and add into cart
        CartItem::create([
            'book_id' => $book->id,
            'price' => $book->price,
            'quantity' => 1,
            'totalPrice' => $book->price,
            'cart_id' => $usersCart->id
        ]);

        

        $usersCart->update([
            'totalPrice' => $book->price + $usersCart->totalPrice
        ]);

        $this->dispatch('cart-changed');
        // Send message to user
        session()->flash('message', $book->title . ' has been added to cart successfully!');

        
    }

    public function render()
    {
        return view('livewire.book.book-info',[
            'book' => Book::find($this->id),
        ]);
    }
}

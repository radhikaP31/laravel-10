<?php

namespace App\Listeners;

use App\Events\ItemAddToCart;
use App\Models\Products;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStock
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ItemAddToCart $event): void
    {
        // update product quantity
        $productData = Products::find($event->productId);
        $productData->quantity = $productData->quantity - $event->quantity;
        $productData->save();
    }
}

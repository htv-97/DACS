<?php

namespace App;


class Wish
{
    public $items = null;
    public $totalQty = 0;

    public function __construct($oldWishlist){
        if($oldWishlist){
            $this->items = $oldWishlist->items;
            $this->totalQty = $oldWishlist->totalQty;
        }

    }

    public function add($item,$id){
        $isSale = ($item->unit_price >=  $item->promotion_price && $item->promotion_price !== null);
        $wishlist = ['id'=>$item->id,'isSale'=>$isSale,'unit_price' =>$item->unit_price,'promotion_price'=>$item->promotion_price, 
                    'item' => $item,'name'=>$item->name,'image'=>$item->image];

        if($this->items && array_key_exists($id, $this->items)){
            unset($this->items[$id]);
            $this->totalQty --;
        }
        else
        {   
            $this->items[$id] = $wishlist;
            $this->totalQty ++;
        }
    }
    // public function reduceByOne($id){
    //     $this->items[$id]['qty']--;
    //     $this->items[$id]['price'] -= $this->items[$id]['priceItem'];
    //     $this->totalQty--;
    //     $this->totalPrice -= $this->items[$id]['priceItem'];

    //     if($this->items[$id]['qty']<=0){
    //         unset($this->items[$id]);
    //     }
    // }

}

<?php

namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function add($item, $qty,$id){
        $price = ($item->unit_price >=  $item->promotion_price && $item->promotion_price !== null) 
                    ?  $item ->promotion_price :  $item ->unit_price;
        // $pricePromotion = $item ->promotion_price; 
        // $priceItem = (($pricePromotion < $priceUnit) && $pricePromotion !== null) ? $pricePromotion : $priceUnit;
        $giohang = ['qty'=>0, 'price' =>$price, 'item' => $item,'priceItem'=>$price];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }

        $giohang['qty'] += $qty;
        $giohang['price'] = $price * $giohang['qty'];
        $this->items[$id] = $giohang;
        $this->totalQty += $qty;
        $this->totalPrice += $price * $qty;
        // dd($item ->promotion_price,$item->unit_price,
        // $item->unit_price >=  $item->promotion_price,$price,$this);
    }
    public function reduceByOne($id){
        if($this->items[$id]){
            $this->items[$id]['qty']--;
            $this->items[$id]['price'] -= $this->items[$id]['priceItem'];
            $this->totalQty--;
            $this->totalPrice -= $this->items[$id]['priceItem'];
            if($this->items[$id]['qty']<=0){
                unset($this->items[$id]);
            }
        }
    }
    public function increaseByOne($id){
        if($this->items[$id]){
            $this->items[$id]['qty']++;
            $this->items[$id]['price'] += $this->items[$id]['priceItem'];
            $this->totalQty++;
            $this->totalPrice += $this->items[$id]['priceItem'];
        }
    }
    //xóa nhiều
    public function removeItem($id){
        if($this->items[$id]){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }
    public function updateQty($id,$qty){
        if($this->items[$id]){
            $oldQty = $this->items[$id]['qty'];
            $price = $this->items[$id]['priceItem'];
            $this->items[$id]['qty'] = $qty;
            $this->items[$id]['price'] = $price * $qty;
            $this->totalQty += ($qty - $oldQty) ;
            $this->totalPrice += ($qty - $oldQty)*$price;
        }
    }
}

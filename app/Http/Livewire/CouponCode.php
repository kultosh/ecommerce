<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Coupon;

class CouponCode extends Component
{
    public $coupon;

    public function applyCoupon()
    {
        $couponCode = $this->coupon;
        $couponData = Coupon::where('code', $couponCode)->first();
        if(!$couponData)
        {
            return back()->withMessage('Sorry! Coupon does not exist');
        }

        //coupon logic
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total',
            'value' => $couponData->value,
        ));

        //for a specific users cart
        \Cart::session(auth()->id())->condition($condition);

        $this->emit('couponDiscount');
    }

    public function render()
    {
        return view('livewire.coupon-code');
    }
}

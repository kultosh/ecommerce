<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    public function getExpressCheckout()
    {
        $checkoutData = $this->checkoutData();

        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($checkoutData);
        return redirect($response['paypal_link']);
    }

    private function checkoutData()
    {
        $cart = \Cart::session(auth()->id());

        $cartItems = array_map(function($item){
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity'],
            ];
        }, $cart->getContent()->toArray());

        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success'),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Order description",
            'total' => $cart->getTotal(),
        ];

        return $checkoutData;
    }

    public function cancelPage()
    {
        dd('payment_failed');
    }

    public function getExpressCheckoutSuccess(Request $request)
    {
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();

        $checkoutData = $this->checkoutData();

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);

            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
        }

        dd('Payment Successful');

    }
}

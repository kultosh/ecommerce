@extends('layouts.front')

@section('content')
    <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>cart page</h2>
                <ul>
                    <li><a href="#">home</a></li>
                    <li> cart page</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- shopping-cart-area start -->
        <div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="cart-heading">Cart</h1>
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>remove</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="product-remove"><a href="{{ route('cart.destroy', $item->id) }}"><i
                                                        class="pe-7s-close"></i></a></td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="/storage/{{ $item->attributes['cover_img'] }}"
                                                        alt="Img"></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{ $item->name }}</a></td>
                                            <td class="product-price-cart"><span
                                                    class="amount">${{ Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</span>
                                            </td>
                                            <td class="product-quantity">
                                                <form method="post" action="{{ route('cart.update', $item->id) }}">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <input name="quantity" type="number" value={{ $item->quantity }}>
                                                    <input type="submit" class="button" value="Save">
                                                </form>
                                            </td>
                                            <td class="product-subtotal">${{ \Cart::session(auth()->id())->getTotal() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <form action="{{ route('cart.coupon') }}" method="get">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                                placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal<span>100.00</span></li>
                                        <li>Total<span>$ {{ \Cart::session(auth()->id())->getTotal() }}</span></li>
                                    </ul>
                                    <a href="{{ route('cart.checkout') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('front.master-payments')
@section('content')
  <!-- offer block end  -->
 <br>


        {{--  --}}
        <main class="main">
        	{{-- <div class="page-header text-center" style="background-image: url('{{asset('theme/assets/images/page-header-bg.jpg')}}')"> --}}
        		<div class="container">
        			<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                        <li>
                            <a href="{{url('/')}}/shopping-cart">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/shopping-cart/checkout/payment">Billing Details</a>
                        </li>
                        <li class="active">
                            <a href="{{url('/')}}/shopping-cart/checkout/payment-last">Checkout</a>
                        </li>
                        <li class="disabled">
                            <a href="#">Order Complete</a>
                        </li>
                    </ul>

        		</div><!-- End .container -->



            <div class="page-content">
            	<div class="checkout">
	                <div class="container" style="margin:0px auto !important">
                        <center>
            			<div class="checkout-discount text-center col-lg-6">
            				<form action="#" method="POST" id="submit-coupon">
                                @csrf
                                <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code then press enter</span></label>
        						<input autocomplete="off" type="text" name="code" class="form-control" required id="checkout-discount-input">

            				</form>

            			</div><!-- End .checkout-discount -->
                        <p id="coupon-processing" style="color:#66139B; font-weight:600;">Processing....</p>
                        </center>

                        {{-- <p id="remove-coupon" style="color:#66139B; font-weight:600;"><a href="">Remove</a></p> --}}

		                	<div class="row">

                                @if(Session::has('coupon'))
                                <aside class="col-lg-6" style="margin:0px auto !important">
		                			<div class="cart-summary">
		                				<h3 class="summary-title">Your Order #{{$OrderNumberNumber}}</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
                                                @foreach($CartItems as $CartItem)
                                                <?php
                                                                $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                                ?>
                                                @foreach($Products as $Product)
		                						<tr>
		                							<td><a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}} <strong>x</strong> {{$CartItem->qty}}</a></td>
		                							<td><strong>KES</strong> {{$CartItem->price}}</td>
		                						</tr>
                                                @endforeach
                                                @endforeach


		                						<tr class="summary-subtotal">
		                							<td><strong>Subtotal:</strong></td>
		                							<td>{{Cart::subtotal()}}</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td><strong>Shipping:</strong></td>
		                							<td><strong>KES</strong> {{$Shipping}}</td>
		                						</tr>
                                                <tr>
		                							<td><strong>Coupon Discount:</strong></td>
		                							<td><strong>KES</strong> {{ Session::get('coupon')}}</td>
		                						</tr>

		                						<tr class="summary-total">
		                							<td><strong>Total:</strong></td>
		                							<td><strong>KES</strong>
                                                        <?php
                                                          //remove comma
                                                          $Subtotal = Cart::subtotal();
                                                          $WithCoupon = Session::get('coupon-total');
                                                          $PrepSubtotal = str_replace(',', '', $WithCoupon);
                                                          $WholeSubtotal = ceil($PrepSubtotal);
                                                          $TheTotal = $WholeSubtotal + $Shipping;
                                                          echo $TheTotal;
                                                        ?>

                                                     </td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->



		                				<div class="accordion-summary" id="accordion-payment">

                                            @if($location == 'Nairobi')
                                                <div class="container" style="padding:30px;">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <a href="https://wa.me/254790721397?text=Hello, my name is {{Auth::user()->name}}, I am placing an order for :{{$Product->name}} Quantity:{{$CartItem->qty}}" class="btn btn-primary btn-icon-right btn-rounded btn-md">
                                                                    <span class="btn-text">Order With WhatsApp</span> <i class="fab fa-whatsapp"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <a title="Cash On Delivery" href="https://wa.me/254790721397?text=Hello, my name is {{Auth::user()->name}}, I am placing an order for :{{$Product->name}} Quantity:{{$CartItem->qty}}" class="btn btn-primary btn-icon-right btn-rounded btn-md">
                                                                    <span class="btn-text">Place Order Now</span> <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif



										</div><!-- End .accordion -->

		                				<a href="{{url('/')}}/dashboard" type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text"><i class="icon-user"></i> My Account</span>
		                					<span class="btn-hover-text">Proceed to My Account</span>
                                        </a>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
                                @else
		                		<aside class="col-lg-6" style="margin:0px auto !important">
		                			<div class="summary" style="margin:0px !important">
		                				<h3 class="summary-title">Your Order #{{$OrderNumberNumber}}</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
                                                @foreach($CartItems as $CartItem)
                                                    <?php
                                                        $Products = DB::table('product')->where('id',$CartItem->id)->get();
                                                    ?>
                                                    @foreach($Products as $Product)
                                                    <tr>
                                                        <td><a href="{{url('/')}}/product/{{$Product->slung}}">{{$Product->name}} <strong>x</strong> {{$CartItem->qty}}</a></td>
                                                        <td><strong>KES</strong> {{$CartItem->price}}</td>
                                                    </tr>
                                                    @endforeach
                                                @endforeach


		                						<tr class="summary-subtotal">
		                							<td><strong>Subtotal:</strong></td>
		                							<td>{{Cart::subtotal()}}</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td><strong>Shipping:</strong></td>
		                							<td><strong>KES</strong> {{$Shipping}}</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td><strong>Total:</strong></td>
		                							<td><strong>KES</strong>
                                                        <?php
                                                          //remove comma
                                                          $Subtotal = Cart::subtotal();
                                                          $PrepSubtotal = str_replace(',', '', $Subtotal);
                                                          $WholeSubtotal = ceil($PrepSubtotal);
                                                          $TheTotal = $WholeSubtotal + $Shipping;
                                                          echo $TheTotal;
                                                        ?>
                                                     </td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">



                                            @if($location == 'Nairobi')

                                                <div class="container" style="padding:30px;">
                                                    {{-- <div class="col-lg-12"> --}}
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <a href="https://wa.me/254790721397?text=Hello, my name is {{Auth::user()->name}}, I am placing an order for :{{$Product->name}} Quantity:{{$CartItem->qty}}" class="btn btn-primary btn-icon-right btn-rounded btn-md">
                                                                    <span class="btn-text">Order With WhatsApp</span> <i class="fab fa-whatsapp"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <a title="Cash On Delivery" href="{{url('/')}}/shopping-cart/checkout/placeOrder" class="btn btn-primary btn-icon-right btn-rounded btn-md">
                                                                    <span class="btn-text">Place Order Now</span> <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    {{-- </div> --}}
                                                </div>


                                            @endif


										</div><!-- End .accordion -->



		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
                                @endif
		                	</div><!-- End .row -->

	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        {{--  --}}



@endsection

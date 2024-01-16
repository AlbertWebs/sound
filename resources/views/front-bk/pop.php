@foreach ($Product as $product)
<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
	<div class="row">
		<div class="col-md-6 product-single-gallery mb-md-0">
			<div class="product-slider-container">
				<div class="label-group">
					<?php $HotProduct = DB::table('orders_products')->where('products_id',$product->id)->get() ?>
					@if($HotProduct->isEmpty())

					@else
					<div class="product-label label-hot">HOT</div>
					@endif
					<!---->
					@if($product->offer == 1)
					<div class="product-label label-sale">
						-<?php 
						     $Original = $product->price_raw;
							 $OfferPrice = $product->price;
							 $percentage = ($OfferPrice*100)/$Original;
                             $less = 100-ceil($percentage);
							 echo $less
						 ?>%
						
					</div>
					@endif
				</div>

				<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
					<div class="product-item">
						<img class="product-single-image" src="{{url('/')}}/uploads/product/{{$product->fb_pixels}}"
							data-zoom-image="{{url('/')}}/uploads/product/{{$product->fb_pixels}}" />
					</div>
					<div class="product-item">
						<img class="product-single-image" src="{{url('/')}}/uploads/product/{{$product->thumbnail}}"
							data-zoom-image="{{url('/')}}/uploads/product/{{$product->thumbnail}}" />
					</div>
					@if($product->image_one == null)

					@else
					<div class="product-item">
						<img class="product-single-image" src="{{url('/')}}/uploads/product/{{$product->image_one}}"
							data-zoom-image="{{url('/')}}/uploads/product/{{$product->image_one}}" />
					</div>
					@endif
					@if($product->image_two == null)

					@else
					<div class="product-item">
						<img class="product-single-image" src="{{url('/')}}/uploads/product/{{$product->image_two}}"
							data-zoom-image="{{url('/')}}/uploads/product/{{$product->image_two}}" />
					</div>
					@endif

					@if($product->image_three == null)

					@else
					<div class="product-item">
						<img class="product-single-image" src="{{url('/')}}/uploads/product/{{$product->image_three}}"
							data-zoom-image="{{url('/')}}/uploads/product/{{$product->image_three}}" />
					</div>
					@endif


				</div>
				<!-- End .product-single-carousel -->
			</div>
			<div class="prod-thumbnail owl-dots">
				<div class="owl-dot">
					<img width="150" src="{{url('/')}}/uploads/product/{{$product->fb_pixels}}" />
				</div>
				<div class="owl-dot">
					<img width="150" src="{{url('/')}}/uploads/product/{{$product->thumbnail}}" />
				</div>

				@if($product->image_one == null)

				@else
				<div class="owl-dot">
					<img src="{{url('/')}}/uploads/product/{{$product->image_one}}" />
				</div>
				@endif

				@if($product->image_two == null)

				@else
				<div class="owl-dot">
					<img src="{{url('/')}}/uploads/product/{{$product->image_two}}" />
				</div>
				@endif

				@if($product->image_three == null)

				@else
				<div class="owl-dot">
					<img src="{{url('/')}}/uploads/product/{{$product->image_three}}" />
				</div>
				@endif
				
			</div>
		</div><!-- End .product-single-gallery -->

		<div class="col-md-6">
			<div class="product-single-details mb-0 ml-md-4">
				<h1 class="product-title">{{$product->name}}</h1>

				<div class="ratings-container">
					<div class="product-ratings">
						<span class="ratings" style="width:60%"></span><!-- End .ratings -->
					</div><!-- End .product-ratings -->

					<a href="#" class="rating-link">( 6 Reviews )</a>
				</div><!-- End .ratings-container -->

				<hr class="short-divider">

				{{-- Check Currency --}}
				@if (session()->has('rates'))
                    
                        <?php
                             $rates = Session::get('rates');
                             $Rates = DB::table('rates')->where('rates',$rates)->get();    
                        ?>
						@foreach ($Rates as $rt)
                        <div class="price-box">
							<span class="product-price"> {{$rt->symbol}}<?php $total = $product->price*$rt->rates; echo ceil($total) ?></span>
						</div><!-- End .price-box -->
						@endforeach
                    
                @else

				@endif
				{{-- End currency check --}}
				
				
				<div class="product-desc">
					<p>
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
						pariatur. Excepteur sint occaecat cupidatat non.
					</p>
				</div><!-- End .product-desc -->

				<ul class="single-info-list">
					<!---->
					<li>
						SKU:
						<strong>654613612</strong>
					</li>

					<li>
						CATEGORY:
						<strong>
							<a href="#" class="product-category">SHOES</a>
						</strong>
					</li>
				</ul>

				<div class="product-filters-container">
					<div class="product-single-filter">
						<label>Size:</label>
						<ul class="config-size-list">
							<li><a href="javascript:;" class="d-flex align-items-center justify-content-center">XL</a>
							</li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">L</a></li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">M</a></li>
							<li class=""><a href="javascript:;"
									class="d-flex align-items-center justify-content-center">S</a></li>
						</ul>
					</div>

					<div class="product-single-filter">
						<label></label>
						<a class="font1 text-uppercase clear-btn" href="#">Clear</a>
					</div>
					<!---->
				</div>

				<div class="product-action">
					<div class="price-box product-filtered-price">
						<del class="old-price"><span>$286.00</span></del>
						<span class="product-price">$245.00</span>
					</div>

					<div class="product-single-qty">
						<input class="horizontal-quantity form-control" type="text" />
					</div><!-- End .product-single-qty -->

					<a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to Cart</a>

					<a href="#" class="btn view-cart d-none">View cart</a>
				</div><!-- End .product-action -->

				<hr class="divider mb-0 mt-0">

				<div class="product-single-share mb-0">
					<label class="sr-only">Share:</label>

					<div class="social-icons mr-2">
						<a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
							title="Facebook"></a>
						<a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
						<a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
							title="Linkedin"></a>
						<a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
							title="Google +"></a>
						<a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
					</div><!-- End .social-icons -->

					<a href="#" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
							class="icon-wishlist-2"></i><span>Add to
							Wishlist</span></a>
				</div><!-- End .product single-share -->
			</div>
		</div><!-- End .product-single-details -->

		<button title="Close (Esc)" type="button" class="mfp-close">
			×
		</button>
	</div><!-- End .row -->
</div><!-- End .product-single-container -->
@endforeach
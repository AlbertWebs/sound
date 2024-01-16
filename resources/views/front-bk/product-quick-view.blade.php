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
                             if($Original < 1)
                             {
                                $Original = 1;
                             }
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
					<?php $Reviews = DB::table('reviews')->where('product_id',$product->id)->get(); ?>
					@if($Reviews->isEmpty())
					<div class="product-ratings">
						<span class="ratings" style="width:0%"></span><!-- End .ratings -->
					</div><!-- End .product-ratings -->

					<a href="#" class="rating-link">( <?php echo count($Reviews); ?> Review(s) )</a>
					@else
					<?php $ReviewsAvg = DB::table('reviews')->where('product_id',$product->id)->avg('rating'); ?>
					<div class="product-ratings">
						<span class="ratings" style="width:{{$ReviewsAvg}}%"></span><!-- End .ratings -->
					</div><!-- End .product-ratings -->

					<a href="#" class="rating-link">( <?php echo count($Reviews); ?> Reviews )</a>
					@endif

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
						{{$product->meta}}
					</p>
				</div><!-- End .product-desc -->

				<ul class="single-info-list">
					<!---->
					<li>
						Code:
						<strong>{{$product->code}}</strong>
					</li>

					<li>
						CATEGORY:
						<strong>

							<?php $Category = DB::table('category')->where('id',$product->cat)->get(); ?>
                            @foreach($Category as $cat)
                            <a target="new" href="{{url('/')}}/products/{{$cat->slung}}" class="product-category">{{$cat->cat}}</a>
                            @endforeach
						</strong>
					</li>
					<li>
						Brand:
						<strong>{{$product->brand}}</strong>
					</li>
				</ul>

				{{-- Variations here --}}

				{{-- Variations --}}

				<div class="product-action">

                    <form>
						<div class="product-single-qty">
							<input class="horizontal-quantity form-control" type="text" />
						</div><!-- End .product-single-qty -->

						<a href="{{url('/')}}/shopping-cart/add-to-cart/{{$product->id}}" class="btn btn-dark" title="Add to Cart"><span class="fas fa-cart-plus"></span> Add to Cart</a>
					</form>


				</div><!-- End .product-action -->

				<hr class="divider mb-0 mt-0">

				<div class="product-single-share mb-0">
					<label class="sr-only">Share:</label>

					<div class="social-icons mr-2">
						<a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/product/{{$product->slung}}" class="social-icon social-facebook icon-facebook" target="_blank"
							title="Facebook"></a>
						<a href="https://twitter.com/intent/tweet?text={{$product->name}} {{url('/')}}/product/{{$product->slung}}" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
						<a href="https://www.linkedin.com/sharing/share-offsite/?url={{url('/')}}/product/{{$product->slung}}" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
							title="Linkedin"></a>


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

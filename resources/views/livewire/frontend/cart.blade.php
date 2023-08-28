<div>
   
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" wire:ignore.self>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

                                @forelse ($contents as $item)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ Storage::disk('uploads')->url( $item['thumbnail'] ) }}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{ $item['name'] }}</td>
									<td class="column-3">${{ $item['price']  }}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="decrease({{ $item['id'] }}, {{ $item['qty'] }})">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1"  min="1" value="{{ $item['qty']  }}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="increase({{ $item['id'] }}, {{ $item['qty'] }})">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">${{ $item['price'] * $item['qty']  }} </td>
								</tr>
                                @empty
                            
                                <li class="header-cart-item flex-w flex-t m-b-12">
                                   Empty!
                                </li>
                                @endforelse
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50"  wire:ignore.self>
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									${{ Cart::subtotal() }}
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="country" wire:model.prevent="state.country" placeholder="Enter your a country...">
										@error('country')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" wire:model.prevent="state.state" placeholder="Enter your State /  country">
										@error('state')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" wire:model.prevent="state.postal_code" placeholder="Enter your Postcode / Zip">
										@error('country')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
									<div class="bor8 bg0 m-b-22">
										<select name="" id="payment_method" class="stext-111 cl8 plh3 size-111 p-lr-15">
											<option value="1" selected>Cash In Hand</option>
										</select>
										@error('payment_method')
											<strong class="text-danger">{{ $message }}</strong>
										@enderror
									</div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									${{ Cart::subtotal() }}
								</span>
							</div>
						</div>

						<button wire:click.prevent="checkout" id="checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
		@push('js')
			<script>
				$(document).ready(function () {
					$("#checkout").on("click", function (e) { 
						@this.set('state.payment_method', $("#payment_method").val(), true);
					});
				});
			</script>
		@endpush
</div>

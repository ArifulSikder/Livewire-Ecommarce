<x-frontend-layout>

	@php
		$sliders = collect([
			[
			"background_image" => "frontend/images/slide-01.jpg",
			"collection" => "Women Collection 2018",
			"session" => "NEW SEASON",
			"product_slug" => "product.html",

			]
		]);
	@endphp

	<livewire:frontend.home-slider :sliders="$sliders">

	<livewire:frontend.home-banner>

	

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<livewire:frontend.filter-products-with-category>

			<livewire:frontend.products>
		</div>
	</section>
</x-frontend-layout>

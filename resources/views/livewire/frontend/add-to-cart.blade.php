<div  wire:ignore.self>
    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="decrease">
            <i class="fs-16 zmdi zmdi-minus"></i>
        </div>

        <input class="mtext-104 cl3 txt-center num-product" type="number" min="1" name="num-product" value="1"
            wire:model.defer="quantity">

        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="increase">
            <i class="fs-16 zmdi zmdi-plus"></i>
        </div>
    </div>

    <button wire:click.prevent='addToCart({{ $product }})'
        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
        Add to cart
    </button>
</div>

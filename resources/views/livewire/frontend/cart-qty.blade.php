<div>
    <div wire:click.prevent="$emit('cartContent')" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ $count ? $count : Cart::count() }}">
        <i class="zmdi zmdi-shopping-cart"></i>
    </div>
</div>

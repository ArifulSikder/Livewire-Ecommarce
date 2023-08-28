<div>
    <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                All Products
            </button>

            @foreach ($categories as $category)
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $category->category_id }}">
                {{ $category->name }}
            </button>
            @endforeach

        </div>

        <div class="flex-w flex-c-m m-tb-10">
            <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                 Filter
            </div>

            <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                Search
            </div>
        </div>
        
        <!-- Search product -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
            <div class="bor8 dis-flex p-l-15">
                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>

                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
            </div>	
        </div>

        <!-- Filter -->
        <div class="dis-none panel-filter w-full p-t-10">
            <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                <div class="filter-col1 p-r-15 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">
                        Sort By
                    </div>

                    <ul>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                Default
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                Popularity
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                Average rating
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                Newness
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                Price: Low to High
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                Price: High to Low
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="filter-col2 p-r-15 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">
                        Price
                    </div>

                    <ul>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                All
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                $0.00 - $50.00
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                $50.00 - $100.00
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                $100.00 - $150.00
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                $150.00 - $200.00
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 trans-04">
                                $200.00+
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="filter-col3 p-r-15 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">
                        Color
                    </div>

                    <ul>
                        <li class="p-b-6">
                            <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                <i class="zmdi zmdi-circle"></i>
                            </span>

                            <a href="#" class="filter-link stext-106 trans-04">
                                Black
                            </a>
                        </li>

                        <li class="p-b-6">
                            <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                <i class="zmdi zmdi-circle"></i>
                            </span>

                            <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                Blue
                            </a>
                        </li>

                        <li class="p-b-6">
                            <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                <i class="zmdi zmdi-circle"></i>
                            </span>

                            <a href="#" class="filter-link stext-106 trans-04">
                                Grey
                            </a>
                        </li>

                        <li class="p-b-6">
                            <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                <i class="zmdi zmdi-circle"></i>
                            </span>

                            <a href="#" class="filter-link stext-106 trans-04">
                                Green
                            </a>
                        </li>

                        <li class="p-b-6">
                            <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                <i class="zmdi zmdi-circle"></i>
                            </span>

                            <a href="#" class="filter-link stext-106 trans-04">
                                Red
                            </a>
                        </li>

                        <li class="p-b-6">
                            <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                <i class="zmdi zmdi-circle-o"></i>
                            </span>

                            <a href="#" class="filter-link stext-106 trans-04">
                                White
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="filter-col4 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">
                        Tags
                    </div>

                    <div class="flex-w p-t-4 m-r--5">
                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Fashion
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Lifestyle
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Denim
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Streetstyle
                        </a>

                        <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Crafts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

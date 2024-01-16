<div class="header-middle sticky-header fix-top sticky-content">
    <div class="container">
        <div class="header-left">
            <a href="#" class="mobile-menu-toggle">
            <i class="d-icon-bars2"></i>
            </a>
            <a href="{{url('/')}}" class="logo mr-4">
            <img src="{{url('/')}}/uploads/theme-logo.png" alt="logo" width="183" height="53" />
            </a>
        </div>
        <div class="header-center mr-xl-6 ml-xl-8">
            <div class="header-search hs-simple mr-0">
            <form action="#" method="get" class="input-wrapper">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value>All Categories</option>
                        <?php $Categories = DB::table('category')->inRandomOrder()->get(); ?>
                        @foreach ($Categories as $cat)
                        <option value="4">{{$cat->cat}}</option>
                        @endforeach

                    </select>
                </div>
                <input type="text" class="form-control" name="search" id="search" placeholder="Search..." required>
                <button class="btn btn-sm btn-search" type="submit" title="submit-button"><i class="d-icon-search"></i></button>
            </form>
            </div>
        </div>
        <div class="header-right">
            <a href="tel:#" class="icon-box icon-box-side mr-lg-3">
            <div class="icon-box-icon mr-0 mr-lg-2">
                <i class="d-icon-phone"></i>
            </div>
            <div class="icon-box-content d-lg-show">
                <h4 class="icon-box-title">Call Us Now:</h4>
                <p>{{$Settings->mobile}}</p>
            </div>
            </a>

            <span class="divider"></span>
            <div class="dropdown cart-dropdown type2 off-canvas mr-0 mr-lg-2">
            <a href="#" class="cart-toggles label-block link">
                <div class="cart-label d-lg-show ls-normal">
                    <span class="cart-name">Shopping Cart:</span>
                    <span class="cart-price">kes 12500.00</span>
                </div>
                <i class="d-icon-bag"><span class="cart-count">2</span></i>
            </a>
            <div class="canvas-overlay"></div>

            </div>
        </div>
    </div>
</div>

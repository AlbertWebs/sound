<section class="search-section" style="background-color: #f4f4f4;">
    <div class="container">
        <div class="search-name d-lg-flex align-items-center appear-animate"
            data-animation-name="fadeInUpShorter">
            <h2 class="search-title"><i class="icon-business-book"></i>Filter To
                Find Exact Audio Fit:</h2>
            <h4 class="search-info">Shop for your specific vehicle audio parts.
            </h4>
        </div>
        <div class="row search-form appear-animate" data-animation-name="fadeInUpShorter">
            <div class="col-md-6 col-lg-5">
                <div class="select-custom">
                    <select class="form-control mb-0">
                        <option>By Brand</option>
                        <?php $Brand = DB::table('brands')->get(); ?>
                        @foreach ($Brand as $brand)
                        <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="select-custom">
                    <select class="form-control mb-0">
                        <option>By Category</option>
                        <?php $Category = DB::table('category')->get(); ?>
                        @foreach ($Category as $cat)
                        <option value="{{$cat->cat}}">{{$cat->cat}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-md-6 col-lg-3">
                <div class="select-custom">
                    <select class="form-control mb-0">
                        <option>By product-year</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                    </select>
                </div>
            </div> --}}
            <div class="col-md-6 col-lg-2">
                <a href="demo42-shop.html"
                    class="btn btn-borders btn-rounded btn-outline-primary ls-25 btn-block">Find
                    Audio Parts</a>
            </div>
        </div>
    </div>
</section>
<ul class="mobile-menu mmenu-anim">
    <li>
        <a href="{{url('/')}}">Home</a>
    </li>

    <li>
        <a href="{{url('/')}}/products">All Products</a>
    </li>

    <?php
       $CategoriesList = DB::table('category')->get();
    ?>

    @foreach ($CategoriesList as $CatLists)
    <li>
        <a href="{{url('/')}}/products/{{$CatLists->slung}}">
            {{$CatLists->cat}}
        </a>
    </li>
    @endforeach
</ul>

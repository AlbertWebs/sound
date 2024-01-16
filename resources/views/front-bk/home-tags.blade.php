<section class="subcats-section container">
    <div class="row">
        <div class="col-md-4 part-item appear-animate" data-animation-name="fadeInLeftShorter">
            <h3>Popular Searches:</h3>
            <?php $TagsOne = DB::table('tags')->orderBy('id','ASC')->limit('5')->get(); ?>
            <ul class="list-unstyled mb-0">
                @foreach ($TagsOne as $tagOne)
                <li><a href="{{url('/')}}/product-tags/{{$tagOne->slung}}">{{$tagOne->title}}</a></li>
                @endforeach
                <li><a class="show-action" href="{{url('/')}}/products">Show All</a></li>
            </ul>
        </div>
        <div class="col-md-4 part-item appear-animate" data-animation-name="fadeInLeftShorter"
            data-animation-delay="200">
            <h3>Popular Tags:</h3>
            <?php $TagsThree = DB::table('tags')->inRandomOrder()->limit('6')->get(); ?>
            <ul class="list-unstyled mb-0">
                @foreach ($TagsThree as $tagThree)
                <li><a href="{{url('/')}}/product-tags/{{$tagThree->slung}}">{{$tagThree->title}}</a></li>
                @endforeach
                {{-- <li><a class="show-action" href="#">Show All</a></li> --}}
            </ul>
        </div>
        <div class="col-md-4 part-item appear-animate" data-animation-name="fadeInLeftShorter"
            data-animation-delay="400">
            <h3>Popular Searches:</h3>
            <?php $TagsThree = DB::table('tags')->orderBy('id','DESC')->limit('5')->get(); ?>
            <ul class="list-unstyled mb-0">
                @foreach ($TagsThree as $tagThree)
                <li><a href="{{url('/')}}/product-tags/{{$tagThree->slung}}">{{$tagThree->title}}</a></li>
                @endforeach
                <li><a class="show-action" href="{{url('/')}}/products">Show All</a></li>
            </ul>
        </div>

    </div>
</section>
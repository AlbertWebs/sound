@extends('front.master-category')
@section('content')
@foreach($Blog as $blog)
 <main class="main">
    <nav class="breadcrumb-nav">
       <div class="container">
          <ul class="breadcrumb">
             <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
             <li><a href="#" class="active">Knowledge Base</a></li>
             <li>{{$blog->title}}</li>
          </ul>
       </div>
    </nav>
    <div class="page-content">
       <div class="container">
          <div class="row gutter-lg">
             <div class="col-lg-10" style="margin:0 auto">
                <article class="post-single">
                   <figure class="post-media">
                      <a href="#">
                      <img src="{{$blog->image_one}}" width="880" height="450" alt="{{$blog->title}}" />
                      </a>
                   </figure>
                   <div class="post-details">
                      <div class="post-meta">
                         by <a href="#" class="post-author">Sound Wave Audio</a>
                         on <a href="#" class="post-date">{{date('M', strtotime($blog->created_at))}} {{date('d', strtotime($blog->created_at))}},
                            {{date('Y', strtotime($blog->created_at))}}</a>

                      </div>
                      <h4 class="post-title"><a href="{{url('/')}}/knowledge-base/{{$blog->slung}}">{{$blog->title}}</a>
                      </h4>
                      <div class="post-body mb-7">
                         <p class="mb-5"> {!!html_entity_decode($blog->content)!!}
                         </p>

                      </div>

                   </div>
                </article>

             </div>

          </div>
       </div>
    </div>
 </main>
 @endforeach

 @endsection

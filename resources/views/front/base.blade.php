@extends('front.master-category')
@section('content')
<main class="main">
    <nav class="breadcrumb-nav">
       <div class="container">
          <ul class="breadcrumb">
             <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
             <li><a href="#" class="active">Knowledge Base</a></li>
             <li>Classic</li>
          </ul>
       </div>
    </nav>
    <div class="page-content with-sidebar">
       <div class="container">
          <div class="row gutter-lg">
             <div class="col-lg-10" style="margin:0 auto">
                <div class="posts"> <?php $Blog = DB::table('blogs')->limit('12')->orderBy('id','DESC')->get(); ?>
                @foreach($Blog as $blog)
                   <article class="post post-classic mb-7">
                      <figure class="post-media overlay-zoom">
                         <a href="{{url('/')}}/knowledge-base/{{$blog->slung}}">
                         <img src="{{$blog->image_one}}" width="870" height="420" alt="post" />
                         </a>
                      </figure>
                      <div class="post-details">
                         <div class="post-meta">
                            by <a href="#" class="post-author">SoundWave Audio</a>
                            on <a href="#" class="post-date">{{date('M', strtotime($blog->created_at))}} {{date('d', strtotime($blog->created_at))}},
                                {{date('Y', strtotime($blog->created_at))}}</a>
                            {{-- | <a href="#" class="post-comment"><span>3</span> Comments</a> --}}
                         </div>
                         <h4 class="post-title"><a href="{{url('/')}}/knowledge-base/{{$blog->slung}}">{{$blog->title}}</a>
                         </h4>
                         <p class="post-content">{{$blog->meta}}
                         </p>
                         <a href="{{url('/')}}/knowledge-base/{{$blog->slung}}" class="btn btn-link btn-underline btn-primary">Read
                         more<i class="d-icon-arrow-right"></i></a>
                      </div>
                   </article>
                @endforeach
                </div>
                <ul class="pagination">
                   <li class="page-item disabled">
                      <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                      <i class="d-icon-arrow-left"></i>Prev
                      </a>
                   </li>
                   <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                   <li class="page-item"><a class="page-link" href="#">2</a></li>
                   <li class="page-item">
                      <a class="page-link page-link-next" href="#" aria-label="Next">
                      Next<i class="d-icon-arrow-right"></i>
                      </a>
                   </li>
                </ul>
             </div>

          </div>
       </div>
    </div>
 </main>
@endsection

@extends('layouts.frontend')

@section('content')
<!-- Hero Area Start -->
<div class="hero-area hero-height2 d-flex align-items-center" data-background="{{ asset('images/hero/h2_hero.jpg') }}">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="hero-cap text-center pt-50">
               <h2>{{ $artikel->nama }}</h2>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Hero Area End -->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 posts-list">
            <div class="single-post">
               <div class="feature-img">
                  <img class="img-fluid" src="{{ $artikel->gambar_url }}" alt="">
               </div>
               <div class="blog_details">
                  <h2>{{ $artikel->nama }}</h2>
                  <ul class="blog-info-link mt-3 mb-4">
                     <li><a href="#"><i class="fa fa-user"></i>
                        @foreach ($artikel->kategori as $item)
                           {{ $item->judul }}
                        @endforeach
                        </a>
                     </li>
                     <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                  </ul>
                  @php
                     $string = preg_replace("/&#?[a-z0-9]+;/i", " ", $artikel->deskripsi);
                  @endphp
                  {!! $string !!}
               </div>
            </div>
            <div class="navigation-top">
               <div class="d-sm-flex justify-content-between text-center">
                  <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> 4
                     people like this</p>
                  <div class="col-sm-4 text-center my-2 my-sm-0">
                     <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> {{ $artikel->komentar->count() ?? 0 }} Comments</p>
                  </div>
               </div>
            </div>
            <div class="comments-area">
               <h4>Comments</h4>

               @foreach ($artikel->komentar as $item)
               <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                     <div class="user justify-content-between d-flex">
                        <div class="desc">
                           <p class="comment">
                              {{ $item->komentar }}
                           </p>
                           <div class="d-flex justify-content-between">
                              <div class="d-flex align-items-center">
                                 <h5>
                                    <a href="#">{{ $item->nama }}</a>
                                 </h5>
                                 <p class="date">{{ date('F d, Y', strtotime($item->created_at)) }} at {{ date('h:i A', strtotime($item->created_at)) }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               
            </div>
            <div class="comment-form">
               <h4>Leave a Reply</h4>
               <form class="form-contact comment_form" method="POST" action="{{ route('blog.komentar') }}" id="commentForm">
                  @csrf
                  @method("POST")
                  <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <textarea class="form-control w-100" name="komentar" id="comment" cols="30" rows="9"
                              placeholder="Write Comment"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input class="form-control" name="nama" id="name" type="text" placeholder="Name">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget search_widget">
                  <form action="" method="GET">
                     @csrf
                     <div class="form-group">
                        <div class="input-group mb-3">
                           <input type="text" class="form-control" placeholder='Search Keyword'
                              onfocus="this.placeholder = ''" name="q" onblur="this.placeholder = 'Search Keyword'">
                           <div class="input-group-append">
                              <button class="btns" type="button"><i class="ti-search"></i></button>
                           </div>
                        </div>
                     </div>
                     <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Search</button>
                  </form>
               </aside>
               <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title">Category</h4>
                  <ul class="list cat-list">
                     @foreach ($kategori as $item)
                     <li>
                        <a href="#" class="d-flex">
                           <p>{{ $item->judul }}&nbsp;</p>
                           <p>({{ $item->artikel->count() }})</p>
                        </a>
                     </li>
                     @endforeach
                  </ul>
               </aside>
               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Recent Post</h3>
                  @foreach ($berita as $value)
                     <div class="media post_item">
                        <img src="{{ $value['urlToImage'] }}" alt="post" width="80">
                        <div class="media-body">
                           <a href="{{ $value['url'] }}" target="_blank">
                              <h3>{{ $value['title'] }}</h3>
                           </a>
                           <p>{{ date('F, d Y', strtotime($value['publishedAt'])) }}</p>
                        </div>
                     </div>
                  @endforeach
               </aside>
               <aside class="single_sidebar_widget newsletter_widget">
                  <h4 class="widget_title">Newsletter</h4>
                  <form action="#">
                     <div class="form-group">
                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                     </div>
                     <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Subscribe</button>
                  </form>
               </aside>
            </div>
         </div>
      </div>
   </div>
</section>
<!--================ Blog Area end =================-->
@endsection
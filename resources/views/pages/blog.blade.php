@extends('layouts.frontend')

@section('content')
<!-- Hero Area Start -->
<div class="hero-area hero-height2 d-flex align-items-center" data-background="images/hero/h2_hero.jpg">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="hero-cap text-center pt-50">
               <h2>Our Blog</h2>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Hero Area End -->
<!--================Blog Area =================-->
<section class="blog_area section-padding">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
               @forelse ($artikel as $value)
                  <article class="blog_item">
                     <div class="blog_item_img">
                        <img class="card-img rounded-0" src="{{ $value->gambar_url }}" alt="">
                        <a href="#" class="blog_item_date">
                           <h3>{{ date('d', strtotime($value->created_at)) }}</h3>
                           <p>{{ date('M', strtotime($value->created_at)) }}</p>
                        </a>
                     </div>

                     <div class="blog_details">
                        <a class="d-inline-block" href="single-blog.html">
                           <h2>{{ $value->nama }}</h2>
                        </a>
                        @php
                           $isi = preg_replace("/&#?[a-z0-9]+;/i", " ", $value->deskripsi);
                        @endphp
                        <p>{{ (strlen(strip_tags($isi)) > 200) ? substr(strip_tags($isi), 0, 200) . '...' : strip_tags($isi) }}</p>
                        <ul class="blog-info-link">
                           <li>
                              <a href="javascript:void(0)"><i class="fa fa-user"></i>
                                 @foreach ($value->kategori as $item)
                                     {{ $item->judul }}
                                 @endforeach
                              </a>
                           </li>
                           {{-- <li><a href="#"><i class="fa fa-comments"></i> {{ $artikel->komentar->count() }} Comments</a></li> --}}
                        </ul>
                     </div>
                  </article>
               @empty
                  <p>Enggak onok artikel</p>
               @endforelse

               {{ $artikel->links() }}

               {{-- <nav class="blog-pagination justify-content-center d-flex">
                  <ul class="pagination">
                     <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                           <i class="ti-angle-left"></i>
                        </a>
                     </li>

                     <li class="page-item">
                        <a href="#" class="page-link">1</a>
                     </li>
                     
                     <li class="page-item">
                        <a href="#" class="page-link" aria-label="Next">
                           <i class="ti-angle-right"></i>
                        </a>
                     </li>
                  </ul>
               </nav> --}}

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
               <aside class="single_sidebar_widget tag_cloud_widget">
                  <h4 class="widget_title">Tag Clouds</h4>
                  <ul class="list">
                     <li>
                        <a href="#">project</a>
                     </li>
                     <li>
                        <a href="#">love</a>
                     </li>
                     <li>
                        <a href="#">technology</a>
                     </li>
                     <li>
                        <a href="#">travel</a>
                     </li>
                     <li>
                        <a href="#">restaurant</a>
                     </li>
                     <li>
                        <a href="#">life style</a>
                     </li>
                     <li>
                        <a href="#">design</a>
                     </li>
                     <li>
                        <a href="#">illustration</a>
                     </li>
                  </ul>
               </aside>

               <aside class="single_sidebar_widget instagram_feeds">
                  <h4 class="widget_title">Instagram Feeds</h4>
                  <ul class="instagram_row flex-wrap">
                     <li>
                        <a href="#">
                           <img class="img-fluid" src="images/post/post_5.png" alt="">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img class="img-fluid" src="images/post/post_6.png" alt="">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img class="img-fluid" src="images/post/post_7.png" alt="">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img class="img-fluid" src="images/post/post_8.png" alt="">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img class="img-fluid" src="images/post/post_9.png" alt="">
                        </a>
                     </li>
                     <li>
                        <a href="#">
                           <img class="img-fluid" src="images/post/post_10.png" alt="">
                        </a>
                     </li>
                  </ul>
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
<!--================Blog Area =================-->
@endsection
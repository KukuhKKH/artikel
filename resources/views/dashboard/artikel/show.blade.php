@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content  animated fadeInRight article">
   <div class="row justify-content-md-center">
      <div class="col-lg-10">
         <div class="ibox">
            <div class="ibox-content">
               <div class="float-right">
                  <button class="btn {{ ($artikel->status == 2) ? 'btn-white' : 'btn-primary' }} btn-xs" type="button">Draft</button>
                  <button class="btn {{ ($artikel->status == 1) ? 'btn-white' : 'btn-primary' }} btn-xs" type="button">Published</button>
                  {{-- <button class="btn btn-white btn-xs" type="button">Sampah</button> --}}
              </div>
              <div class="text-center article-title">
               <span class="text-muted"><i class="fa fa-clock-o"></i> {{ date('d F Y', strtotime( $artikel->created_at)) }}</span>
                   <h1>
                       {{ $artikel->nama }}
                   </h1>
                   <img alt="Re zero" src="{{ $artikel->gambar_url }}" width="300">
               </div>
               <div>
                  @php
                     $string = preg_replace("/&#?[a-z0-9]+;/i", " ", $artikel->deskripsi);
                  @endphp
                  {!! $string !!}
               </div>
               <hr>
               <div class="row">
                  <div class="col-md-6">
                     <h5>Tags :</h5>
                     @foreach ($artikel->kategori as $value)
                        <button class="btn btn-primary btn-xs" type="button">{{ $value->judul }}</button>
                     @endforeach
                  </div>
                  <div class="col-md-6">
                     <div class="small text-right">
                        <h5>Stats:</h5>
                        <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                    </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-12">
                     <h2>Comments:</h2>
                     <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="" class="float-left">
                                <img alt="image" src="img/a1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    Kukuh Rahmadani
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque ipsa tempora praesentium vitae soluta optio quaerat! Est vel iure eveniet?
                            </p>
                        </div>
                    </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>{{ $title ?? 'Admin Dashboard' }}</h2>
      <ol class="breadcrumb">
         <li class="breadcrumb-item {{ (Request::segment(1) == 'dashboard') ? 'active' : '' }}">
            <a href="{{ url('/') }}">Home</a>
         </li>
         @if (Request::segment(2) != 'dashboard')
            <li class="breadcrumb-item active">
               <strong>{{ Request::segment(2) }}</strong>
            </li>
         @endif
      </ol>
   </div>
   {{-- <div class="col-sm-8">
      <div class="title-action">
         <a href="" class="btn btn-primary">This is action area</a>
      </div>
   </div> --}}
</div>
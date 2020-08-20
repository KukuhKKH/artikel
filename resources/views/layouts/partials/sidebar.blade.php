@php
   $segment = Request::segment(1);
   $segment2 = Request::segment(2);
   $segment3 = Request::segment(3);
@endphp
<nav class="navbar-default navbar-static-side" role="navigation">
   <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
         <li class="nav-header">
            <div class="dropdown profile-element">
               <img alt="image" class="rounded-circle img-fluid" width="50" src="{{ asset('images/user.png') }}" />
               <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                  <span class="text-muted text-xs block">{{ Auth::user()->getRoleNames()->first() }} <b class="caret"></b></span>
               </a>
               <ul class="dropdown-menu animated fadeInRight m-t-xs">
                  <li class="dropdown-divider"></li>
                  <li><a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
               </ul>
            </div>
            <div class="logo-element">
               IN+
            </div>
         </li>
         <li class="{{ ($segment2 == '') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
         </li>
         <li class="{{ ($segment2 == 'artikel' || $segment2 == 'kategori') ? 'active' : '' }}">
            <a href="javascript:void(0)"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Arikel</span> <span
                  class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
               <li class="{{ ($segment2 == 'artikel') ? 'active' : '' }}"><a href="{{ route('artikel.index') }}">Artikel</a></li>
               <li class="{{ ($segment2 == 'kategori') ? 'active' : '' }}"><a href="{{ route('kategori.index') }}">Kategori</a></li>
            </ul>
         </li>
         <li class="{{ ($segment2 == 'webinar') ? 'active' : '' }}">
            <a href="{{ route('webinar.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Webinar</span></a>
         </li>
      </ul>

   </div>
</nav>
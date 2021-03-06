@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-12">
         <div class="ibox">
            <div class="ibox-content">
               <form action="{{ route('kategori.store') }}" method="POST">
                  @csrf
                  @method("POST")
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="">Nama</label>
                           <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}">
                           @error('judul')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="">Deskripsi</label>
                           <textarea name="deskripsi" id="" cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                           @error('deskripsi')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror 
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Tambah</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-12">
         <div class="ibox">
            <div class="ibox-content">
               <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("POST")
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="">Judul</label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                           @error('nama')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="">Isi Artikel</label>
                           <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                           @error('deskripsi')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror 
                        </div>
                        <div class="form-group">
                           <label for="">Kategori</label>
                           <select name="kategori[]" id="selectKategori" class="form-control" multiple="multiple">
                              <option value="">-- Pilih --</option>
                              @foreach ($kategori as $value)
                                  <option value="{{ $value->id }}">{{ $value->judul }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="">Gambar</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/x-png,image/gif,image/jpeg">
                           <small>Max 5 mb</small>
                           @error('image')
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

@section('script')
<script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
   const options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
   }

   CKEDITOR.replace('deskripsi', options)

   $(() => {
      $('#selectKategori').select2()
   })
</script>
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endsection
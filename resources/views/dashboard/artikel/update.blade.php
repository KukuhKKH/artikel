@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-12">
         <div class="ibox">
            <div class="ibox-content">
               <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                  @method("PUT")
                  <input type="hidden" name="id" value="{{ $artikel->id }}">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="">Judul</label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $artikel->nama }}">
                           @error('nama')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="">Isi Artikel</label>
                           <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ $artikel->deskripsi }}</textarea>
                           @error('deskripsi')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror 
                        </div>
                        <div class="form-group">
                              @php
                                  $select = $artikel->kategori;
                                  $id = [];
                                  foreach ($select as $value) {
                                     $id[] = $value->id;
                                  }
                              @endphp
                           <label for="">Kategori</label>
                           <select name="kategori[]" id="selectKategori" class="form-control" multiple="multiple">
                              <option value="">-- Pilih --</option>
                              @foreach ($kategori as $value)
                                 <option value="{{ $value->id }}" {{ in_array($value->id, $id) ? 'selected' : '' }}>{{ $value->judul }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-6">
                                 <label for="">Gambar</label>
                                 <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/x-png,image/gif,image/jpeg">
                                 <p>Kosongkan jika tidak update gambar</p>
                                 <small>Max 5 mb</small>
                              </div>
                              <div class="col-md-6 text-center">
                                 <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->gambar }}" width="200">
                              </div>
                           </div>
                           @error('image')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="">Status</label>
                           <select name="status" class="form-control" required>
                              <option value="" disabled>-- Pilih --</option>
                              <option value="1" {{ ($artikel->status == '1') ? 'selected' : '' }}>Draft</option>
                              <option value="2" {{ ($artikel->status == '2') ? 'selected' : '' }}>Published</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Update</button>
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
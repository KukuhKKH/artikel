@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
      <div class="col-12">
         <div class="ibox">
            <div class="ibox-content">
               <form action="{{ route('webinar.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("POST")
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="">Nama</label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                           @error('nama')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="">Url</label>
                           <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}">
                           @error('url')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="">Deskripsi</label>
                           <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                           @error('deskripsi')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror 
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
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group" id="mulai">
                                 <label class="font-normal">Tanggal Mulai</label>
                                 <div class="input-group date">
                                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control  @error('mulai') is-invalid @enderror" value="{{ date('d/m/Y') }}" name="mulai">
                                 </div>
                                 @error('mulai')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group" id="akhir">
                                 <label class="font-normal">Tanggal Berakhir</label>
                                 <div class="input-group date">
                                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control  @error('akhir') is-invalid @enderror" value="{{ date('d/m/Y') }}" name="akhir">
                                 </div>
                                 @error('akhir')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                             </div>
                           </div>
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

@section('css')
   <link href="{{ asset('vendor/datepicker/datepicker3.css') }}" rel="stylesheet">
@endsection

@section('script')
   <script src="{{ asset('vendor/datepicker/bootstrap-datepicker.js') }}"></script>
   <script>
      $('#mulai .input-group.date').datepicker({
         startView: 1,
         todayBtn: "linked",
         keyboardNavigation: false,
         forceParse: false,
         autoclose: true,
         format: "dd/mm/yyyy"
      })

      $('#akhir .input-group.date').datepicker({
         startView: 1,
         todayBtn: "linked",
         keyboardNavigation: false,
         forceParse: false,
         autoclose: true,
         format: "dd/mm/yyyy",
         startDate: '+1d'
      })
   </script>
@endsection
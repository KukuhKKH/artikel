@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content">
   <div class="animated fadeInRightBig">
      <div class="ibox ">
         <div class="ibox-title pb-3">
            <a href="{{ route('artikel.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Artikel</a>
            <a href="{{ route('artikel.index') }}" class="btn btn-success">Kembali</a>
         </div>
         <div class="ibox-content">

            <table class="table table-bordered table-hover table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Gambar</th>
                     <th>Judul</th>
                     <th>Isi <small>potongan</small></th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($artikel as $value)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset("upload/artikel/$value->gambar") }}" alt="{{ $value->gambar }}" class="img-fluid img-thumbnail mx-auto d-block" width="100"></td>
                        <td>{{ $value->nama }}</td>
                        @php
                           $isi = preg_replace("/&#?[a-z0-9]+;/i", " ", $value->deskripsi);
                        @endphp
                        <td>{{ (strlen(strip_tags($isi)) > 50) ? substr(strip_tags($isi), 0, 50) : strip_tags($isi) }}</td>
                        <td>
                           <form action="{{ route('artikel.restore', $value->id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-warning">Pulihkan</button>
                           </form>
                        </td>
                     </tr>
                  @empty
                  <tr>
                     <td colspan="5" class="text-center">Tidak ada data</td>
                  </tr>
                  @endforelse
               </tbody>
            </table>
            {{ $artikel->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
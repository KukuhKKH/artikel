@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content">
   <div class="animated fadeInRightBig">
      <div class="ibox ">
         <div class="ibox-title pb-3">
            <a href="{{ route('artikel.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Artikel</a>
            <a href="{{ route('artikel.sampah') }}" class="btn btn-outline-success">Sampah</a>
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
                           <div class="btn-group d-flex" role="group">
                              <div class="btn-group mx-auto" role="group">
                              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Aksi</button>
                                 <div class="dropdown-menu"> 
                                    <a href="{{ route('artikel.show', $value->id) }}" class="btn-detaildata dropdown-item text-primary"><i class="fa fa-eye"></i> Show</a>
                                    <a href="{{ route('artikel.edit', $value->id) }}" class="btn-detaildata dropdown-item text-success"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="logout-form" action="{{ route('artikel.destroy', $value->id) }}" method="POST">
                                       @csrf
                                       @method("DELETE")
                                       <button class="btn-detaildata dropdown-item text-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
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
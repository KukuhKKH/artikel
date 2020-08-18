@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content">
   <div class="animated fadeInRightBig">
      <div class="ibox ">
         <div class="ibox-title pb-3">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kategori</a>
            <a href="{{ route('kategori.sampah') }}" class="btn btn-outline-success">Sampah</a>
         </div>
         <div class="ibox-content">

            <table class="table table-bordered table-hover table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama Kategori</th>
                     <th>Deskripsi</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($kategori as $value)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->judul }}</td>
                        <td>{{ (strlen($value->deskripsi > 50) ? substr($value->deskripsi, 0, 50) : $value->deskripsi) }}</td>
                        <td>
                           <div class="btn-group d-flex" role="group">
                              <div class="btn-group mx-auto" role="group">
                              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Aksi</button>
                                 <div class="dropdown-menu"> 
                                    <a href="{{ route('kategori.edit', $value->id) }}" class="btn-detaildata dropdown-item text-success"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="logout-form" action="{{ route('kategori.destroy', $value->id) }}" method="POST">
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
                         <td colspan="4" class="text-center">Tidak ada data</td>
                      </tr>
                  @endforelse
               </tbody>
            </table>
            {{ $kategori->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content">
   <div class="animated fadeInRightBig">
      <div class="ibox ">
         <div class="ibox-title pb-3">
            <a href="{{ route('webinar.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Webinar</a>
            <a href="{{ route('webinar.sampah') }}" class="btn btn-outline-success">Sampah</a>
         </div>
         <div class="ibox-content">

            <table class="table table-bordered table-hover table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama</th>
                     <th>Poster</th>
                     <th>Deskripsi <small>potongan</small></th>
                     <th>Tanggal Mulai</th>
                     <th>Tanggal Selesai</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($webinar as $value)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama }}</td>
                        <td><img src="{{ asset("upload/webinar/$value->poster") }}" alt="{{ $value->poster }}" class="img-fluid img-thumbnail mx-auto d-block" width="100"></td>
                        <td>{{ (strlen($value->deskripsi) > 50) ? substr($value->deskripsi, 0, 50) : $value->deskripsi }}</td>
                        <td>{{ date('d, F Y', strtotime($value->mulai)) }}</td>
                        <td>{{ date('d, F Y', strtotime($value->akhir)) }}</td>
                        <td>
                           <div class="btn-group d-flex" role="group">
                              <div class="btn-group mx-auto" role="group">
                              <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Aksi</button>
                                 <div class="dropdown-menu"> 
                                    <a href="{{ route('webinar.show', $value->id) }}" class="btn-detaildata dropdown-item text-primary"><i class="fa fa-eye"></i> Show</a>
                                    <a href="{{ route('webinar.edit', $value->id) }}" class="btn-detaildata dropdown-item text-success"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="logout-form" action="{{ route('webinar.destroy', $value->id) }}" method="POST">
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
                     <td colspan="7" class="text-center">Tidak ada data</td>
                  </tr>
                  @endforelse
               </tbody>
            </table>
            {{ $webinar->links() }}
         </div>
      </div>
   </div>
</div>
@endsection
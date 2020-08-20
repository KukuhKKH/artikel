@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content">
   <div class="animated fadeInRightBig">
      <div class="ibox ">
         <div class="ibox-title pb-3">
            <a href="{{ route('webinar.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Webinar</a>
            <a href="{{ route('webinar.index') }}" class="btn btn-success">Kembali</a>
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
                           <form action="{{ route('webinar.restore', $value->id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-warning">Pulihkan</button>
                           </form>
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
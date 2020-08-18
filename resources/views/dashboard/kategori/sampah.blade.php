@extends('layouts.admin')

@section('content')
<div class="wrapper wrapper-content">
   <div class="animated fadeInRightBig">
      <div class="ibox ">
         <div class="ibox-content">
            <table class="table table-bordered table-hover">
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
                           <form action="{{ route('kategori.restore', $value->id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-warning">Pulihkan</button>
                           </form>
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
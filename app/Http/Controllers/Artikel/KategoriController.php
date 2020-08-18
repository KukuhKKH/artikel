<?php

namespace App\Http\Controllers\Artikel;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Kategori\KategoriCreateRequest;
use App\Http\Requests\Kategori\KategoriUpdateRequest;

class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:create kategori', ['only' => ['store']]);
        $this->middleware('permission:read kategori',   ['only' => ['index']]);
        $this->middleware('permission:update kategori', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete kategori', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $kategori = Kategori::where('user_id', $user->id)->latest()->paginate(5);
        return view('dashboard.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriCreateRequest $request)
    {
        try {
            $user = Auth::user();
            $user->kategori()->create($request->all());
            return redirect()->route('kategori.index')->with(['sukses' => 'Tambah Kategori Berhasil']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('dashboard.kategori.update', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriUpdateRequest $request, $id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->update($request->all());
            return redirect()->route('kategori.index')->with(['sukses' => 'Update Kategori Berhasil']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategori.index')->with(['sukses' => 'Hapus Kategori Berhasil']);
    }

    /**
     * Show all deleted data.
     *
     * @return \Illuminate\Http\Response
     */

    public function sampah() {
        $kategori = Kategori::onlyTrashed()->latest()->paginate(5);
        return view('dashboard.kategori.sampah', compact('kategori'));
    }

    /**
     * Restore data from delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id) {
        try {
            $kategori = Kategori::onlyTrashed()->find($id);
            $kategori->restore();
            return redirect()->route('kategori.index')->with(['sukses' => 'Memulihkan Kategori Berhasil']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }
}

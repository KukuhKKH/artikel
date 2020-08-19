<?php

namespace App\Http\Controllers\Artikel;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Traits\ImageHandlerTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KomentarCreateRequest;
use App\Http\Requests\Artikel\ArtikelCreateRequest;
use App\Http\Requests\Artikel\ArtikelUpdateRequest;

class ArtikelController extends Controller
{
    private $pathImage = "upload\artikel/";
    use ImageHandlerTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth')->except(['komentar']);
        $this->middleware('permission:create artikel', ['only' => ['store']]);
        $this->middleware('permission:read artikel',   ['only' => ['index', 'show']]);
        $this->middleware('permission:update artikel', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete artikel', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $artikel = Artikel::where('user_id', $user->id)->paginate(10);
        return view('dashboard.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelCreateRequest $request)
    {
        try {
            if ($request->file('image')) {
                $this->uploadImage($request, $this->pathImage);
            }
            $user = Auth::user();
            $artikel = Artikel::create([
                'gambar' => $request->gambar,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'slug' => \Str::slug($request->nama),
                'user_id' => $user->id,
                'status' => $request->status
            ]);
            $artikel->kategori()->attach($request->kategori);
            return redirect()->route('artikel.index')->with(['sukses' => 'Tambah Artikel Berhasil']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $artikel = Artikel::find($id);
            return view('dashboard.artikel.show', compact('artikel'));
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        return view('dashboard.artikel.update', compact('artikel', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtikelUpdateRequest $request, $id)
    {
        try {
            if ($request->file('image')) {
                $this->uploadImage($request, $this->pathImage);
            }
            $user = Auth::user();
            $artikel = Artikel::find($id);
            $artikel->update([
                'gambar' => ($request->gambar != null) ? $request->gambar : $artikel->gambar,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'slug' => \Str::slug($request->nama),
                'status' => $request->status
            ]);
            $artikel->kategori()->attach($request->kategori);
            return redirect()->route('artikel.index')->with(['sukses' => 'Update Artikel Berhasil']);
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
        Artikel::find($id)->delete();
        return redirect()->route('artikel.index')->with(['sukses' => 'Hapus Artikel Berhasil']);
    }

    public function sampah() {
        $artikel = Artikel::onlyTrashed()->latest()->paginate(5);
        return view('dashboard.artikel.sampah', compact('artikel'));
    }

    /**
     * Restore data from delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id) {
        try {
            $artikel = Artikel::onlyTrashed()->find($id);
            $artikel->restore();
            return redirect()->route('artikel.index')->with(['sukses' => 'Memulihkan Artikel Berhasil']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Comment Article.
     *
     * @return \Illuminate\Http\Response
     */

    public function komentar(KomentarCreateRequest $request) {
        try {
            Komentar::create($request->all());
            return redirect()->back();
        } catch(\Exception $e) {
            echo $e->getMessage();
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }
}

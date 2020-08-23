<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Traits\ImageHandlerTrait;
use App\Http\Requests\Webinar\WebinarCreateRequest;
use App\Http\Requests\Webinar\WebinarUpdateRequest;

class WebinarController extends Controller
{
    private $pathImage = "upload\webinar/";
    use ImageHandlerTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinar = Webinar::paginate(10);
        return view('dashboard.webinar.index', compact('webinar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.webinar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebinarCreateRequest $request)
    {
        try {
            $tglMulai = str_replace('/', '-', $request->mulai);
            $tglAkhir = str_replace('/', '-', $request->akhir);

            if(strtotime($tglMulai) > strtotime($tglAkhir)) {
                return redirect()->back()->with(['gagal' => 'Tanggal akhir tidak boleh mendahului Tanggal Mulai'])->withInput();
            }

            if ($request->file('image')) {
                $this->uploadImage($request, $this->pathImage);
            }
            $webinar = Webinar::create([
                'poster' => $request->gambar,
                'nama' => $request->nama,
                'url' => $request->url,
                'deskripsi' => $request->deskripsi,
                'mulai' => date('Y-m-d', strtotime($tglMulai)),
                'akhir' => date('Y-m-d', strtotime($tglAkhir))
            ]);
            return redirect()->route('webinar.index')->with(['sukses' => 'Tambah Webinar Berhasil']);
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
            $webinar = Webinar::find($id);
            return view('dashboard.webinar.show', compact('webinar'));
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
        $webinar = Webinar::find($id);
        return view('dashboard.webinar.update', compact('webinar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebinarUpdateRequest $request, $id)
    {
        try {
            $tglMulai = str_replace('/', '-', $request->mulai);
            $tglAkhir = str_replace('/', '-', $request->akhir);

            if(strtotime($tglMulai) > strtotime($tglAkhir)) {
                return redirect()->back()->with(['gagal' => 'Tanggal akhir tidak boleh mendahului Tanggal Mulai'])->withInput();
            }

            if ($request->file('image')) {
                $this->uploadImage($request, $this->pathImage);
            }
            $webinar = Webinar::find($id);
            $webinar->update([
                'poster' => ($request->gambar != null) ? $request->gambar : $webinar->poster,
                'nama' => $request->nama,
                'url' => $request->url,
                'deskripsi' => $request->deskripsi,
                'mulai' => date('Y-m-d', strtotime($tglMulai)),
                'akhir' => date('Y-m-d', strtotime($tglAkhir))
            ]);
            return redirect()->route('webinar.index')->with(['sukses' => 'Update Webinar Berhasil']);
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
        Webinar::find($id)->delete();
        return redirect()->route('webinar.index')->with(['sukses' => 'Hapus Webinar Berhasil']);
    }

    public function sampah() {
        $webinar = Webinar::onlyTrashed()->latest()->paginate(5);
        return view('dashboard.webinar.sampah', compact('webinar'));
    }

    /**
     * Restore data from delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id) {
        try {
            $webinar = Webinar::onlyTrashed()->find($id);
            $webinar->restore();
            return redirect()->route('webinar.index')->with(['sukses' => 'Memulihkan Webinar Berhasil']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['gagal' => $e->getMessage()])->withInput();
        }
    }
}

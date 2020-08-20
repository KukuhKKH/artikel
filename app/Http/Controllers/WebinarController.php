<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Traits\ImageHandlerTrait;
use App\Http\Requests\Webinar\WebinarCreateRequest;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

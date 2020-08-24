<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Webinar;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function home() {
        $launch = '2010/08/25';
        if(date('Y/m/d') > $launch) {
            $artikel = Artikel::limit(5)->get();
            $webinar = Webinar::limit(5)->get();

            return view('welcome', compact('artikel', 'webinar'));
        }
        return view('soon', ['launch' => $launch]);
    }

    public function dashboard() {
        return view('dashboard.home');
    }

    public function blog(Request $request) {
        $berita = $this->_getNewsIndo();

        $artikel = Artikel::when($request->q, function($artikel) use ($request) {
            $artikel->where('nama', 'LIKE', '%'.$request->q.'%');
        })->with(['komentar'])->where('status', 2)->orderBy("created_at", "DESC")->paginate(10);
        $kategori = Kategori::all();
        return view('pages.blog', compact('artikel', 'kategori', 'berita'));
    }

    public function slug($slug) {
        $berita = $this->_getNewsIndo();

        $artikel = Artikel::where('slug', $slug)->first();
        $kategori = Kategori::all();
        return view('pages.slug', compact('artikel', 'kategori', 'berita'));
    }

    private function _getNewsIndo() {
        $apikey = env('API_NEWS', 'Durung onok cuyyyyyy');
        $endpoint = 'http://newsapi.org/v2/top-headlines';
        $response = Http::get('http://newsapi.org/v2/top-headlines', [
            'country' => 'id',
            'apiKey' => $apikey
        ]);
        $result = json_decode($response, true);
        return array_slice($result['articles'], 0, 5);
    }
}

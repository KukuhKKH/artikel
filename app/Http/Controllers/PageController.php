<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function home() {
        return view('dashboard.home');
    }

    public function blog(Request $request) {
        $data = $this->_getNewsIndo();
        $result = json_decode($data, true);
        $berita = array_slice($result['articles'], 0, 5);

        $artikel = Artikel::when($request->q, function($artikel) use ($request) {
            $artikel->where('nama', 'LIKE', '%'.$request->q.'%');
        })->with(['komentar'])->orderBy("created_at", "DESC")->paginate(10);
        $kategori = Kategori::all();
        return view('pages.blog', compact('artikel', 'kategori', 'berita'));
    }

    private function _getNewsIndo() {
        $apikey = env('API_NEWS', 'Durung onok cuyyyyyy');
        $endpoint = 'http://newsapi.org/v2/top-headlines';
        return $response = Http::get('http://newsapi.org/v2/top-headlines', [
            'country' => 'id',
            'apiKey' => $apikey
        ]);
    }
}

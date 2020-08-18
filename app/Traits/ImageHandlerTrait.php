<?php

namespace App\Traits;
use Illuminate\Http\Request;

trait ImageHandlerTrait {
	public function uploadImage(Request $request, $path) {
        if ($request->image) {
            $file = $request->file('image');
            $imageName = time().'.' . $file->getClientOriginalExtension();
            \Image::make($request->image)->save($path.$imageName);
            $request->merge(['gambar' => $imageName]);
        }
    }

	public function unlinkImage($path, $imageName) {
        $image = $path.$imageName;
        if (file_exists($image)) {
            @unlink($image);
        }
    }
}
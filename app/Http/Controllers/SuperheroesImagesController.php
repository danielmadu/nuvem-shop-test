<?php

namespace App\Http\Controllers;


use App\Domains\Superheros\SuperheroesImage;
use Illuminate\Support\Facades\Storage;

class SuperheroesImagesController extends Controller
{
    /**
     * @param int $imageId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $imageId)
    {
        $image = SuperheroesImage::find($imageId);
        if ($image) {
            Storage::delete($image->path);
            $image->delete();
        }
        return redirect(route('edit', ['id' => $image->superhero_id]))->with('success', 'Image deleted with success.');
    }
}
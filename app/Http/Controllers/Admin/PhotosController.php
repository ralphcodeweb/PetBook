<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PhotosController extends Controller
{
    public function store(Post $post)
    {

        $photo = request()->file('photo')->store('public');

        Photo::create([
            'url' => Storage::url($photo),
            'post_id' => $post->id
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPath = str_replace('storage', 'public', $photo->url);

        Storage::delete($photoPath);
        return back()->with('flash', 'Foto Eliminada');
    }
}

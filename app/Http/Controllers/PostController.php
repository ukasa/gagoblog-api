<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::paginate(1);
    }

    public function create(Request $request)
    {
        $data = $request->only(['title', 'content']);
        // strip out all whitespace
        $filename = str_replace(" ", "-", substr($data['title'], 0, 30));
        // convert the string to all lowercase
        $filename = strtolower($filename);

        $uniqPrefix = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 7);
        $data['filename'] = $uniqPrefix."-".$filename.".md";
        $data['directory'] = date('Y-m');

        if (!Storage::disk('local')->exists($data['directory'])) {
            Storage::makeDirectory($data['directory']);
        }

        $result = Post::create($data);

        Storage::disk('local')->put(
            $data['directory']."/".$data['filename'],
            $data['content']
        );

        return [
            'id' => $result['id'],
        ];
    }
}

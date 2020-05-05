<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function get_all(Request $request)
    {
        $keyword = $request->keyword;
        $perPage = $request->perPage ?: 10;

        $sort = $request->sort;

        $result = Tag::where('name', 'LIKE', "%$keyword%");

        if (!empty($sort)) {
            $sort = explode(',', $sort);
            $result = $result->orderBy($sort[0], $sort[1]);
        }

        return $result->paginate($perPage);
    }

    public function get_one($id)
    {
        return Tag::findOrFail($id);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = $request->only(['name']);
        return Tag::create($data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name']);
        $old_data = $this->get_one($id);

        if ($old_data->update($data)) {
            return ['message' => 'OK'];
        }
    }

    public function delete($id)
    {
        $data = $this->get_one($id);
        
        if ($data->delete()) {
            return ['message' => 'OK'];
        }
    }
}

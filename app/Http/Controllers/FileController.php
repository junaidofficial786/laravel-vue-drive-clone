<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function myFiles(): \Inertia\Response
    {
        return Inertia::render('myFiles');
    }

    public function createFolder(StoreFolderRequest $request)
    {
        $data = $request->validated();

        $parent = $data['parent'];

        if (!$parent) {
            $parent = $this->getRoot();
        }

        $file = new File();
        $file->name = $data['name'];
        $file->is_folder = 1;
        $file->save();

        $parent->appendNode($file);
    }

    private function getRoot()
    {
        return File::query()->whereIsRoot()->where('created_at', auth()->id())->firstOrFail();
    }
}

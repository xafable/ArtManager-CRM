<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\WorkObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request){
        $path = Storage::putFile('uploads/'.$request->work_object_id, $request->file('uploadedFile'));

        $file = File::query()->create([
            'type'=>'image',
            'work_object_id'=>$request->work_object_id,
            'url'=>$path,
            'title'=>$request->file('uploadedFile')->getClientOriginalName(),
            'extension'=>$request->file('uploadedFile')->getClientOriginalExtension(),
        ]);

        $object = WorkObject::query()->find($request->work_object_id);
        $object->SaveHistory($file);

        return redirect()->back();
    }

    public function showByObject($id){
        $workObject = WorkObject::query()->find($id);
        $media = $workObject->media->map(function ($item){
           $item->url = Storage::url($item->url);
           return $item;
        });

        return view('workObjectFiles', [
            'media' => $media,
            'workObject' => $workObject]);

    }
}

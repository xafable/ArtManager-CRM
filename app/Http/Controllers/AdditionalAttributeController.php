<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdditionalAttribute;
use App\Models\WorkObject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdditionalAttributeController extends Controller
{
    function edit($workObjectId)
    {
        $workObject = WorkObject::query()->find($workObjectId);
        $additionalAttributes = $workObject->additionalAttributes;

        return view('workObjectAdditionalAttributes', [
            'additionalAttributes' => $additionalAttributes,
            'workObject' => $workObject]);

    }

    function update(Request $request)
    {

        if($request->has("deleteAttributes")){
            AdditionalAttribute::destroy($request->deleteAttributes);
        }

        $workObjectId = $request->workObjectId;
        if ($request->has("newAttribute")) {
            foreach ($request->newAttribute as $attribute) {
                AdditionalAttribute::query()->create([
                    'work_object_id' => $workObjectId,
                    'title_ru' => $attribute['title'],
                    'title_eng' => Str::slug($attribute['title']),
                    'value' => $attribute['value']
                ]);
            }

        }

        if ($request->has("oldAttribute")) {
            foreach ($request->oldAttribute as $attribute) {
                AdditionalAttribute::query()->where('id', $attribute['id'])->update([
                    'value' => $attribute['value'],
                ]);
            }
        }

        return redirect()->back();


    }
}


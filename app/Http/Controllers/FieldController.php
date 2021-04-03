<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveFieldsRequest;
use App\Models\Field;

class FieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFields()
    {
        $fields = Field::all();

        return view('pages.fields', ['fields' => $fields]);
    }

    public function saveField(SaveFieldsRequest $request)
    {
        $newField = new Field;
        $newField->name = $request->name;
        $newField->type = $request->type;
        $newField->position = $request->position;
        $newField->save();

        return redirect()->route('fields');
    }
}

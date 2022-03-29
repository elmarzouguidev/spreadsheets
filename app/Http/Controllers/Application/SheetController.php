<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\SheetFormRequest;
use App\Models\Application\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{


    public function index()
    {
        return view('Home.index');
    }

    public function create()
    {
        $sheet = Sheet::create([
            'name' => 'Untitled spreadsheet',
            'user_id' => auth()->id(),
            'content' => [[]]
        ]);

        return redirect(route('sheet:view', ['sheet' => $sheet]));
    }

    public function view(Sheet $sheet)
    {
        return view('Home.spreadsheet', ['sheet' => $sheet]);
    }

    public function update(SheetFormRequest $request, Sheet $sheet)
    {
      // dd($request->all());
        $sheet->update(['content' => $request->content]);
        return response()->json(['sheet' => $sheet]);
    }
}

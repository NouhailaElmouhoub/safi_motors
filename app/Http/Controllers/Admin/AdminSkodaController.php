<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skoda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSkodaController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - skoda -SAFI MOTORS";
        $viewData["skodas"] = Skoda::all();
        return view('admin.skoda.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Skoda::validate($request);

        $newskoda = new Skoda();
        $newskoda->setName($request->input('name'));
        $newskoda->setDescription($request->input('description'));
        $newskoda->setPdf(null);
        $newskoda->setImage("game.png");
        $newskoda->save();

        if ($request->hasFile('image')) {
            $imageName = $newskoda->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newskoda->setImage($imageName);
            $newskoda->save();
        }
        if ($request->hasFile('pdf')) {
            $pdfName = $newskoda->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $newskoda->setPdf($pdfName);
            $newskoda->save();
        }

        return back();
    }

    public function delete($id)
    {
        Skoda::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit skoda - SAFI MOTORS";
        $viewData["skodas"] = Skoda::findOrFail($id);
        return view('admin.skoda.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Skoda::validate($request);

        $skoda = Skoda::findOrFail($id);
        $skoda->setName($request->input('name'));
        $skoda->setDescription($request->input('description'));
       

        if ($request->hasFile('image')) {
            $imageName = $skoda->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $skoda->setImage($imageName);
        }
                // Handle PDF upload
                if ($request->hasFile('pdf')) {
                    $pdfName = $skoda->getId() . "." . $request->file('pdf')->extension();
                    Storage::disk('public')->put(
                        $pdfName,
                        file_get_contents($request->file('pdf')->getRealPath())
                    );
                    $skoda->setPdf($pdfName);
                }

        $skoda->save();
        return redirect()->route('admin.skoda.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cupra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class AdminCupraController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Cupra - SAFI MOTORS";
        $viewData["cupras"] = Cupra::all();
        return view('admin.cupra.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Cupra::validate($request);

        $newCupra = new Cupra();
        $newCupra->setName($request->input('name'));
        $newCupra->setDescription($request->input('description'));
        $newCupra->setImage("game.png"); // Default image
        $newCupra->setPdf(null); // Default PDF
        $newCupra->save();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = $newCupra->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newCupra->setImage($imageName);
            $newCupra->save();
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfName = $newCupra->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $newCupra->setPdf($pdfName);
            $newCupra->save();
        }

        return back();
    }

    public function delete($id)
    {
        Cupra::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Cupra - SAFI MOTORS";
        $viewData["cupra"] = Cupra::findOrFail($id);
        return view('admin.cupra.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Cupra::validate($request);

        $cupra = Cupra::findOrFail($id);
        $cupra->setName($request->input('name'));
        $cupra->setDescription($request->input('description'));

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = $cupra->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $cupra->setImage($imageName);
        }

        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfName = $cupra->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $cupra->setPdf($pdfName);
        }

        $cupra->save();
        return redirect()->route('admin.cupra.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Volkswagen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVolkswagenController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Volkswagen -SAFI MOTORS";
        $viewData["volkswagen"] = Volkswagen::all();
        return view('admin.volkswagen.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Volkswagen::validate($request);

        $newvolkswagen = new Volkswagen();
        $newvolkswagen->setName($request->input('name'));
        $newvolkswagen->setDescription($request->input('description'));
        $newvolkswagen->setPdf(null);
        $newvolkswagen->setImage("game.png");
        $newvolkswagen->save();

        if ($request->hasFile('image')) {
            $imageName = $newvolkswagen->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newvolkswagen->setImage($imageName);
            $newvolkswagen->save();
        }
        if ($request->hasFile('pdf')) {
            $pdfName = $newvolkswagen->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $newvolkswagen->setPdf($pdfName);
            $newvolkswagen->save();
        }

        return back();
    }

    public function delete($id)
    {
        Volkswagen::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Volkswagen - SAFI MOTORS";
        $viewData["volkswagen"] = Volkswagen::findOrFail($id);
        return view('admin.volkswagen.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Volkswagen::validate($request);

        $volkswagen = Volkswagen::findOrFail($id);
        $volkswagen->setName($request->input('name'));
        $volkswagen->setDescription($request->input('description'));
       

        if ($request->hasFile('image')) {
            $imageName = $volkswagen->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $volkswagen->setImage($imageName);
        }
        
        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfName = $volkswagen->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $volkswagen->setPdf($pdfName);
        }
        $volkswagen->save();
        return redirect()->route('admin.volkswagen.index');
    }
}

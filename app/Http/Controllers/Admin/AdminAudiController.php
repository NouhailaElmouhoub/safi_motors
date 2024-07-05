<?php

namespace App\Http\Controllers\Admin;

use App\Models\Audi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAudiController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - audi -SAFI MOTORS";
        $viewData["audis"] = Audi::all();
        return view('admin.audi.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Audi::validate($request);

        $newaudi = new Audi();
        $newaudi->setName($request->input('name'));
        $newaudi->setDescription($request->input('description'));
        
        $newaudi->setImage("game.png");
        $newaudi->setPdf(null);
        $newaudi->save();

        if ($request->hasFile('image')) {
            $imageName = $newaudi->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newaudi->setImage($imageName);
            $newaudi->save();
        }
        if ($request->hasFile('pdf')) {
            $pdfName = $newaudi->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $newaudi->setPdf($pdfName);
            $newaudi->save();
        }

        return back();
    }

    public function delete($id)
    {
        Audi::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit audi - SAFI MOTORS";
        $viewData["audis"] = Audi::findOrFail($id);
        return view('admin.audi.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Audi::validate($request);

        $audi = Audi::findOrFail($id);
        $audi->setName($request->input('name'));
        $audi->setDescription($request->input('description'));
       

        if ($request->hasFile('image')) {
            $imageName = $audi->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $audi->setImage($imageName);
        }
                // Handle PDF upload
                if ($request->hasFile('pdf')) {
                    $pdfName = $audi->getId() . "." . $request->file('pdf')->extension();
                    Storage::disk('public')->put(
                        $pdfName,
                        file_get_contents($request->file('pdf')->getRealPath())
                    );
                    $audi->setPdf($pdfName);
                }

        $audi->save();
        return redirect()->route('admin.audi.index');
    }
}

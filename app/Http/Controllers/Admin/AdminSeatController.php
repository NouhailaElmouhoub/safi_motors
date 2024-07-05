<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSeatController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - seat -SAFI MOTORS";
        $viewData["seat"] = Seat::all();
        return view('admin.seat.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Seat::validate($request);

        $newseat = new Seat();
        $newseat->setName($request->input('name'));
        $newseat->setDescription($request->input('description'));
        $newseat->setPdf(null);
        $newseat->setImage("game.png");
        $newseat->save();

        if ($request->hasFile('image')) {
            $imageName = $newseat->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newseat->setImage($imageName);
            $newseat->save();
        }
        if ($request->hasFile('pdf')) {
            $pdfName = $newseat->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $newseat->setPdf($pdfName);
            $newseat->save();
        }

        return back();
    }

    public function delete($id)
    {
        Seat::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit seat - SAFI MOTORS";
        $viewData["seat"] = Seat::findOrFail($id);
        return view('admin.seat.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Seat::validate($request);

        $seat = Seat::findOrFail($id);
        $seat->setName($request->input('name'));
        $seat->setDescription($request->input('description'));
       

        if ($request->hasFile('image')) {
            $imageName = $seat->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $seat->setImage($imageName);
        }
        // Handle PDF upload
        if ($request->hasFile('pdf')) {
            $pdfName = $seat->getId() . "." . $request->file('pdf')->extension();
            Storage::disk('public')->put(
                $pdfName,
                file_get_contents($request->file('pdf')->getRealPath())
            );
            $seat->setPdf($pdfName);
        }
        $seat->save();
        return redirect()->route('admin.seat.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Audi;
use Illuminate\Http\Request;

class AudiController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "audi - SAFI MOTORS";
        $viewData["subtitle"] =  "List of audi";
        $viewData["audi"] = Audi::all();
        return view('audi.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $audi = Audi::findOrFail($id);
        $viewData["title"] = $audi->getName()." - SAFI MOTORS";
        $viewData["subtitle"] =  $audi->getName()." - audi information";
        $viewData["audi"] = $audi;
        return view('audi.show')->with("viewData", $viewData);
    }
}
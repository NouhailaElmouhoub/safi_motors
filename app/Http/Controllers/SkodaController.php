<?php

namespace App\Http\Controllers;

use App\Models\Skoda;
use Illuminate\Http\Request;

class SkodaController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "skoda - SAFI MOTORS";
        $viewData["subtitle"] =  "List of skoda";
        $viewData["skodas"] = Skoda::all();
        return view('skoda.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $skoda = Skoda::findOrFail($id);
        $viewData["title"] = $skoda->getName()." - SAFI MOTORS";
        $viewData["subtitle"] =  $skoda->getName()." - skoda information";
        $viewData["skoda"] = $skoda;
        return view('skoda.show')->with("viewData", $viewData);
    }
}

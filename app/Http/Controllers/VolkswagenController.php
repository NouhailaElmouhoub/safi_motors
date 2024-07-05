<?php

namespace App\Http\Controllers;

use App\Models\Volkswagen;
use Illuminate\Http\Request;

class VolkswagenController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "volkswagen - Online Store";
        $viewData["subtitle"] =  "List of volkswagen";
        $viewData["volkswagen"] = Volkswagen::all();
        return view('volkswagen.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $volkswagen = volkswagen::findOrFail($id);
        $viewData["title"] = $volkswagen->getName()." - Online Store";
        $viewData["subtitle"] =  $volkswagen->getName()." - volkswagen information";
        $viewData["volkswagen"] = $volkswagen;
        return view('volkswagen.show')->with("viewData", $viewData);
    }
}


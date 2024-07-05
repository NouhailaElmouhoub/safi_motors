<?php

namespace App\Http\Controllers;

use App\Models\Cupra;
use Illuminate\Http\Request;

class CupraController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "cupra - SAFI MOTORS";
        $viewData["subtitle"] =  "List of cupra";
        $viewData["cupra"] =Cupra::all();
        return view('cupra.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $cupra = Cupra::findOrFail($id);
        $viewData["title"] = $cupra->getName()." - SAFI MOTORS";
        $viewData["subtitle"] =  $cupra->getName()." - cupra information";
        $viewData["cupra"] = $cupra;
        return view('cupra.show')->with("viewData", $viewData);
    }
}
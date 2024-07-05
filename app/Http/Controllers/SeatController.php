<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "seat - SAFI MOTORS";
        $viewData["subtitle"] =  "List of seat";
        $viewData["seat"] = Seat::all();
        return view('seat.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $seat = Seat::findOrFail($id);
        $viewData["title"] = $seat->getName()." - SAFI MOTORS";
        $viewData["subtitle"] =  $seat->getName()." - seat information";
        $viewData["seat"] = $seat;
        return view('seat.show')->with("viewData", $viewData);
    }
}


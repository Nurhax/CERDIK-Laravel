<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('main.landingPage', compact('carousels'));
    }

    public function create()
    {
        return view('carousels.create');
    }

    public function store(Request $request)
    {
        $request->validate(['description' => 'required']);
        Carousel::create($request->all());
        return redirect()->route('landing_page')->with('success', 'Carousel added successfully.');
    }

    public function edit(Carousel $carousel)
    {
        return view('carousels.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate(['description' => 'required']);
        $carousel->update($request->all());
        return redirect()->route('landing_page')->with('success', 'Carousel updated successfully.');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()->route('landing_page')->with('success', 'Carousel deleted successfully.');
    }
}


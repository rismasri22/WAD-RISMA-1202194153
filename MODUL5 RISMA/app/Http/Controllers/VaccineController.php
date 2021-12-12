<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VaccineController extends Controller
{
    public function index()
    {
        $data['vaccines'] =  Vaccine::all();
        return view('vaccine.index', $data);
    }

    public function create()
    {
        return view('vaccine.create');
    }

    public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('public/vaccines');

        Vaccine::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('vaccine.index')->with('success', 'New vaccine added successfully');
    }

    public function show(Vaccine $vaccine)
    {
        //
    }

    public function edit(Vaccine $vaccine)
    {
        $data['vaccine'] = $vaccine;
        return view('vaccine.edit', $data);
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/vaccines');
            Storage::delete($vaccine->image);

            $requestData['image'] = $imagePath;
            $vaccine->update($requestData);
        } else {
            $vaccine->update($requestData);
        }

        return redirect()->route('vaccine.index')->with('success', 'Vaccine updated successfully');
    }

    public function destroy(Vaccine $vaccine)
    {
        Storage::delete($vaccine->image);
        $vaccine->delete();

        return redirect()->route('vaccine.index')->with('success', 'Vaccine deleted');
    }
}

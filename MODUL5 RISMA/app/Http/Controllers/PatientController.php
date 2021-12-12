<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function index()
    {
        $data['patients'] = Patient::all();
        return view('patient.index', $data);
    }

    public function show_list_vaccine()
    {
        $data['vaccines'] = Vaccine::all();
        return view('patient.register-vaccine', $data);
    }

    public function create(Request $request)
    {
        $data['vaccine'] = Vaccine::findOrFail($request->vaccine_id);

        return view('patient.create', $data);
    }

    public function store(Request $request)
    {
        $imagePath = $request->file('image_ktp')->store('public/patients');

        Patient::create([
            'vaccine_id' => $request->vaccine_id,
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'image_ktp' => $imagePath,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('patient.index')->with('success', 'New patient registered successfully');
    }

    public function show(Patient $patient)
    {
        //
    }

    public function edit(Patient $patient)
    {
        $data['patient'] = $patient;
        return view('patient.edit', $data);
    }

    public function update(Request $request, Patient $patient)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_ktp')) {
            $imagePath = $request->file('image_ktp')->store('public/patients');
            Storage::delete($patient->image_ktp);

            $requestData['image_ktp'] = $imagePath;
            $patient->update($requestData);
        } else {
            $patient->update($requestData);
        }

        return redirect()->route('patient.index')->with('success', 'Patient updated successfully');
    }

    public function destroy(Patient $patient)
    {
        Storage::delete($patient->image_ktp);
        $patient->delete();

        return redirect()->route('patient.index')->with('success', 'Patient deleted');
    }
}

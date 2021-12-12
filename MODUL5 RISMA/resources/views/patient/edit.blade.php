@extends('templates.master')
@section('content')
<div class="container">
    <div class="mt-5">
        <div class="col d-flex justify-content-center">
            <h1 class="font-weight-bold">Edit {{ $patient->vaccine->name }} Patient</h1>
        </div>

        <form action="{{ route('patient.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="name">Vaccine Id</label>
                <input name="vaccine_id" type="number" class="form-control" id="vaccine_id" placeholder="Vaccine Id"
                    value="{{ $patient->vaccine_id }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Patient Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Patient name"
                    value="{{ $patient->name }}" required>
            </div>

            <div class="form-group">
                <label for="nik">NIK</label>
                <input name="nik" type="text" class="form-control" id="nik" placeholder="NIK"
                    value="{{ $patient->nik }}" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3"
                    required>{{ $patient->alamat }}</textarea>
            </div>

            <img src="{{ Storage::url($patient->image_ktp) }}" alt="vaccine-image" class="img-thumbnail" width="250"
                height="250">
            <div class="form-group">
                <label for="image">KTP</label>
                <input name="image_ktp" type="file" class="form-control-file" id="file" accept="image/*">
            </div>

            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="No Hp"
                    value="{{ $patient->no_hp }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
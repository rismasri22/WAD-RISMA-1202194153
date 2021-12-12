@extends('templates.master')
@section('content')
<div class="container">
    <div class="mt-5">
        <div class="col d-flex justify-content-center">
            <h1 class="font-weight-bold">Edit Vaccine</h1>
        </div>

        <form action="{{ route('vaccine.update', [$vaccine->id]) }}" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label for="name">Vaccine Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Vaccine name"
                    value="{{ $vaccine->name }}" required>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="price">Rp</span>
                    </div>
                    <input name="price" type="number" class="form-control" placeholder="Vaccine price"
                        aria-label="Vaccine price" aria-describedby="price" value="{{ $vaccine->price }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"
                    required>{{ $vaccine->description }}</textarea>
            </div>

            <img src="{{ Storage::url($vaccine->image) }}" alt="vaccine-image" class="img-thumbnail" width="250"
                height="250">
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="file" class="form-control-file" id="file" accept="image/*" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
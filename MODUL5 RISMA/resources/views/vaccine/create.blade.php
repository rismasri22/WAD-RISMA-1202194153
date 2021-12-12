@extends('templates.master')
@section('content')
<div class="container">
    <div class="mt-5">
        <div class="col d-flex justify-content-center">
            <h1 class="font-weight-bold">Input Vaccine</h1>
        </div>

        <form action="{{ route('vaccine.store') }}" method="POST" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="form-group">
                <label for="name">Vaccine Name</label>
                <input name="name" type="text" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="price">Rp</span>
                    </div>
                    <input name="price" type="number" class="form-control"  aria-label="Vaccine price"
                        aria-describedby="price" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="file" class="form-control-file" id="file" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
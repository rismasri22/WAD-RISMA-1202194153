@extends('templates.master')
@section('content')
<div class="container">
    @if ($vaccines->isNotEmpty())
    <div class="col d-flex justify-content-center my-5">
        <h1>List Vaccine</h1>
    </div>

    <div class="card-deck">
        @foreach ($vaccines as $vaccine)
        <div class="col-sm-4 mb-5">
            <div class="card  h-100">
                <img class="card-img-top" src="{{ Storage::url($vaccine->image) }}" alt="vaccine image" height="200"
                    style="object-fit: cover">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold">{{ $vaccine->name }}</h4>
                    <p class="text-secondary">Rp{{ number_format($vaccine->price,0,",",".") }}</p>
                    <p class="card-text">{{ $vaccine->description }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('patient.create', ['vaccine_id' => $vaccine->id]) }}"
                        class="btn btn-primary btn-block">Vaccine Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else

    <div class="my-5">
        <div class="col d-flex justify-content-center">
            <h1>There's no data</h1>
        </div>
        <div class="col d-flex justify-content-center">
            <a href="{{ route('vaccine.create') }}" class="btn btn-dark">Add vaccine</a>
        </div>
    </div>
    @endif

</div>
@endsection
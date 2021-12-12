@extends('templates.master')
@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        <i class="fa fa-check"></i> {{ session()->get('success') }}
    </div>
    @endif

    @if($vaccines->isNotEmpty())
    <div class="col d-flex justify-content-center my-5">
        <h1>List Vaccine</h1>
    </div>

    <a href="{{ route('vaccine.create') }}" class="btn btn-primary">Add Vaccine</a>

    <div class="table-responsive my-3">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($vaccines as $vaccine)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $vaccine->name }}</td>
                    <td>Rp {{ number_format($vaccine->price,0,",",".") }}</td>
                    <td>
                        <div class="btn-toolbar">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{ route('vaccine.edit', [$vaccine->id]) }}"
                                        class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="{{ route('vaccine.destroy', [$vaccine->id]) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this vaccine?');">
                                            <i class="fa fa-times-circle"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @php $i++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center mt-5">
        <p>There is no data. . .</p>
        <a href="{{ route('vaccine.create') }}" class="btn btn-primary">Add Vaccine</a>
    </div>
    @endif

</div>
@endsection
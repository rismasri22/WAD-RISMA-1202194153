@extends('templates.master')
@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        <i class="fa fa-check"></i> {{ session()->get('success') }}
    </div>
    @endif

    @if($patients->isNotEmpty())
    <div class="col d-flex justify-content-center my-5">
        <h1>List Patient</h1>
    </div>

    <a href="{{ route('patient.register') }}" class="btn btn-primary">Register Patient</a>

    <div class="table-responsive my-3">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vaccine</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                @php $i = 1; @endphp
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $patient->vaccine->name }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->nik }}</td>
                    <td>{{ $patient->alamat }}</td>
                    <td>{{ $patient->no_hp }}</td>
                    <td>
                        <div class="btn-toolbar">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{ route('patient.edit', [$patient->id]) }}"
                                        class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="{{ route('patient.destroy', [$patient->id]) }}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this patient?');">
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
        <a href="{{ route('patient.register') }}" class="btn btn-primary">Register Patient</a>
    </div>
    @endif

</div>
@endsection
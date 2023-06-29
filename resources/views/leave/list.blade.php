@extends('layouts.basic')

@section('title', 'Leaves List')

@section('content')
    <h2 class="text-info text-center">Leaves requests</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title justify-center">Users List</h4>
            <div class="d-flex gap-4">

            </div>

        </div>

        <div class="card-body ">
            <div class="table-responsive ">
                <table class="table table-light">
                    <thead class="text-danger">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Requested dates</th>
                            <th scope="col">Acceptation</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaveList as $leave)
                            <tr>
                                <td scope="row">{{ $leave->userRequest->id }}</td>
                                <td scope="row">{{ $leave->userRequest->name }}</td>
                                <td scope="row">{{ $leave->userRequest->email }}</td>
                                <td scope="row">{{ $leave->start_date }}</td>
                                <td scope="row">{{ $leave->end_date }}</td>
                                <td scope="row">{{ $leave->requested_days }}</td>
                                <td scope="row">{{ $leave->is_validated }}</td>
                                <td scope="row">
                                    <div class="input-group">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('leave.edit', ['leave' => $leave->id]) }}" title="Edit"
                                            role="button">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                    </div>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-center">
            {{ $leaveList->links() }}
        </div>
    </div>
@endsection

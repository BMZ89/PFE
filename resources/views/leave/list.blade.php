@extends('layouts.basic')

@section('title', 'Leaves List')

@section('content')
    <h2 class="text-info text-center">Leaves requests</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Users List</h4>
            <div class="d-flex gap-4">
                <form class="input-group" action="{{ route('leave.index') }}" method="get">
                    <input type="search" name="search" class="form-control" placeholder="Search"
                        value="{{ request()->input('search') }}" aria-describedby="helpId">
                    <button class="btn btn-md btn-info" title="Search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

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

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaveList as $leave)
                            <tr>
                                <td scope="row">{{ $leave->userRequest > id }}</td>
                                <td scope="row">{{ $leave->userRequest->name }}</td>
                                <td scope="row">{{ $leave->userRequest->email }}</td>
                                <td scope="row">{{ $leave->start_date }}</td>
                                <td scope="row">{{ $leave->start_date }}</td>
                                <td scope="row">{{ $leave->end_date }}</td>
                                <td scope="row">{{ $leave->requested_days }}</td>

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

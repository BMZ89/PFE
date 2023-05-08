@extends('layouts.basic')

@section('title', 'Users List')

@section('content')
    <h2 class="text-info text-center">Users</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Users List</h4>
            <div class="d-flex gap-4">
                <form class="input-group" action="{{ route('users.index') }}" method="get">
                    <input type="search" name="search" class="form-control" placeholder="Search"
                        value="{{ request()->input('search') }}" aria-describedby="helpId">
                    <button class="btn btn-md btn-info" title="Search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('users.create') }}" class="btn btn-md btn-info w-50">New User</a>
            </div>

        </div>

        <div class="card-body ">
            <div class="table-responsive ">
                <table class="table table-light">
                    <thead class="text-danger">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Matricule</th>

                            <th scope="col">Role</th>
                            <th scope="col">incrmentation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userList as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
                                <td scope="row">{{ $user->name }}</td>
                                <td scope="row">{{ $user->email }}</td>
                                <td scope="row">{{ $user->matricule }}</td>

                                <td scope="row">{{ $user->role }}</td>
                                <td scope="row">{{ $user->incrementation }}</td>
                                <td scope="row">

                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-center">
            {{ $userList->links() }}
        </div>
    </div>
@endsection

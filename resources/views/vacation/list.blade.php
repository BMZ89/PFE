@extends('layouts.basic')

@section('title', 'Vacation List')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img3.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container ">
                <div class="row d-flex justify-content-center align-items-center >
            <div class="col-12 col-md-9
                    col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <h3 class="text-uppercase text-center mb-2">Vacation List</h3>
                            <div class="d-flex gap-4">
                                <div class="input-group" action="{{ route('vacation.index') }}" method="get">

                                    </button>
                                </div>
                            </div>

                            <div class="card-body ">
                                <div class="table-responsive ">
                                    <table class="table table-light text-succes table-hover table-bordered">
                                        <thead class="text-succes ">
                                            <tr class="table-primary">
                                                <th scope="col">User id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Email</th>

                                                <th scope="col">Role</th>
                                                <th scope="col">Incrementation</th>
                                                <th scope="col">Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($vacationList as $vacation)
                                                <tr>
                                                    <td scope="row">{{ $vacation->user->id }}</td>
                                                    <td scope="row">{{ $vacation->user->name }}</td>
                                                    <td scope="row">{{ $vacation->balance }}</td>
                                                    <td scope="row">{{ $vacation->user->email }}</td>
                                                    <td scope="row">{{ $vacation->user->role }}</td>
                                                    <td scope="row">{{ $vacation->user->incrementation }}</td>
                                                    <td scope="row">{{ $vacation->updated_at }}</td>

                                                </tr>
                                            @endforeach


                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        {{ $vacationList->links() }}
                    </div>

                </div>

            </div>


    </section>


@endsection

@extends('layouts.basic')
@section('title', ' Customer List')
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
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container ">
                <div class="row d-flex justify-content-center align-items-center >
                    <div class="col-12
                    col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 20px;">
                        <div class="card-body p-5">
                            <h3 class="text-uppercase text-center mb-2">Customers List</h3>
                            <div class="d-flex gap-4">
                                <div class="input-group" action="{{ route('customer.index') }}" method="get">

                                    </button>
                                </div>
                            </div>

                            <div class="card-body ">
                                <div class="table-responsive ">
                                    <table class="table table-light text-succes table-hover table-bordered">
                                        <thead class="text-succes ">
                                            <tr class="table-primary">
                                                <th scope="col">Client Code</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Adress</th>
                                                <th scope="col">Activity</th>

                                                <th scope="col">Contact</th>
                                                <th scope="col">Activated</th>
                                                <th scope="col">Created by</th>
                                                <th scope="col">Created at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customerList as $customer)
                                                <tr>
                                                    <td scope="row">{{ $customer->id }}</td>
                                                    <td scope="row">{{ $customer->name }}</td>
                                                    <td scope="row">{{ $customer->adress }}</td>
                                                    <td scope="row">{{ $customer->activity }}</td>

                                                    <td scope="row">{{ $customer->contact }}</td>
                                                    <td scope="row">{{ $customer->is_validated }}</td>
                                                    <td scope="row">{{ $customer->user_id }}</td>
                                                    <td scope="row">{{ $customer->created_at }}</td>
                                                    </td>

                                                </tr>
                                            @endforeach

                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>


    </section>

    <div class="card-footer d-flex justify-content-center  bg-transparent border-success">
        {{ $customerList->links() }}
    </div>


@endsection

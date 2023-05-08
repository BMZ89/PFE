@extends('layouts.basic')
@section('title', 'Create Customer')
@section('content')
    {{-- <h1 class="text-success text-center mt-5">Create Customer</h1> --}}




    <section class=" bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100 ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create a new client</h2>

                                <form method="post" action={{ route('customer.store') }}>
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Name</label>
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Adress</label>
                                        <input type="adress" id="form3Example3cg" class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Activity</label>
                                        <input type="activity" id="form3Example4cg" class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Contact</label>
                                        <input type="contact" id="form3Example4cdg" class="form-control form-control-lg" />

                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">User Id</label>
                                        <input type="contact" id="form3Example4cdg" class="form-control form-control-lg" />

                                    </div>
                                    {{-- <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Created at</label>
                                        <input type="contact" id="form3Example4cdg" class="form-control form-control-lg" />

                                    </div> --}}
                                    <hr>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Validation</label>
                                        {{-- toggle  --}}
                                        <div class="dropdown mb-4">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Manager's validation
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="Checkme1" />
                                                            <label class="form-check-label" for="Checkme1">Yes</label>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="Checkme2" checked />
                                                            <label class="form-check-label" for="Checkme2">No</label>
                                                        </div>
                                                    </a>
                                                </li>


                                            </ul>
                                        </div>


                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Create</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

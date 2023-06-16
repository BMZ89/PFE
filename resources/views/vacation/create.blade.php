@extends('layouts.basic')
@section('title', 'Create Leave')
@section('content')
    <section class=" bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img3.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100 ">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create a new leave request</h2>

                                <form method="post" action={{ route('vacation.store') }}>
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Name</label>
                                        <input name="name" type="text" id="form3Example1cg"
                                            class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">ID</label>
                                        <input type="adress" name="adress" id="form3Example3cg"
                                            class="form-control form-control-lg" />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Email</label>
                                        <input type="activity" name="activity" id="form3Example4cg"
                                            class="form-control form-control-lg" />

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label for="start">Start date:</label>

                                        <input type="date" id="start" name="trip-start" max="2099-12-31">
                                    </div>

                                    <hr>


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

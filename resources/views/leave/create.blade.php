@extends('layouts.basic')
@section('title', 'Create Leave')
@section('content')
    <div
        class="bg-image"style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img3.webp'); ">
        <section class="align-text-bottom">
            <div class="mask d-flex align-items-center  gradient-custom-3">
                <div class="container-fluid mt-5 pt-5">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create a new leave request</h2>

                                    <form method="post" action={{ route('leave.store') }}>
                                        @csrf

                                        <div class="form-outline mb-4">
                                            <label for="start">Start date:</label>

                                            <input type="date" id="start_date" name="start_date" max="2099-12-31">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label for="start">End date:</label>

                                            <input type="date" id="end_date" name="end_date" max="2099-12-31">
                                        </div>

                                        <hr class='mt-5 pt-5'>


                                        <div class="d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Create</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <h1>.</h1>
                            <h1>.</h1>
                            <h1>.</h1>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('layouts.basic')

@section('title', 'Home')

@section('content')
    <h2 class="text-danger text-center">Home page</h2>
    <div class="container">
        <div class="row gy-4">
            <div class="col-sm">
                <a href="{{ route('customer.create') }}">
                    <div class="card h-100" ">
                                                <img src="https://media.licdn.com/dms/image/C5612AQEXTt4grfiTxQ/article-cover_image-shrink_720_1280/0/1520181045312?e=2147483647&v=beta&t=Z6g_nFW524kw9hTrqMfS9CshPF4-VV4OffMyJmROOCI"
                                                    class="card-img-top" alt="Customers photo">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">Customers</h5>
                                                    <p class="card-text">Some quick example text to build make up the bulk of the card's content.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                  
                                       
                                                <div class="col-sm">
                                                    <div class="card h-100">
                                                        <img src="https://img.supplychainconnect.com/files/base/ebm/sourcetoday/image/2019/06/sourcetoday_2879_gettyimages_650017844.png?auto=format,compress&fit=fill&fill=blur&w=1200&h=630"
                                                            class="card-img-top" alt="Suppliers photo">
                                                        <div class="card-body">
                                                            <h5 class="card-title fw-bold">Suppliers</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                                card's content. Some more quick example text for the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <a href="{{ route('leave.create') }}">
                                                    <div class="card h-100">
                                                        <img src="https://previews.123rf.com/images/rawpixel/rawpixel1802/rawpixel180200347/94660584-vacation-calendar-reminder.jpg"
                                                            class="card-img-top" alt="Vacation photo"> </a>
                                                        <div class="card-body">
                                                            <h5 class="card-title fw-bold">Vacation</h5>
                                                            <p class="card-text">Some quick example text to make up the bulk of the card's content.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
@endsection

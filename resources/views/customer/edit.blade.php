@extends('layouts.basic')

@section('title', 'Edit Customer')

@section('content')
    <h2 class="text-danger text-center">Customers</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Edit Customer</h4>

            <a href="{{ route('customer.index') }}" class="btn btn-md btn-info ">Customer List</a>

        </div>
        <div class="card-body">

            <form method="post" action="{{ route('customer.update', ['customer' => $customer->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="col-4 col-form-label">Name</label>
                    <div class="col-6">
                        <input type="text"
                            class="form-control @error('name')
                        is-invalid
                    @enderror"
                            name="name" id="name" placeholder="Name" value="{{ old('name', $customer->name) }}">
                    </div>
                </div>

                <div class="mb-3">

                    <div class="col-6">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="is_validated">Activated</label>
                            <input class="form-check-input" type="checkbox"
                                {{ $customer->is_validated == false ? '' : 'checked' }} role="switch" id="is_validated"
                                name="is_validated">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection

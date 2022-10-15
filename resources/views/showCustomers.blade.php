@extends('template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 style="text-align: center; margin-bottom: 20px;">Edit customer</h5>
                    <form action="{{route('customers-update',['id'=>$customer->id])}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Customer id: {{$customer->id}}</label></br>
                            <label for="customer_id_number" class="form-label">Id customer</label>
                            <input type="text" class="form-control" name="customer_id_number" value="{{$customer->customer_id_number}}" >
                            <label for="customer_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="customer_name" value="{{$customer->customer_name}}" >
                            <label for="customer_birth_date" class="form-label">Birth date</label>
                            <input type="date" class="form-control" name="customer_birth_date" value="{{$customer->customer_birth_date}}" >
                            <label for="customer_address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="customer_address" value="{{$customer->customer_address}}" >
                            <label for="customer_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="customer_phone" value="{{$customer->customer_phone}}" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>

                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        @error('customer_id_number')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('customer_birth_date')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('customer_address')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('customer_phone')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 style="text-align: center; margin-bottom: 20px;">Edit product</h5>
                    <form action="{{route('productos-update',['id'=>$producto->id])}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product id: {{$producto->id}}</label></br>
                            <label for="product_description" class="form-label">Product description</label>
                            <input type="text" class="form-control" name="product_description" value="{{$producto->product_description}}" >
                            <label for="product_amount" class="form-label">Product amount</label>
                            <input type="text" class="form-control" name="product_amount" value="{{$producto->product_amount}}" >
                            <label for="product_value" class="form-label">Product value</label>
                            <input type="text" class="form-control" name="product_value" value="{{$producto->product_value}}" >
                            <label for="product_status" class="form-label">Product status</label>
                            <input type="text" class="form-control" name="product_status" value="{{$producto->product_status}}" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>

                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        @error('product_amount')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('product_value')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('product_description')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('product_status')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
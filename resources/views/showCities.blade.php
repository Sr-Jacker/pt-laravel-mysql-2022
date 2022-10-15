@extends('template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 style="text-align: center; margin-bottom: 20px;">Editar ciudad</h5>
                    <form action="{{route('cities-update',['id'=>$city->id])}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">City id: {{$city->id}}</label></br>
                            <label for="city_name" class="form-label">Product description</label>
                            <input type="text" class="form-control" name="city_name" value="{{$city->city_name}}" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>

                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        @error('city_name')
                            <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
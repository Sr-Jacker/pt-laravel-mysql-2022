@extends('template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6 style="text-align: center; margin-bottom: 10px;">Agrega una nueva ciudad</h6>
                    <form action="{{route('cities')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="city_name" class="form-label">City name</label>
                            <input type="text" class="form-control" name="city_name">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>

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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    @if (session('update-success'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ session('update-success') }}
                        </div>
                    </div>
                    @endif

                    <table id="listado-ciudades" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                            <tr>
                                <td>
                                    {{$city->id}}
                                </td>
                                <td>
                                    {{$city->city_name}}
                                </td>
                                <td>
                                    <a href="{{route('cities-show',['id' =>$city->id])}}">Edit</a>
                                    <form action="{{route('cities-destroy',[$city->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
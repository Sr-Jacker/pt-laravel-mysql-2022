@extends('template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6 style="text-align: center; margin-bottom: 10px;">Agrega un nuevo customer</h6>
                    <form action="{{route('customers')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_id_number" class="form-label">Id customer</label>
                            <input type="text" class="form-control" name="customer_id_number">
                            <label for="customer_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="customer_name">
                            <label for="customer_birth_date" class="form-label">Birth date</label>
                            <input type="date" class="form-control" name="customer_birth_date">
                            <label for="customer_address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="customer_address">
                            <label for="customer_phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="customer_phone">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>

                        @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        @error('customer_id_number')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror

                        @error('customer_name')
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

                    <table id="listado-customers" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id customer</th>
                                <th>Name</th>
                                <th>Birth date</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    {{$customer->id}}
                                </td>
                                <td>
                                    {{$customer->customer_id_number}}
                                </td>
                                <td>
                                    {{$customer->customer_name}}
                                </td>
                                <td>
                                    {{$customer->customer_birth_date}}
                                </td>
                                <td>
                                    {{$customer->customer_address}}
                                </td>
                                <td>
                                    {{$customer->customer_phone}}
                                </td>
                                <td>
                                    <a href="{{route('customers-show',['id' =>$customer->id])}}">Edit</a>
                                    <form action="{{route('customers-destroy',[$customer->id])}}" method="post">
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
                                <th>Id customer</th>
                                <th>Name</th>
                                <th>Birth date</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
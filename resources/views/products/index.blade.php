@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="card bg-default">
    <div class="card card-header">
        Products
    </div>
    <div class="card card-body">
        <table class="table">
        <thead>
            <th>
                Name
            </th>
            <th>
                Price
            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit' , ['product' => $product->id]) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <form action="{{ route('products.destroy' , ['product' => $product->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('Delete') }}
                    <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

            
        </tbody>
    </table>
    </div>
</div>
</div>
</div>
</div>
    
@endsection
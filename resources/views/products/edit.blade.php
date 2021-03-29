@extends('layouts/app')
@section('content')
@if($errors->count() > 0)
<ul class="list-group">
    @foreach($errors->all() as $error)
        <li class="list-group-item text-danger">
            {{ $error }}
        </li>
    @endforeach
</ul>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card bg-default">
                <div class="card-header">Update Products</div>

                <div class="card-body">
<form action="{{ route('products.update', ['product' => $product->id])}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" >
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="discription">Discription</label>
        <textarea name="discription" id="discription" cols="30" rows="10"  class="form-control">{{ $product->discription }}</textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-success float-right form-control" >Update Product</button>
    </div>
</form>

</div>
</div>
</div>
</div>
</div>
    
@endsection
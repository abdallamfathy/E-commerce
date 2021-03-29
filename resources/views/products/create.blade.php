@extends('layouts/app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card bg-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
<form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" >
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="discription">Discription</label>
        <textarea name="discription" id="discription" cols="30" rows="10"  class="form-control">{{ old('discription') }}</textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-success form-control" >Submit</button>
    </div>
</form>

</div>
</div>
</div>
</div>
</div>
    
@endsection
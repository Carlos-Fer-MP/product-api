<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('product.create') }}">Create Product</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->Name}}</td>
                <td>{{$product->Price}}</td>
                <td>{{$product->Availability}}</td>
                <td>{{$product->Type}}</td>
                <td>
                    <form action="{{ route('product.destroy',$product->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
{!! $products->links() !!}
</body>
</html>

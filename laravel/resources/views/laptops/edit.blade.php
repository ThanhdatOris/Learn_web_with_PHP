@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa Laptop</h1>
        <form action="{{ route('laptops.update', $laptop->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $laptop->name }}" required>
            </div>
            <div class="form-group">
                <label for="brand">Thương hiệu</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $laptop->brand }}" required>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $laptop->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm Laptop</h1>
        <form action="{{ route('laptops.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="brand">Thương hiệu</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
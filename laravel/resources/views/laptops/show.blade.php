@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết Laptop</h1>
        <p><strong>Tên:</strong> {{ $laptop->name }}</p>
        <p><strong>Thương hiệu:</strong> {{ $laptop->brand }}</p>
        <p><strong>Giá:</strong> {{ $laptop->price }}</p>
        <a href="{{ route('laptops.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
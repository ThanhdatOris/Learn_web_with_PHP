@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách Laptop</h1>
        <a href="{{ route('laptops.create') }}" class="btn btn-primary">Thêm Laptop</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Thương hiệu</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laptops as $laptop)
                    <tr>
                        <td>{{ $laptop->name }}</td>
                        <td>{{ $laptop->brand }}</td>
                        <td>{{ $laptop->price }}</td>
                        <td>
                            <a href="{{ route('laptops.show', $laptop->id) }}" class="btn btn-info">Xem</a>
                            <a href="{{ route('laptops.edit', $laptop->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
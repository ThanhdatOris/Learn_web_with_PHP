@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $laptop->name }}</h1>
        <p><strong>Brand:</strong> {{ $laptop->brand }}</p>
        <p><strong>Price:</strong> {{ $laptop->price }}</p>
        <a href="{{ route('laptops.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
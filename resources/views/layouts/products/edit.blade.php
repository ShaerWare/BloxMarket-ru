@extends('layouts.app')

@section('content')
<h1>Редактировать продукт</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
@csrf
@method('PUT')

<div>
<label for="name">Название:</label>
<input type="text" name="name" id="name" value="{{ $product->name }}">
</div>

<button type="submit">Сохранить</button>
</form>
@endsection

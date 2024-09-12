@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{_('Товары')}}</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}">{{_('Создать новый')}}</a>
                @endcan
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
            <th>{{_('№')}}</th>
            <th>{{_('Артикул')}}</th>
            <th>{{_('Название')}}</th>
            <th>{{_('Описание')}}</th>
            <th>{{_('Фото')}}</th>
            <th>{{_('Дескрипшн')}}</th>
            <th>{{_('Акция')}}</th>
            <th>{{_('Скидка')}}</th>
            <th width="280px">{{_('Действие')}}</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">{{_('Показать')}}</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">{{_('Изменить')}}</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">{{_('Удалить')}}</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $products->links() !!}

<p class="text-center text-primary"><small> </small></p>
@endsection

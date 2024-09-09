@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{_('Настройка ролей пользователей')}}</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('futers.create') }}">{{_(' создать новый')}}</a>
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
     <th>{{_('Название')}}</th>
     <th>{{_('Адрес')}}</th>
     <th width="280px">{{_('Действие')}}</th>
  </tr>
    @foreach ($futers as $key => $futer)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('futers.show',$role->id) }}">{{_('Показать')}}</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('futers.edit',$role->id) }}">{{_('Изменить')}}</a>
            @endcan
            <form action="{{ route('futers.destroy',$role->id) }}" method="POST">


                @csrf
                @method('DELETE')
                @can('role-delete')
                <button type="submit" class="btn btn-danger">{{_('Удалить')}}</button>
                @endcan
            </form>

        </td>
    </tr>
    @endforeach
</table>

{!! $futers->render() !!}

@endsection

@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ __('Правки ролей') }}</h2>
        </div><br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">{{ __('Назад') }}</a>
        </div>
    </div>
</div>
<br>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{{ __('Упс!') }}</strong> {{ __('У нас проблемы.') }}<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('roles.update', $role->id) }}" method="post">
    @method('patch')
    @csrf

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Имя') }}:</strong>
            <input value="{{ $role->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="{{ __('Имя') }}" required>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{_('Раздел')}}:</strong>
            <br/>

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="1%"> </th>

                </thead>
            </table>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{_('Настройки')}}:</strong>
            <br/>

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="1%"> </th>

                </thead>

                @foreach($permission as $value)
                    <tr>
                        <td>
                            <input type="checkbox"
                            name="permission[]"
                            value="{{ $value->name }}"
                            class='value'>

                        </td>
                        <td>{{ $value->name }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">{{ __('Обновить данные')}}</button>
    </div>
</div>
</form>

@endsection
<p class="text-center text-primary"><small> </small></p>

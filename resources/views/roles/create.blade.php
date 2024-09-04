@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ _('Создать новую роль') }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> {{ _('Назад') }}</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{ _('Упс!') }}</strong> {{ _('Показать') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ _('Название') }}:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ _('Привелегии') }}:</strong>
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

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">{{ _('Сохранить') }}</button>
            </div>
        </div>


    </form>

@endsection

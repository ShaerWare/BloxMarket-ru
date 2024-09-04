@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ __('Пользователи') }}</h2>
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
            <th>{{ __('No') }}</th>
            <th>{{ __('Имя') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Роль') }}</th>
            <th width="280px">{{ __('Выбор') }}</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">{{ __('Смотреть') }}</a>
                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">{{ __('Забанить') }}</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="btn btn-danger"
                            type="submit">{{ __('Удалить') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $data->render() !!}
@endsection

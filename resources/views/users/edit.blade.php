@extends('layouts.app')


@section('content')
    <center>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <br>
                    <h2>{{ __('Правки') }}</h2><br>
                </div>
                <div class="pull-right">
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4"
                        href="{{ route('users.index') }}"> {{ __('Назад') }}</a>
                </div><br>
            </div>
        </div>
    </center>

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

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @method('patch')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Имя') }}:</strong>

                    <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Email:') }}</strong>

                    <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Password:') }}</strong>
                    <input type="text" name="password" placeholder="password" />

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Confirm Password:') }}</strong>
                    <input type="text" name="confirm-password" placeholder="password" />

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Role:') }}</strong>
                    <br />
                    <p>
                        <select name="roles">
                            @foreach ($roles as $role)
                                <option value="{{ $role }}"
                                    {{ in_array($role, $userRole) ? 'selected' : '' }}>
                                    >{{ $role }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </p>

                </div>
            </div><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">{{ __('Обновить данные') }}</button>
            </div>
        </div>
    </form>
    <p class="text-center text-primary"><small>{{ __('') }}</small></p>
@endsection

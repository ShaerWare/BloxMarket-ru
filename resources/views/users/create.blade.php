@extends('layouts.app')


@section('content')
<center>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ __('Создать нового пользователя') }}</h2>
        </div>
        <div class="pull-right">
            <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4" href="{{ route('users.index') }}"> {{ __('Назад')}}</a>
        </div>
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


<form action="{{route('users.store')}}" method="POST">
    @csrf

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Имя') }}:</strong>
            <input type="text" name="name" placeholder="Имя" />
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Email:')}}</strong>
            <input type="email" name="email" placeholder="email" />
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Password:')}}</strong>
            <input type="password" name="password" placeholder="password" />
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Password:')}}</strong>
            <input type="password" name="confirm-password" placeholder="password" />
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('Role')}}:</strong>
            <select   name="roles">
                @foreach($roles as $role)
                    <option value="{{$role}}" >{{ $role }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">{{ __('Создать')}}</button>
    </div>
</div>
</Form>


<p class="text-center text-primary"><small>{{''}}</small></p>
@endsection

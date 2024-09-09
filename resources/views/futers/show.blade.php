@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{_('Показать')}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('futers.index') }}"> {{_('Назад')}}</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{_('Название')}}:</strong>
                {{ $futer->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{_('Название файла')}}:</strong>
                {{ $futer->detail }}
            </div>
        </div>
    </div>
@endsection
<p class="text-center text-primary"><small> </small></p>

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="h1">
            {{ __('lang.category.index.title') }}
            <a style="" href="{{ route('admin.category.create') }}" class="btn btn-primary float-right">{{ __('lang.category.index.create') }}</a>
        </div>
        {!! $dataGrid->render() !!}
    </div>
@stop
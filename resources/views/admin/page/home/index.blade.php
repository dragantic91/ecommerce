@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="h1">
            Home Banners

            <a href="{{ route('admin.home.create') }}"
               class="float-right btn btn-primary">
                {{ __('lang.admin-create-new-banner') }}
            </a>

        </div>
        {!! $dataGrid->render() !!}
    </div>
@stop
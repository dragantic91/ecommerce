@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="h1">
            {{ __('lang.admin-users') }}

                <a href="{{ route('admin.admin-user.create') }}"
                   class="float-right btn btn-primary">
                    {{ __('lang.admin-create-admin-user-button-title') }}
                </a>

        </div>
        {!! $dataGrid->render() !!}
    </div>
@stop
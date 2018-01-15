@extends('admin.layouts.app')


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">{{ __('lang.category.index.create') }}</div>
                <div class="card-body">

                    <form method="post" action="{{ route('admin.category.store') }}">
                        {{ csrf_field() }}

                        @include('admin.category._fields')
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('lang.category.index.create') }}</button>
                            <a href="{{ route('admin.category.index') }}" class="btn ">Cancel</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
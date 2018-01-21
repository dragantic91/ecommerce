@extends('admin.layouts.app')
@section('content')
    <div class="container">
        {!! $dataGrid->render() !!}
        <div class="text-right">
            <p>
                <button class="btn btn-secondary">
                    <a style="text-decoration: none;" href="{{ route('pdfview',['download'=>'pdf']) }}">PDF Herunterladen</a>
                </button>

            </p>
        </div>
    </div>

@stop
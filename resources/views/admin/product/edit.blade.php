@extends('admin.layouts.app')

@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h1">Produkt bearbeiten</div>
            </div>
        </div>

        <?php
        $productCategories = $model->categories()->get()->pluck('id')->toArray();
        ?>
        <form id="product-save-form"
              action="{{ route('admin.product.update', $model->id) }}"
              enctype="multipart/form-data" method="post"  novalidate>
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">

            <div class="row" id="product-save-accordion" data-children=".product-card">
                <div class="col-12 mb-2 mt-2">
                    <div class="card product-card  mb-2 mt-2">
                        <div class="card-header">
                            {{ __('lang.basic-details') }}
                            <a data-toggle="collapse" data-parent="#product-save-accordion"
                               class="float-right" href="#basic">
                                <i class="oi oi-caret-bottom"></i>
                            </a>
                        </div>
                        <div class="card-body collapse show" id="basic">
                            @include('admin.product.card.basic', ['editMethod' => true])
                        </div>
                    </div>

                    <div class="card product-card mb-2 mt-2">
                        <div class="card-header">
                            {{ __('lang.images') }}
                            <a data-toggle="collapse" data-parent="#product-save-accordion"
                               class="float-right" href="#images">
                                <i class="oi oi-caret-bottom"></i>
                            </a>
                        </div>
                        <div class="card-body collapse" id="images">
                            @include('admin.product.card.images')
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="jQuery('#product-save-form').submit()">
                    {{ __('lang.product-edit-product') }}
                </button>
                <button type="button" class="btn" onclick="location='{{ route('admin.product.index') }}'">
                    {{ __('lang.cancel') }}
                </button>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("input[name=new_product_toggle]").on('change', function () {
                if ($('#new_product').val() == 1) {
                    $('#new_product').val(0);
                } else {
                    $('#new_product').val(1);
                }
            });
            $("input[name=hit_product_toggle]").on('change', function () {
                if ($('#hit_product').val() == 1) {
                    $('#hit_product').val(0);
                } else {
                    $('#hit_product').val(1);
                }
            });

        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                var form = document.getElementById('product-save-form');
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();
    </script>
@endpush
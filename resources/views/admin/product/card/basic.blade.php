<div class="row">
    <div class="col-6">
        @include('admin.forms.text',['name' => 'name','label' => 'Name'])
    </div>
    <div class="col-6">
        @if(!isset($productCategories))
            <?php $productCategories = []; ?>
        @endif

        @include('admin.forms.select2',['name' => 'category_id[]',
                                                'label' => __('lang.category'),
                                                'attributes' => ['class' => 'form-control select2',
                                                                'id' => 'category_id',
                                                                'multiple' => true,
                                                                ],
                                                'options' => $categoryOptions,
                                                'values' => $productCategories])


    </div>
</div>


<div class="row">
    <div class="col-6">
        @if(isset($editMethod) && $editMethod)
            @include('admin.forms.text',['name' => 'slug','label' => __('lang.slug')])
        @endif
    </div>
    <div class="col-6">
        @include('admin.forms.text',['name' => 'product_no','label' => __('lang.product-number')])
    </div>
</div>

@include('admin.forms.textarea',['name' => 'description','label' => __('lang.description'),
                                            'attributes' => ['class' => 'ckeditor','id' => 'description']])

<div class="row">
    <div class="col-6">
        @include('admin.forms.text',['name' => 'price','label' => __('lang.order-price')])
    </div>
    <div class="col-6">
        @include('admin.forms.select',['name' => 'status','label' => 'Status', 'options' => ['1' => "Online",'0' => "Offline"]])
    </div>
</div>

<div class="row">
    <div class="col-6">
        @include('admin.forms.select',['name' => 'discount','label' => __('lang.discount'), 'options' => ['1' => "Ja",'0' => "Nein"]])
    </div>
    <div class="col-6">
        @include('admin.forms.text',['name' => 'discount_price', 'label' => __('lang.discount-price')])
    </div>
</div>

<div class="row">
    <div class="col-6">
        @include('admin.forms.select',['name' => 'delivery','label' => __('lang.delivery'), 'options' => ['1' => "Ja",'0' => "Nein"]])
    </div>
    <div class="col-6">
        @include('admin.forms.text',['name' => 'delivery_price','label' => __('lang.delivery-price')])
    </div>
</div>

<div class="row">
    <div class="col-6">
        @include('admin.forms.text',['name' => 'qty','label' => __('lang.quantity')])
    </div>
    <div class="col-6">
        @include('admin.forms.select',['name' => 'in_stock','label' => __('lang.in-stock'), 'options' => ['1' => "Ja",'0' => "Nein"]])
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="new_product">{{ __('lang.new-product') }}</label>
            <div class="checkbox">
                <label style="margin-left: 20px;">
                    <input id="new_toggle" name="new_product_toggle" type="checkbox" data-toggle="toggle" data-on="{{ __('front.yes') }}" data-off="{{ __('front.no') }}" @if ($model['new_product'] === 1) checked @endif>
                    <input hidden id="new_product" type="number" name="new_product" value="{{ $model['new_product'] }}" />
                </label>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="hit_product">{{ __('lang.hit-product') }}</label>
            <div class="checkbox">
                <label style="margin-left: 20px;">
                    <input id="hit_toggle" name="hit_product_toggle" type="checkbox" data-toggle="toggle" data-on="{{ __('front.yes') }}" data-off="{{ __('front.no') }}" @if ($model['hit_product'] === 1) checked @endif>
                    <input hidden id="hit_product" type="number" name="hit_product" value="{{ $model['hit_product'] }}" />
                </label>
            </div>
        </div>
    </div>
</div>




@include('admin.forms.text',['name' => 'name','label' => __('lang.name')])
@include('admin.forms.text',['name' => 'slug','label' => __('lang.slug')])

@include('admin.forms.textarea',['name' => 'content',
                                            'label' => __('lang.content'),
                                            'attributes' => ['class' => 'ckeditor','id' => 'content']])

@include('admin.forms.text',['name' => 'meta_title','label' => __('lang.meta-title')])
@include('admin.forms.text',['name' => 'meta_description','label' => __('lang.meta-description')])

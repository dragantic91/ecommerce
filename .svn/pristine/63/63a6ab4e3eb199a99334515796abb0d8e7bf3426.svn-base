<?php foreach ($categories as $category): ?>

<?php $childCategories = $category['children']; ?>


@if(count($childCategories) > 0)
    <li class="categ-1 has_child">
        <a
                href="{{ url('category?slug=' . $category['object']->slug) }}"
                title="{{ $category['object']->name }}">
            <span class="categ-1-label">{{ $category['object']->name }}</span>
            <span class="section-sb-toggle"><span class="section-sb-ico"></span></span>
        </a>
@else

    <li class="categ-1">
        <a
                href="{{ url('category?slug=' . $category['object']->slug) }}"
                title="{{ $category['object']->name }}">
            <span class="categ-1-label">{{ $category['object']->name }}</span>
        </a>
        @endif


        <?php while (true): ?>

        <?php if ($category['object'] == NULL): ?>
            <?php break ?>
        <?php endif; ?>

        <?php
        $slug = $category['object']->slug;
        $name = $category['object']->name;
        $category['object'] = NULL;
        ?>
        <?php if (count($childCategories) > 0): ?>
        <ul>
            @include('front.layouts.category-tree-categories',['categories' => $childCategories])
        </ul>
        <?php endif; ?>
        <?php endwhile; ?>
    </li>
    <?php endforeach; ?>
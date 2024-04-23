@foreach($attributeSets as $attributeSet)
   @php($selected = Arr::get($selectedAttrs, $attributeSet->slug, $selectedAttrs))

    @if(view()->exists($view = Theme::getThemeNamespace('views.ecommerce.attributes._layouts-filter.' . $attributeSet->display_layout)))
        @include($view, [
            'set'        => $attributeSet,
            'attributes' => $attributeSet->attributes,
        ])
    @else
        @include(Theme::getThemeNamespace('views.ecommerce.attributes._layouts.dropdown'), [
            'set'        => $attributeSet,
            'attributes' => $attributeSet->attributes,
        ])
    @endif
@endforeach

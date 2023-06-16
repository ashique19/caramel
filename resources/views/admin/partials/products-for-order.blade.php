@if( $category->products()->where('stock_quantity', '>', 0)->count() > 0 )
@foreach( $category->products()->where('stock_quantity', '>', 0)->get() as $product )
<tr class="product">
    <td>
        {!! Form::hidden('product_id[]', $product->id) !!}
        <span class="tag">CODE: {{ substr($category->name, 0, 3) }} {{ $product->id }}</span>
        <a href="{{ action('CategoryPublic@'.$category->name_slug.'Item', $product->id) }}">
            <img width="90" class="lazy" data-src="{{ xs_link( $product->thumb_image ) }}" alt="{{ $product->name }}"></img>
        </a>
        <span class="tag @if($product->stock_quantity < 5) @if( $product->stock_quantity == 0 ) is-danger @else is-warning @endif @endif">{{ $product->stock_quantity }}</span>
    </td>
    <td width="100">
        <div class="control">
            <input name="price[]" class="input is-small" type="text" placeholder="Primary input" value="{{ $product->price }}">
        </div>
    </td>
    <td width="200">
        <div class="field has-addons">
            <p class="control">
                <a class="button is-small decrease">
                    <span class="icon is-small">
                        <i class="fas fa-minus"></i>
                    </span>
                </a>
            </p>
            <p class="control">
                <input name="quantity[]" type="text" class="input is-small has-text-centered" value="0">
            </p>
            <p class="control">
                <a class="button is-small increase">
                    <span class="icon is-small">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>
            </p>
        </div>
    </td>
    <td class="product-total">
        0
    </td>
</tr>
@endforeach
@endif
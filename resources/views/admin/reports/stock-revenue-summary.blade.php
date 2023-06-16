@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase" >
    
    <div class="column is-12 padding-left-0">
        <h1 class="title is-3">
            Stock Revenue Summary
        </h1>
    </div>
    
    <div class="column is-12 padding-left-0">
    {!! errors($errors) !!}
    </div>
    
    
    {!! Form::open(['url'=> action('Reports@postStockRevenueSummary'), 'class'=>'column is-12 scrollable padding-bottom-100']) !!}
        
        <div class="tags">
            <div class="buttons has-addons">
                <span class="button">Order Date</span>
                <span class="button">
                    <input class="input" type="text" name="from_date" placeholder="From (e.g. 2018-01-26)">
                </span>
                <span class="button">
                    <input class="input" type="text" name="to_date" placeholder="To (e.g. 2018-01-26)">
                </span>
            </div>
        </div>
        
        @foreach( \App\Category::all() as $category )
        
        <h3 class="subtitle is-4">{{ $category->name }}</h3>
        
        <div class="tags selectable-products">
            <span class="tag">
                Image Size
            </span>
            <button type="button" class="tag is-danger" img-size-toggler="24x24">24 px</button>
            <button type="button" class="tag" img-size-toggler="32x32">32 px</button>
            <button type="button" class="tag" img-size-toggler="48x48">48 px</button>
            @if( $category->products()->count() > 0 )
            @foreach( $category->products()->select('id','category_id','thumb_image')->get() as $product )
            <span class="tag is-large selectable">
                <img data-lazy="{{ xs_link( $product->thumb_image ) }}" class="image is-24x24">
                <input type="checkbox" name="ids[]" value="{{ $product->id }}"/>
            </span>
            @endforeach
            @endif
        </div>
        
        @endforeach
        
        <div class="tags">
            {!! Form::submit('Submit', ['class'=>'button is-info']) !!}
        </div>
        
        
    {!! Form::close() !!}
    
    
</div>

@section('js')
<script type="text/javascript">

$(document).ready(function(){
    
    $('[img-size-toggler]').click(function(){
        
        $(this).parent().find('[img-size-toggler]').removeClass('is-danger');
        $(this).addClass('is-danger');
        
        $(this).parent().find('img').attr('class', 'image is-'+ $(this).attr('img-size-toggler') );
        
    })
    
    $('.selectable-products .selectable.tag').click(function(){
        $(this).toggleClass('is-danger');
    })
    
    
})

</script>
@stop

@stop
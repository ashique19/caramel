@if( auth()->user() )
@if( in_array( auth()->user()->role, [1,2,3] ) )

<a href="#" class="status" data-edit-product="{{ action('Products@editAjax', $product->id) }}">
    <i class="fas fa-dot-circle fa-2x @if($product->is_published == 0)yellow-text @else green-text @endif" 
     data-toggle="tooltip" 
     data-placement="bottom" 
     data-trigger="hover" 
     data-container="body" 
     data-title="@if($product->is_published == 0) Unpublished : Visitors cannot see this post. @else Published. Visitors can see this post. @endif"></i>
</a>


<!--<a  href="#" -->
<!--    class="status" -->
<!--    data-toggle="popover" -->
<!--    data-placement="bottom" -->
<!--    data-html="true" -->
<!--    data-container="body"-->
<!--    data-trigger="click"-->
<!--    data-content='-->
    
<!--    {!! Form::open([ "url" => action("Products@update", $product->id), "method"=>"PATCH", "enctype"=>"multipart/form-data", "class"=>"columns is-multiline product-edit-form white-bg" ]) !!}-->
            
<!--    <div class="column is-5">-->
        
<!--        <div class="field padding-left-0">-->
<!--            <div class="image-upload">-->
<!--                <label class="label is-pulled-left">Thumbnail:</label>-->
<!--                {!! Form::file("thumb_images", ["class"=> "file image-file", "placeholder"=> "Thumbnail"]) !!}-->
<!--                <i class="fas fa-plus hover yellow-text"></i>-->
<!--                <p class="preview">-->
<!--                    <img src="{{ $product->thumb_image }}" width="100" />-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
        
<!--        <div class="field padding-left-0">-->
<!--            <div class="image-upload">-->
<!--                <label class="label is-pulled-left">All Images:</label>-->
<!--                {!! Form::file("all_image[]", ["class"=> "file image-file", "multiple"=> "multiple"]) !!}-->
<!--                <i class="fas fa-plus hover yellow-text"></i>-->
<!--                <p class="preview">-->
<!--                    @if( count($product->all_images) > 0 )-->
<!--                    @foreach( $product->all_images as $img )-->
<!--                    <span>-->
<!--                        delete <input type="checkbox" name="all_images_delete[]" value="{{ $img }}" />-->
<!--                        <img src="{{ $img }}" width="100" />-->
<!--                    </span>-->
<!--                    @endforeach-->
<!--                    @endif-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
        
<!--    </div>-->
    
<!--    <div class="column is-7 columns is-multiline">-->
    
<!--        <div class="field column is-6-desktop is-12-mobile">-->
<!--            <label class="label is-pulled-left">Name</label>-->
<!--            {!! Form::text("name", $product->name, ["class"=> "input", "placeholder"=> "Name"]) !!}-->
<!--        </div>-->
    
<!--        <div class="field column is-6-desktop is-12-mobile">-->
<!--            <label class="label is-pulled-left">Category</label>-->
<!--            {!! Form::select("category_id", \App\Category::pluck("name", "id"), $product->category_id, ["class"=> "select", "placeholder"=> "-Category-", "required"=> "required"]) !!}-->
<!--        </div>-->
        
<!--        <div class="field column is-6-desktop is-12-mobile">-->
<!--            <label class="label is-pulled-left">Price</label>-->
<!--            {!! Form::text("price", $product->price, ["class"=> "input", "placeholder"=>"price"]) !!}-->
<!--        </div>-->
        
<!--        <div class="field column is-6-desktop is-12-mobile ">-->
<!--            <label class="label is-pulled-left">Order</label>-->
<!--            {!! Form::text("display_order", $product->display_order, ["class"=> "input", "placeholder"=>"Display order"]) !!}-->
<!--        </div>-->
        
<!--        @if( in_array(auth()->user()->role, [1,2]) )-->
<!--        <div class="field column is-12">-->
<!--            <label class="label is-pulled-left">Purchase Price</label>-->
<!--            {!! Form::text("purchase_price", $product->purchase_price, ["class"=> "input", "placeholder"=>"Purchase price"]) !!}-->
<!--        </div>-->
<!--        @endif-->
        
<!--        <div class="field column is-12">-->
<!--            {!! Form::textarea("product_detail", $product->product_detail, ["class"=> "textarea summernote", "placeholder"=>"Detail"]) !!}-->
<!--        </div>-->
        
<!--        <div class="field column is-12">-->
<!--            {!! Form::textarea("note", $product->note, ["class"=> "textarea summernote", "placeholder"=>"Note (private to admins)"]) !!}-->
<!--        </div>-->
        
<!--        <div class="field column is-6 has-text-left padding-left-30">-->
<!--            <label class="checkbox has-text-left black-text">-->
<!--                <input type="checkbox" name="is_published" value="1" {{ $product->is_published == 1 ? "checked" : "" }}>-->
<!--                Publish-->
<!--            </label>-->
<!--        </div>-->
        
<!--        <div class="field column is-6 ">-->
<!--            {!! Form::text("stock_quantity", $product->stock_quantity, ["class"=> "input", "placeholder"=>"Stock Quantity"]) !!}-->
<!--        </div>-->
        
<!--        <div class="field column is-12 has-text-centered">-->
<!--            {!! Form::submit("SAVE", ["class"=>"button is-large is-fullwidth yellow-bg yellow-border black-text font-weight-700 has-text-uppercase"]) !!}-->
<!--        </div>-->
        
<!--    </div>-->
<!--    {!! Form::close() !!}-->
    
<!--    @if( in_array( auth()->user()->role, [1,2,3] ) )-->
    
<!--    {!! Form::open([ "url" => action("Products@destroy", $product->id), "method"=>"DELETE", "enctype"=>"multipart/form-data", "class"=>"columns is-multiline product-edit-form white-bg" ]) !!}-->
    
<!--    {!! Form::hidden("product_id", $product->id) !!}-->
    
<!--    {!! Form::submit("Delete this product", ["class"=>"button is-danger is-small"]) !!}-->
    
<!--    {!! Form::close() !!}-->
    
<!--    @endif-->
    
<!--    '>-->
<!--  <i class="fas fa-dot-circle fa-2x @if($product->is_published == 0)yellow-text @else green-text @endif" -->
<!--     data-toggle="tooltip" -->
<!--     data-placement="bottom" -->
<!--     data-trigger="hover" -->
<!--     data-container="body" -->
<!--     data-title="@if($product->is_published == 0) Unpublished : Visitors cannot see this post. @else Published. Visitors can see this post. @endif"></i>-->
<!--</a>-->
@endif
@endif
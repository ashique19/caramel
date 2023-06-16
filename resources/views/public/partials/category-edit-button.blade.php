@if( auth()->user() )

@if( in_array( auth()->user()->role, [1,2,3] ) )

<aside class="column is-12-desktop is-12-mobile height-50 has-text-right padding-top-20">

@if( auth()->user()->role == 1 )    
    
    <button class="button is-small is-outlined is-white" 
            data-toggle="popover" 
            data-placement="left" 
            data-html="true" 
            data-content='
            
            {!! Form::open(["url"=> action("Categories@update", $category->id), "method"=> "PATCH"]) !!}
            
            <div class="field">
                {!! Form::text("name", $category->name, ["class"=> "input"]) !!}
            </div>
            
            <div class="field">
                {!! Form::textarea("summary", $category->summary, ["class"=> "textarea"]) !!}
            </div>
            
            <div class="field">
                {!! Form::text("display_order", $category->display_order, ["class"=> "input"]) !!}
            </div>
            
            <div class="field">
                {!! Form::submit("Update", ["class"=>"button yellow-bg yellow-border black-text font-weight-700 has-text-uppercase"]) !!}
            </div>
            
            {!! Form::close() !!}
            '>
        <i class="fa fa-edit"></i>
    </button>

@endif


    <button class="button is-small is-outlined is-warning"
            role="button" 
            data-toggle="modal" 
            data-target="#add-product-form" >
        <i class="fa fa-plus"></i>
    </button>
    
    <div class="modal" id="add-product-form">
        <div class="modal-background"></div>
        <div class="modal-content padding-top-50 padding-bottom-50">
            <section class="well">
                    {!! Form::open(["url"=> action("Products@store"), "enctype"=>"multipart/form-data", "class"=> "columns is-multiline"]) !!}
                        
                        {!! Form::hidden("category_id", $category->id) !!}
                        
                        <div class="column is-5">
                            
                            <div class="field padding-left-0">
                                <div class="image-upload">
                                    <label class="label is-pulled-left">Thumbnail:</label>
                                    {!! Form::file("thumb_images", ["class"=> "file image-file", "placeholder"=> "Thumbnail"]) !!}
                                    <i class="fas fa-plus hover yellow-text"></i>
                                    <p class="preview"></p>
                                </div>
                            </div>
                            
                            <div class="field padding-left-0">
                                <div class="image-upload">
                                    <label class="label is-pulled-left">All Images:</label>
                                    {!! Form::file("all_image[]", ["class"=> "file image-file", "multiple"=> "multiple"]) !!}
                                    <i class="fas fa-plus hover yellow-text"></i>
                                    <p class="preview"></p>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="column is-7 columns is-multiline">
                        
                            <div class="field column is-4-desktop is-12-mobile">
                                <label class="label is-pulled-left">Name</label>
                                {!! Form::text("name", $category->name, ["class"=> "input", "placeholder"=> "Name"]) !!}
                            </div>
                            
                            <div class="field column is-4-desktop is-12-mobile">
                                <label class="label is-pulled-left">Price</label>
                                {!! Form::text("price", null, ["class"=> "input", "placeholder"=>"price"]) !!}
                            </div>
                            
                            <div class="field column is-4-desktop is-12-mobile ">
                                <label class="label is-pulled-left">Order</label>
                                {!! Form::text("display_order", null, ["class"=> "input", "placeholder"=>"Display order"]) !!}
                            </div>
                            
                            <div class="field column is-12">
                                {!! Form::textarea("product_detail", null, ["class"=> "textarea summernote", "placeholder"=>"Detail"]) !!}
                            </div>
                            
                            <div class="field column is-12">
                                {!! Form::textarea("note", null, ["class"=> "textarea summernote", "placeholder"=>"Note (private to admins)"]) !!}
                            </div>
                            
                            <div class="field column is-6 has-text-left padding-left-30">
                                <label class="checkbox has-text-left black-text">
                                    <input type="checkbox" name="is_published" value="1">
                                    Publish
                                </label>
                            </div>
                            
                            <div class="field column is-6 ">
                                {!! Form::text("stock_quantity", null, ["class"=> "input", "placeholder"=>"Stock Quantity"]) !!}
                            </div>
                            
                            <div class="field column is-12 has-text-centered">
                                {!! Form::submit("Save", ["class"=>"button is-large is-fullwidth yellow-bg yellow-border black-text font-weight-700 has-text-uppercase"]) !!}
                            </div>
                            
                        </div>
                        
                        {!! Form::close() !!}
                </section>
        </div>
        <button class="modal-close is-large margin-top-50" aria-label="close" data-dismiss="modal"></button>
    </div>
    
</aside>

@endif


@endif
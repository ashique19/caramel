@if( auth()->user() )
@if( auth()->user()->role == 1 )

<button 
        class="button black-text black-border is-small yellow-bg" data-toggle="popover" data-html="true" data-placement="bottom" data-content='
            {!! Form::open(["url" => action("Categories@store") ]) !!}
            
            <h3 class="panel-heading is-3 black-text margin-bottom-5 yellow-bg has-text-centered font-weight-700">ADD NEW</h3>
            
            <div class="control padding-bottom-5">
                <input name="name" class="input yellow-border" type="text" placeholder="Name">
            </div>
            
            <div class="control padding-bottom-5">
                <input name="name_slug" class="input yellow-border" type="text" placeholder="Slug">
            </div>
            
            <div class="control padding-bottom-5">
                <textarea name="summary" class="input yellow-border" type="textarea" placeholder="Summary"></textarea>
            </div>
            
            <div class="control padding-bottom-5">
                <input name="display_order" class="input yellow-border" type="text" placeholder="Display Order">
            </div>
            
            <div class="control padding-bottom-5">
                <button class="button is-fullwidth yellow-bg black-text font-weight-700 has-text-uppercase">SAVE</button>
            </div>
            
            {!! Form::close() !!}
        '>
        <i class="fas fa-plus"></i>
    </button>
    
@endif
@endif
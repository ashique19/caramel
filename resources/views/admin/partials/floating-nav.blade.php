<p class="buttons floating-nav">
    <a href="{{ action('AdminOrders@create') }}" class="button is-large" data-toggle="tooltip" data-container="body" data-placement="left" title="Create Order" >
        <span class="icon is-small">
            <i class="fas fa-plus"></i>
        </span>
    </a>
    <a href="{{ action('AdminOrders@index') }}" class="button is-large" data-toggle="tooltip" data-container="body" data-placement="left" title="View Orders" >
        <span class="icon is-small">
            <i class="fas fa-folder"></i>
        </span>
    </a>
    <button open-admin-search class="button is-large" data-toggle="tooltip" data-container="body" data-placement="left" title="Search" >
        <span class="icon is-small"  >
            <i class="fas fa-search"></i>
        </span>
    </button>
    <a href="{{ route('dashboard') }}" class="button is-large" data-toggle="tooltip" data-container="body" data-placement="left" title="Dashboard" >
        <span class="icon is-small">
            <i class="fas fa-tachometer-alt"></i>
        </span>
    </a>
</p>


<div class="modal" id="admin-search">
    <div class="modal-background"></div>
    <div class="modal-content">
        
            
        {!! Form::open([ 'url'=> action('AdminOrders@search'), 'class'=> 'columns is-multiline padding-20']) !!}
        
        <div class="field has-addons column is-6-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Name
                </a>
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="Name" name="name">
            </div>
        </div>
        
        <div class="field has-addons column is-6-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                phone
                </a>
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="Phone" name="contact">
            </div>
        </div>
        
        <div class="field has-addons column is-12-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Order
                </a>
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="From" name="order_from" >
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="To" name="order_to" >
            </div>
        </div>
        
        <div class="field has-addons column is-12-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Dispatch
                </a>
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="From" name="dispatch_from" >
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="To" name="dispatch_to" >
            </div>
        </div>
        
        <div class="field has-addons column is-12-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Delivery
                </a>
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="From" name="delivery_from" >
            </div>
            <div class="control is-expanded">
                <input class="input" type="text" placeholder="To" name="delivery_to" >
            </div>
        </div>
        
        <div class="field has-addons column is-6-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Status
                </a>
            </div>
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    <select name="status">
                        <option value="">-All-</option>
                        <option value="New">New</option>
                        <option value="Dispatch">Dispatch</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Paid">Paid</option>
                        <option value="Return">Return</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="field has-addons column is-6-desktop is-12-mobile padding-left-0">
            <div class="control">
                <a class="button is-info">
                Courier
                </a>
            </div>
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    {!! Form::select('courier_id', \App\Courier::pluck('name', 'id'), null, ['placeholder'=> '-All-'] ) !!}
                </div>
            </div>
        </div>
        
        <div class="field column is-12 padding-left-0">
            <div class="control has-text-centered">
                {!! Form::submit('Search', ['class'=> 'button yellow-bg font-weight-700']) !!}
            </div>
        </div>
        
        {!! Form::close() !!}
                
            
    
    </div>
    <button class="modal-close is-large" aria-label="close" close-admin-search ></button>
</div>

@extends('admin.layout')

@section('title')Courier - {{ settings()->application_name }} @stop

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20" >


    <div class="column is-12">
        <h1 class="title is-1">Couriers @if( $couriers ) : {{ $couriers->total() }} @endif</h1>
    </div>
    
    <div class="column is-12">
        {!! errors($errors) !!}
    </div>
    
    <div class="column is-12 columns is-multiline">
        {!! Form::open([ 'url'=> action('Couriers@store'),'class'=> 'column is-12 columns is-multiline']) !!}
        
        <div class="field column is-12-mobile is-3-desktop">
            <div class="control">
                <input class="input is-warning" type="text" placeholder="Name" name="name">
            </div>
        </div>
        
        <div class="field column is-12-mobile is-3-desktop">
            <div class="control">
                <input class="input is-warning" type="text" placeholder="Charge" name="charge">
            </div>
        </div>
        
        <div class="field column is-12-mobile is-3-desktop">
            <div class="control">
                <input class="input is-warning" type="text" placeholder="COD Percentage" name="cod_percentage">
            </div>
        </div>
        
        <div class="field column is-12-mobile is-3-desktop">
            <div class="control has-text-centered">
                {!! Form::submit('Save', ['class'=> 'button yellow-bg font-weight-700']) !!}
            </div>
        </div>
        
        {!! Form::close() !!}
    </div>
    
    <div class="column is-12 scrollable">
        <table class="table is-bordered is-striped">
            <thead>
                <tr>
    				<th>Id</th>
    				<th>Name</th>
    				<th>Charge</th>
    				<th>COD percentage</th>
    				<th>Last Modified</th>
    				<th>Modify</th>
                    <th width="50" class="has-text-centered"><i class="far fa-trash-alt"></i></th>
                </tr>
            </thead>
            <tbody>
                @if($couriers)
                    @foreach($couriers as $courier)
                        <tr>
    						<td>{{$courier->id}}</td>
    						<td>{{$courier->name}}</td>
    						<td>{{$courier->charge}}</td>
    						<td>{{$courier->cod_percentage}}</td>
    						<td>{{$courier->updated_at ? $courier->updated_at->format('Y-M-d') : ""}}</td>
    						<td>
    						    <button
    						        class="button is-small yellow-bg white-text"
    						        data-toggle="popover"
    						        data-html="true"
    						        data-placement="bottom"
    						        data-content='
    						        <div class="box">
    						            {!! Form::open(["url"=> action("Couriers@update", $courier->id), "method"=>"PATCH","class"=>"form"]) !!}
    						                <h4 class="subtitle is-4 has-text-centered has-text-uppercase">EDIT {{ $courier->name }}</h4>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="name" class="input is-warning" type="text" placeholder="name" value="{{ $courier->name }}">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="charge" class="input is-warning" type="text" placeholder="name" value="{{ $courier->charge }}">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    <input name="cod_percentage" class="input is-warning" type="text" placeholder="name" value="{{ $courier->cod_percentage }}">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="control">
                                                    {!! Form::submit("Save", ["class"=>"button is-fullwidth yellow-bg"]) !!}
                                                </div>
                                            </div>
    						            {!! Form::close() !!}
    						        </div>
    						        '
    						    >
    						        <i class="fas fa-cogs"></i>
    						    </button>
    						</td>
                            <td>
                                <a  tabindex="0" 
                                    class="button is-small yellow-bg" 
                                    role="button" 
                                    data-toggle="popover" 
                                    data-trigger="focus" 
                                    data-placement="left"
                                    data-html="true"
                                    data-content='
                                    <div class="box">
                                    <h4 class="subtitle is-4">DELETE. Are you sure?</h4>
                                    {!! deletes("Couriers", $courier["id"], "YES", ["class"=>"button is-fullwidth red-text"]) !!}
                                    <button class="button is-fullwidth green-text">NO</button>
                                    </div>
                                    '>
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {!! $couriers->render() !!}
    </div>
    
</div>


@stop
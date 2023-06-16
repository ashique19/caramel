@extends('admin.layout')

@section('title')Cost - {{ settings()->application_name }} @stop

@section('main')

<aside class="column is-12-desktop is-12-mobile has-text-right">
    <button class="button is-default" role="button" data-toggle="collapse" href="#add-cost" aria-expanded="false" aria-controls="add-cost">Add Cost</button>
    <button class="button is-default" role="button" data-toggle="collapse" href="#search-cost" aria-expanded="false" aria-controls="search-cost">Search Cost</button>
</aside>

{!! errors( $errors ) !!}

<aside class="column is-12-desktop is-12-mobile collapse" id="add-cost">
    
    <section class="column is-12">
        <h1 class="title is-1 has-text-centered">Add Cost</h1>
    </section>
    
    {!! Form::open([ 'url' => action('Costs@store'), 'class'=>'column is-12 columns is-multiline', 'enctype'=>'multipart/form-data' ]) !!}
        
    <div class="field column is-3">
        <label class="label has-text-left padding-left-0">Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="Name" name="name">
        </div>
    </div>
        
    <div class="field column is-3">
        <label class="label has-text-left padding-left-0">Type</label>
        <div class="control">
            <div class="select is-fullwidth">
                {!! Form::select('cost_type_id', \App\Cost_type::pluck('name', 'id'), null) !!}
            </div>
        </div>
    </div>
    
    <div class="field column is-3">
        <label class="label has-text-left padding-left-0">Amount</label>
        <div class="control">
            <input class="input" type="text" placeholder="Amount" name="amount">
        </div>
    </div>
    
    <div class="field column is-3">
        <label class="label has-text-left padding-left-0">Date</label>
        <div class="control">
            <input class="input" type="text" placeholder="Date" name="date" value="{{ date('Y-m-d H:i:s') }}">
        </div>
    </div>
    
    <div class="field column is-4">
        <label class="label has-text-left padding-left-0">Mass Upload (csv,xls,xlsx)</label>
        <label class="label has-text-left padding-left-0"><a href="/public/files/cost-mass-upload-sample.csv" class="tag is-info">(download sample)</a></label>
        <div class="control">
            <div class="file is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="database">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>
                </label>
            </div>
        </div>
    </div>
    
    <div class="field column is-8">
        <label class="label has-text-left padding-left-0">Note</label>
        <div class="control">
            <textarea class="textarea" placeholder="Note" name="note"></textarea>
        </div>
    </div>
    
    <div class="field column is-12">
        <div class="control has-text-centered">
            {!! Form::submit('Save', ['class'=> 'button yellow-bg font-weight-700']) !!}
        </div>
    </div>
        
    {!! Form::close() !!}
    
</aside>


<aside class="column is-12-desktop is-12-mobile collapse" id="search-cost">
    
    <section class="column is-12">
        <h2 class="title is-1 has-text-centered">Search Cost</h2>
    </section>

    <section class="column is-12">
        
        
        {!! Form::open(['class'=>'form columns is-multiline', 'method' =>'post', 'url'=> action('Costs@searchIndex')]) !!} 
        
        <div class="field column is-3">
            <label class="label">ID</label>
            <div class="control">
                {!! Form::text('id', old('id') , ['class'=>'input']) !!}
            </div>
        </div>
    
        <div class="field column is-3">
            <label class="label">Name</label>
            <div class="control">
                {!! Form::text('name', old('name') , ['class'=>'input']) !!}
            </div>
        </div>
        
        <div class="field column is-3">
            <label class="label has-text-left padding-left-0">Type</label>
            <div class="control">
                <div class="select is-fullwidth">
                    {!! Form::select('cost_type_id', \App\Cost_type::pluck('name', 'id'), old('cost_type_id'), ['placeholder'=> '-All-']) !!}
                </div>
            </div>
        </div>
    
        <div class="field column is-3">
            <label class="label">Amount</label>
            <div class="control">
                {!! Form::text('amount', old('amount') , ['class'=>'input']) !!}
            </div>
        </div>
    
        <div class="field column is-3">
            <label class="label">Note</label>
            <div class="control">
                {!! Form::text('note', old('note') , ['class'=>'input']) !!}
            </div>
        </div>
    
        <div class="field column is-3">
            <label class="label">From</label>
            <div class="control">
                {!! Form::text('from', old('from') , ['class'=>'input datepicker']) !!}
            </div>
        </div>
    
        <div class="field column is-3">
            <label class="label">To</label>
            <div class="control">
                {!! Form::text('to', old('to') , ['class'=>'input datepicker']) !!}
            </div>
        </div>
    
        <div class="field column is-3">
            <label class="label">To</label>
            <div class="control">
                {!! Form::text('to', old('to') , ['class'=>'input datepicker']) !!}
            </div>
        </div>
            
        <div class="field column is-12">
            <div class="control has-text-centered">
                {!! Form::submit('Search', ['class'=> 'button yellow-bg font-weight-700']) !!}
            </div>
        </div>
            
        {!! Form::close() !!}
        
        <hr>
    </section>
    
</aside>


<main class="column is-12-desktop is-12-mobile padding-0 columns is-multiline">


<section class="column is-12-desktop is-12-mobile">
    <h2 class="title is-1 has-text-centered">Cost List</h2>
</section>

<section class="column is-12-desktop is-12-mobile scrollable">
    
    <table class="table is-bordered is-striped is-narrow font-size-12">
        <thead>
            <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Cost type</th>
				<th>Amount</th>
				<th>Note</th>
				<th>Incurred date</th>
                <th width="50">More</th>
                <th width="50"></th>
            </tr>
        </thead>
        <tbody>
            @if($costs)
                @foreach($costs as $cost)
                    <tr>
						<td>{{$cost->id}}</td>
						<td>{{$cost->name}}</td>
						<td>@if( $cost->cost_type) {{$cost->cost_type->name}} @endif</td>
						<td>{{$cost->amount}}</td>
						<td>{{$cost->note}}</td>
						<td>{{$cost->incurred_date->format('Y-M-d')}}</td>
                        <td>
                            <button type="button" 
                                    class="button yellow-bg is-small" 
                                    data-toggle="popover" 
                                    data-placement="left"
                                    data-html="true"
                                    data-content='
                                        {!! Form::open([ "url"=> action("Costs@update", $cost->id), "method"=> "PATCH", "class"=>"box columns is-multiline" ]) !!}
                                        
                                        <div class="field column is-12 padding-0">
                                            <label class="label has-text-left padding-left-0">Name</label>
                                            <div class="control">
                                                <input class="input" type="text" placeholder="Name" name="name" value="{{ $cost->name }}" >
                                            </div>
                                        </div>
                                            
                                        <div class="field column is-12 padding-0">
                                            <label class="label has-text-left padding-left-0">Type</label>
                                            <div class="control">
                                                <div class="select is-fullwidth">
                                                    {!! Form::select('cost_type_id', \App\Cost_type::pluck('name', 'id'), $cost->cost_type_id) !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="field column is-12 padding-0">
                                            <label class="label has-text-left padding-left-0">Amount</label>
                                            <div class="control">
                                                <input class="input" type="text" placeholder="Amount" name="amount" value="{{ $cost->amount }}">
                                            </div>
                                        </div>
                                        
                                        <div class="field column is-12 padding-0">
                                            <label class="label has-text-left padding-left-0">Date</label>
                                            <div class="control">
                                                <input class="input datepicker" type="text" placeholder="Date" name="incurred_date" value="{{ $cost->incurred_date->format('Y-m-d H:i:s') }}">
                                            </div>
                                        </div>
                                        
                                        <div class="field column is-12 padding-0">
                                            <label class="label has-text-left padding-left-0">Note</label>
                                            <div class="control">
                                                <textarea class="textarea" placeholder="Note" name="note" >{{ $cost->note }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="field column is-12 padding-0">
                                            <div class="control has-text-centered">
                                                {!! Form::submit('Save', ['class'=> 'button yellow-bg font-weight-700']) !!}
                                            </div>
                                        </div>
                                        
                                        {!! Form::close() !!}
                                    '>
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <a  tabindex="0" 
                                class="button is-danger is-small" 
                                role="button" 
                                data-toggle="popover" 
                                data-trigger="focus" 
                                data-html="true"
                                data-placement="left"
                                title="Delete" 
                                data-content='
                                <div class="box">
                                <h4>Are you sure?</h4>
                                {!! deletes("Costs", $cost['id'], 'YES', ['class'=>'button is-danger is-fullwidth']) !!}
                                <button class="button is-success is-fullwidth">NO</button>
                                </div>
                                '>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $costs->render() !!}
</section>


</main>

@stop
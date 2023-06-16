@extends('admin.layout')

@section('main')

<div class="column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20 has-text-uppercase" >
    
    <div class="column is-12 padding-left-0">
        <h1 class="title is-3">
            Statement of Financial Performance
            <button class="button is-small is-dark is-pulled-right" data-toggle="collapse" data-target="#admin-search" >
                <i class="far fa-chart-bar margin-right-5"></i>
                Generate
            </button>
        </h1>
    </div>
    
    <div class="column is-12 padding-left-0">
    {!! errors($errors) !!}
    </div>
    
    
    <div class="column is-12 collapse" id="admin-search">
        
        {!! Form::open([ 'url'=> action('Reports@postIncomeStatement'), 'class'=> 'columns is-multiline']) !!}
        
        <div class="field column is-3-desktop is-6-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">From</label>
            <div class="control">
                <input class="input" type="text" placeholder="From (e.g. 2018-01-20)" name="from">
            </div>
        </div>
        
        <div class="field column is-3-desktop is-6-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">To</label>
            <div class="control">
                <input class="input" type="text" placeholder="To (e.g. 2018-01-20)" name="to">
            </div>
        </div>
        
        <div class="field column is-3-desktop is-12-mobile padding-left-0">
            <label class="label has-text-left padding-left-0">  </label>
            <div class="control has-text-centered">
                {!! Form::submit('Generate', ['class'=> 'button yellow-bg font-weight-700 margin-top-15']) !!}
            </div>
        </div>
        
        {!! Form::close() !!}
        
    </div>
    
    @if( isset($revenue) )
    
    <div class="column is-12 scrollable padding-bottom-100">
        
        <table class="table is-striped is-bordered">
            <thead>
                <tr>
                    <th>( {{ substr( $from, 0, -8 ) }} - {{ substr( $to, 0, -8 ) }} )</th>
                    <th width="100">BDT</th>
                    <th width="100">BDT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Revenue</td>
                    <td></td>
                    <td>{{ $revenue }}</td>
                </tr>
                <tr>
                    <td><span class="padding-left-20">Cost of sale</span></td>
                    <td></td>
                    <td>({{ $cost_of_sales }})</td>
                </tr>
                <tr>
                    <td>Gross Profit</td>
                    <td></td>
                    <td>{{ $revenue - $cost_of_sales }}</td>
                </tr>
                <tr>
                    <td>Other Costs</td>
                    <td></td>
                    <td></td>
                </tr>
                @if( count( $costs > 0 ) )
                @foreach( $costs as $cost )
                <tr>
                    <td>
                        <span class="padding-left-20">
                            {{ $cost['name'] }}
                            <small>( {{ round( ( $cost['value'] / $revenue ) * 100, 2 ) }}% )</small>
                        </span>
                    </td>
                    <td>{{ $cost['value'] }}</td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>({{ array_sum( array_map(function($c){ return $c['value'];  },$costs) ) }})</td>
                </tr>
                @endif
                <tr>
                    <td>Profit for the period</td>
                    <td></td>
                    <td>{{ $revenue - $cost_of_sales - array_sum( array_map(function($c){ return $c['value'];  },$costs) ) }}</td>
                </tr>
            </tbody>
        </table>
        
        
    </div>
    
    @endif
    
</div>

@stop
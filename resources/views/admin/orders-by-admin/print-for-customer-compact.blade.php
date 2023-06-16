<html>
    <head>
        <title>Print Customer Invoice</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all" />
        <style media="all">
            table{
                width: 100% !important;
                font-size: 11px;
            }
            
            .table{
                margin-bottom: 10px;
            }
            
            td{
                vertical-align: middle !important;
                border: 1px solid #ddd !important;
            }
            
            .table-container{
                height: 525px !important;
                width: 50% !important;
                overflow: hidden;
            }
            
            .width-150{
                width: 150px !important;
            }
            
            body{
                display: flex;
                flex-wrap: wrap;
                width: 794px;
                margin: 0 auto;
            }
            
            h2{
                font-size: 16px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1;
                line-height: 1.3;
            }
            
            .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th{
                padding: 3px;
            }
            
            .font-size-11{
                font-size: 11px;
            }
            
            .col-xs-4{
                height: 227px;
                display: block;
                overflow: hidden;
            }
            
            address {
                font-style: normal;
                margin-bottom: 0px;
                height: 44px;
                display: block;
                overflow: hidden;
            }
                
        </style>
    </head>
    <body>
        
        @if( count( $orders ) > 0 )
        @foreach( $orders as $order )
        
        <div class="col-xs-4">
            <h2 class="text-center">
                {{ settings()->application_name }}
                <p class="small">Call: {{ settings()->helpline }} &nbsp; &nbsp; &nbsp; {{ $order->created_at->format('M-d') }}</p>
            </h2>
            <table class="table table-condensed table-bordered">
                <tbody>
                    <tr>
                        <td><b>Receiver:</b> {{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Phone:</b> {{ substr(str_replace('+88', '', $order->phone), 0, 5).'-'.substr(str_replace('+88', '', $order->phone), 5, 3).'-'.substr(str_replace('+88', '', $order->phone), 8) }}</td>
                    </tr>
                    <tr>
                        <td>
                            <address>
                                <b>Address:</b> {{ $order->address }}, {{ $order->area }}, {{ $order->city }}
                            </address>
                        </td>
                    </tr>
                </tbody>
            </table>
            @if( count( $order->products ) > 0 )
            <table class="table table-condensed table-bordered font-size-11">
                <tbody>
                    <!--<tr>-->
                    <!--    <td>-->
                    <!--        @if( count( $order->products ) > 0 )-->
                    <!--        @foreach( $order->products()->groupBy('name')->pluck('name') as $name )-->
                                
                    <!--            <b>{{ $name }}</b>({{ implode(' + ', $order->products()->where('name','like',$name)->pluck('value')->toArray()) }}) -->
                                
                    <!--        @endforeach-->
                    <!--        @endif-->
                    <!--    </td>-->
                    <!--    <td width="50">{{ $order->products()->sum('value') }}</td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--    <td>Charge</td>-->
                    <!--    <td>{{ $order->charge }}</td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--    <td>Discount/Prepaid</td>-->
                    <!--    <td>{{ $order->discount }}</td>-->
                    <!--</tr>-->
                    <tr>
                        <td><b>TOTAL DUE</b></td>
                        <td><b>{{ $order->due_amount }} Tk</b></td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
        
        @endforeach
        @endif
        
        
    </body>
</html>

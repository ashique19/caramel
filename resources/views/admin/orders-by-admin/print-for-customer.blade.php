<html>
    <head>
        <title>Print Customer Invoice</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all" />
        <style media="all">
            table{
                width: 100% !important;
                font-size: 12px;
            }
            
            .table{
                margin-bottom: 10px;
            }
            
            td{
                vertical-align: middle !important;
                border: 1px solid #ddd !important;
            }
            
            h2{
                font-size: 24px;
            }
            
            h3{
                font-size: 16px;
            }
            
            .table-container{
                height: 525px !important;
                width: 50% !important;
                overflow: hidden;
            }
            
            .width-150{
                width: 150px !important;
            }
                
        </style>
    </head>
    <body>
        
        @if( count( $orders ) > 0 )
        @foreach( $orders as $order )
        <div class="col-xs-6 table-container">
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <td>
                            <h2>{{ settings()->application_name }}</h2>
                            <p class="small">Contact: {{ settings()->helpline }}</p>
                        </td>
                        <td>
                            <h3 class="text-right">Invoice</h3>
                            <p class="small text-right">{{ date('F-d') }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <td>Receiver:</td>
                        <td>{{ $order->name }}</td>
                        <td rowspan="2" class="width-150">
                            Delivery Date: {{ $order->expected_delivery_date->format('F-d') }}
                        </td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td colspan="3">{{ $order->address }}, {{ $order->area }}, {{ $order->city }}</td>
                    </tr>
    
                </tbody>
            </table>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Price (BDT)</td>
                    </tr>
                </thead>
                <tbody>
                    @if( $order->products()->count() > 0 )
                    @foreach( $order->products as $product )
                    <tr>
                        <td>{{ $product->name }} - {{ $product->price }} x {{ $product->quantity }} piece(s)</td>
                        <td>{{ $product->value }}</td>
                    </tr>
                    @endforeach
                    @endif
                    
                    @if( $order->charge > 0 )
                    <tr>
                        <td>Charge</td>
                        <td>{{ $order->charge }}</td>
                    </tr>
                    @endif
                    
                    @if( $order->discount > 0 )
                    <tr>
                        <td>Discount</td>
                        <td>{{ $order->discount }}</td>
                    </tr>
                    @endif
                    
                    <tr>
                        <td>Due:{{ $order->payment_gateway == 'courier' ? 'CASH ON DELIVERY' : $order->payment_gateway }}</td>
                        <td>{{ $order->due_amount }}</td>
                    </tr>
                    
                </tbody>
            </table>
            <p class="text-center">
                Please call before delivery
            </p>
        </div>
        @endforeach
        @endif
        
    </body>
</html>

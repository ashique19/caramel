<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all" >
        <style>
            .well{
                padding: 5px;
            }
            p {
                margin: 0 0 5.2px;
                font-size: 11px;
            }
        </style>
    </head>
    <body>
        <section class="col-xs-12">
            @if( \App\Product::count() > 0 )
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            <p>CODE</p>
                            <p>PRICE</p>
                        </th>
                        @for( $i = 1; $i < 21; $i++ )
                        <th>{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach( \App\Product::where('stock_quantity','>',0)->select('id','category_id','price','stock_quantity')->get() as $product )
                    <tr>
                        <td style="width: 70px;">
                            <p><b>{{ substr( $product->category->name, 0, 3 ) }} {{ $product->id }}</b></p>
                            <p>P:{{ $product->price }}</p>
                        </td>
                        @for( $i = 1; $i < 21; $i++ )
                        <td style="min-width: 50px;"><b style="opacity: 0.2;">{{ $product->id }}</b></td>
                        @endfor
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            
        </section>
    </body>
</html>
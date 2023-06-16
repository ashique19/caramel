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
            }
        </style>
    </head>
    <body>
        <section class="row">
            @if( \App\Product::count() > 0 )
            @foreach( \App\Product::where('stock_quantity','>',0)->select('id','category_id','price','stock_quantity')->get() as $product )
            <div class="col-sm-2 col-xs-3 thumb">
                <div class="well text-center">
                    <p><b>CODE: {{ substr( $product->category->name, 0, 3 ) }} {{ $product->id }}</b></p>
                    <p>Price: <s>{{ round( $product->price * 1.3 ) }}</s> {{ $product->price }} Tk</p>
                </div>
            </div>
            @endforeach
            @endif
        </section>
    </body>
</html>
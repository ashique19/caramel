{"filter":false,"title":"show.blade.php","tooltip":"/resources/views/admin/payments/show.blade.php","undoManager":{"mark":64,"position":64,"stack":[[{"start":{"row":6,"column":30},"end":{"row":6,"column":82},"action":"remove","lines":["s @if( $payments ) : {{ $payments->total() }} @endif"],"id":2,"ignore":true}],[{"start":{"row":20,"column":8},"end":{"row":88,"column":8},"action":"insert","lines":["","@if( $payment )","<section class=\"row panel-body\">","    <table class=\"table table-bordered table-striped table-actions\">","        <tdead>","            <tr>","                <td width=\"200\">Title</td>","                <td>Details</td>","            </tr>","        </tdead>","        <tbody>","                <tr>","                    <td>Id</td>","                    <td>{{ $payment->id }}</td>","                </tr>","                ","                <tr>","                    <td>Name</td>","                    <td>{{ $payment->name }}</td>","                </tr>","                ","                <tr>","                    <td>Due date</td>","                    <td>{{ $payment->due_date }}</td>","                </tr>","                ","                <tr>","                    <td>Payment date</td>","                    <td>{{ $payment->payment_date }}</td>","                </tr>","                ","                <tr>","                    <td>Is paid</td>","                    <td>{{ $payment->is_paid }}</td>","                </tr>","                ","                <tr>","                    <td>Payment details</td>","                    <td>{{ $payment->payment_details }}</td>","                </tr>","                ","                <tr>","                    <td>Attachment file</td>","                    <td><a href=\"{{ $payment->attachment_file }}\" class=\"btn btn-default btn-rounded btn-xs\"><span class=\"fa fa-download\"></span></a></td>","                </tr>","                ","                <tr>","                    <td>Created at</td>","                    <td>{{ $payment->created_at }}</td>","                </tr>","                ","                <tr>","                    <td>Updated at</td>","                    <td>{{ $payment->updated_at }}</td>","                </tr>","                ","            <tr>","                <td>","                    {!! edits('Payments', $payment->id, 'edit', ['class'=>'btn btn-warning btn-rounded']) !!}","                            ","                </td>","                <td>","                    {!! deletes('Payments', $payment->id, '<span class=\\'fa fa-times\\'></span>', ['class'=>'btn btn-danger btn-rounded']) !!}","                </td>","            </tr>","        </tbody>","    </table>","</section>","        "],"id":3,"ignore":true}],[{"start":{"row":88,"column":0},"end":{"row":89,"column":0},"action":"insert","lines":["@endif",""],"id":4,"ignore":true}],[{"start":{"row":63,"column":24},"end":{"row":65,"column":24},"action":"insert","lines":["","                        @if( strlen( $payment->attachment_file ) > 5 )","                        "],"id":5,"ignore":true},{"start":{"row":65,"column":149},"end":{"row":67,"column":20},"action":"insert","lines":["","                        @endif","                    "]}],[{"start":{"row":66,"column":0},"end":{"row":68,"column":0},"action":"insert","lines":["                        @else","                        None",""],"id":6,"ignore":true}],[{"start":{"row":6,"column":0},"end":{"row":8,"column":0},"action":"insert","lines":["<main class=\"column is-12-desktop is-12-mobile padding-top-10 padding-bottom-20\" >","",""],"id":7,"ignore":true},{"start":{"row":97,"column":8},"end":{"row":97,"column":15},"action":"insert","lines":["</main>"]}],[{"start":{"row":6,"column":79},"end":{"row":8,"column":0},"action":"remove","lines":["\" >","",""],"id":8,"ignore":true},{"start":{"row":6,"column":79},"end":{"row":10,"column":8},"action":"insert","lines":[" columns is-multiline\" >","    ","    <section class=\"column is-12\">","","        "]},{"start":{"row":10,"column":19},"end":{"row":10,"column":24},"action":"remove","lines":["page-"]},{"start":{"row":10,"column":24},"end":{"row":10,"column":29},"action":"insert","lines":[" is-2"]},{"start":{"row":12,"column":0},"end":{"row":14,"column":0},"action":"insert","lines":["    </section>","",""]}],[{"start":{"row":8,"column":32},"end":{"row":8,"column":42},"action":"insert","lines":[" padding-0"],"id":9,"ignore":true},{"start":{"row":21,"column":0},"end":{"row":21,"column":8},"action":"insert","lines":["        "]},{"start":{"row":21,"column":27},"end":{"row":23,"column":0},"action":"remove","lines":["-sm-10 col-sm-offset-1 col-xs-12\">","    ",""]},{"start":{"row":21,"column":27},"end":{"row":23,"column":8},"action":"insert","lines":["umn is-12 padding-0\">","            ","        "]},{"start":{"row":23,"column":72},"end":{"row":25,"column":0},"action":"remove","lines":["tn btn-default pull-right btn-lg blue-border blue-text\">Edit</a>","",""]},{"start":{"row":23,"column":72},"end":{"row":25,"column":8},"action":"insert","lines":["utton is-small is-info\">Edit</a>","        ","        "]}],[{"start":{"row":21,"column":46},"end":{"row":21,"column":61},"action":"insert","lines":[" has-text-right"],"id":10,"ignore":true}],[{"start":{"row":23,"column":71},"end":{"row":23,"column":94},"action":"remove","lines":["button is-small is-info"],"id":11,"ignore":true},{"start":{"row":23,"column":71},"end":{"row":23,"column":88},"action":"insert","lines":["is-link blue-text"]}],[{"start":{"row":21,"column":61},"end":{"row":21,"column":71},"action":"insert","lines":[" blue-text"],"id":12,"ignore":true},{"start":{"row":23,"column":78},"end":{"row":23,"column":88},"action":"remove","lines":[" blue-text"]}],[{"start":{"row":23,"column":84},"end":{"row":23,"column":92},"action":"insert","lines":[" payment"],"id":13,"ignore":true}],[{"start":{"row":28,"column":16},"end":{"row":28,"column":30},"action":"remove","lines":["row panel-body"],"id":14,"ignore":true},{"start":{"row":28,"column":16},"end":{"row":28,"column":28},"action":"insert","lines":["column is-12"]},{"start":{"row":29,"column":52},"end":{"row":29,"column":66},"action":"remove","lines":[" table-actions"]}],[{"start":{"row":28,"column":28},"end":{"row":28,"column":38},"action":"insert","lines":[" padding-0"],"id":15,"ignore":true},{"start":{"row":90,"column":76},"end":{"row":90,"column":82},"action":"remove","lines":["tn btn"]},{"start":{"row":90,"column":76},"end":{"row":90,"column":84},"action":"insert","lines":["utton is"]},{"start":{"row":90,"column":93},"end":{"row":90,"column":104},"action":"remove","lines":["btn-rounded"]},{"start":{"row":90,"column":93},"end":{"row":90,"column":101},"action":"insert","lines":["is-small"]},{"start":{"row":94,"column":109},"end":{"row":94,"column":134},"action":"remove","lines":["tn btn-danger btn-rounded"]},{"start":{"row":94,"column":109},"end":{"row":94,"column":133},"action":"insert","lines":["utton is-danger is-small"]}],[{"start":{"row":6,"column":103},"end":{"row":20,"column":14},"action":"insert","lines":["","","    ","    ","    <section class=\"column is-12 padding-0\">","    ","        <nav class=\"breadcrumb is-small\" aria-label=\"breadcrumbs\">","            <ul>","                <li><a href=\"{{ route('Dashboard') }}\">Dashboard</a></li>","                <li><a href=\"{{ $Payments@index }}\">{{ Payments }}</a></li>","                <li class=\"is-active\"><a href=\"#\" aria-current=\"page\">Payment</a></li>","            </ul>","        </nav>","    ","    </section>"],"id":16,"ignore":true}],[{"start":{"row":15,"column":52},"end":{"row":15,"column":55},"action":"remove","lines":["{{ "],"id":17,"ignore":true},{"start":{"row":15,"column":60},"end":{"row":15,"column":63},"action":"remove","lines":[" }}"]}],[{"start":{"row":15,"column":32},"end":{"row":15,"column":33},"action":"remove","lines":["$"],"id":18,"ignore":true},{"start":{"row":15,"column":32},"end":{"row":15,"column":40},"action":"insert","lines":["action('"]},{"start":{"row":15,"column":54},"end":{"row":15,"column":56},"action":"insert","lines":["')"]}],[{"start":{"row":14,"column":39},"end":{"row":14,"column":40},"action":"remove","lines":["D"],"id":19}],[{"start":{"row":14,"column":39},"end":{"row":14,"column":40},"action":"insert","lines":["d"],"id":20}],[{"start":{"row":12,"column":31},"end":{"row":12,"column":39},"action":"remove","lines":["is-small"],"id":21,"ignore":true},{"start":{"row":12,"column":31},"end":{"row":12,"column":71},"action":"insert","lines":["has-succeeds-separator is-small is-right"]}],[{"start":{"row":10,"column":44},"end":{"row":20,"column":4},"action":"remove","lines":["","    ","        <nav class=\"breadcrumb has-succeeds-separator is-small is-right\" aria-label=\"breadcrumbs\">","            <ul>","                <li><a href=\"{{ route('dashboard') }}\">Dashboard</a></li>","                <li><a href=\"{{ action('Payments@index') }}\">Payments</a></li>","                <li class=\"is-active\"><a href=\"#\" aria-current=\"page\">Payment</a></li>","            </ul>","        </nav>","    ","    "],"id":22,"ignore":true},{"start":{"row":10,"column":44},"end":{"row":10,"column":64},"action":"insert","lines":["{!! breadcrumb() !!}"]}],[{"start":{"row":10,"column":59},"end":{"row":10,"column":67},"action":"insert","lines":["Payments"],"id":23,"ignore":true}],[{"start":{"row":10,"column":59},"end":{"row":10,"column":60},"action":"insert","lines":["'"],"id":24,"ignore":true},{"start":{"row":10,"column":68},"end":{"row":10,"column":69},"action":"insert","lines":["'"]}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":5},"action":"insert","lines":["f"],"id":25}],[{"start":{"row":9,"column":5},"end":{"row":9,"column":6},"action":"insert","lines":["r"],"id":26}],[{"start":{"row":9,"column":6},"end":{"row":9,"column":7},"action":"insert","lines":["o"],"id":27}],[{"start":{"row":9,"column":7},"end":{"row":9,"column":8},"action":"insert","lines":["m"],"id":28}],[{"start":{"row":9,"column":8},"end":{"row":9,"column":9},"action":"insert","lines":[" "],"id":29}],[{"start":{"row":9,"column":9},"end":{"row":9,"column":10},"action":"insert","lines":["F"],"id":30}],[{"start":{"row":9,"column":10},"end":{"row":9,"column":11},"action":"insert","lines":["u"],"id":31}],[{"start":{"row":9,"column":11},"end":{"row":9,"column":12},"action":"insert","lines":["n"],"id":32}],[{"start":{"row":9,"column":12},"end":{"row":9,"column":13},"action":"insert","lines":["c"],"id":33}],[{"start":{"row":9,"column":13},"end":{"row":9,"column":14},"action":"insert","lines":["t"],"id":34}],[{"start":{"row":9,"column":14},"end":{"row":9,"column":15},"action":"insert","lines":["i"],"id":35}],[{"start":{"row":9,"column":15},"end":{"row":9,"column":16},"action":"insert","lines":["o"],"id":36}],[{"start":{"row":9,"column":16},"end":{"row":9,"column":17},"action":"insert","lines":["n"],"id":37}],[{"start":{"row":9,"column":17},"end":{"row":9,"column":18},"action":"insert","lines":["s"],"id":38}],[{"start":{"row":9,"column":18},"end":{"row":9,"column":21},"action":"insert","lines":["-->"],"id":40},{"start":{"row":9,"column":4},"end":{"row":9,"column":8},"action":"insert","lines":["<!--"]}],[{"start":{"row":9,"column":8},"end":{"row":9,"column":12},"action":"remove","lines":["from"],"id":41},{"start":{"row":9,"column":8},"end":{"row":9,"column":9},"action":"insert","lines":["G"]}],[{"start":{"row":9,"column":9},"end":{"row":9,"column":10},"action":"insert","lines":["g"],"id":42}],[{"start":{"row":9,"column":10},"end":{"row":9,"column":11},"action":"insert","lines":["e"],"id":43}],[{"start":{"row":9,"column":10},"end":{"row":9,"column":11},"action":"remove","lines":["e"],"id":44}],[{"start":{"row":9,"column":9},"end":{"row":9,"column":10},"action":"remove","lines":["g"],"id":45}],[{"start":{"row":9,"column":9},"end":{"row":9,"column":10},"action":"insert","lines":["e"],"id":46}],[{"start":{"row":9,"column":10},"end":{"row":9,"column":11},"action":"insert","lines":["n"],"id":47}],[{"start":{"row":9,"column":11},"end":{"row":9,"column":12},"action":"insert","lines":["e"],"id":48}],[{"start":{"row":9,"column":12},"end":{"row":9,"column":13},"action":"insert","lines":["r"],"id":49}],[{"start":{"row":9,"column":13},"end":{"row":9,"column":14},"action":"insert","lines":["a"],"id":50}],[{"start":{"row":9,"column":14},"end":{"row":9,"column":15},"action":"insert","lines":["t"],"id":51}],[{"start":{"row":9,"column":15},"end":{"row":9,"column":16},"action":"insert","lines":["e"],"id":52}],[{"start":{"row":9,"column":16},"end":{"row":9,"column":17},"action":"insert","lines":["d"],"id":53}],[{"start":{"row":9,"column":17},"end":{"row":9,"column":18},"action":"insert","lines":[" "],"id":54}],[{"start":{"row":9,"column":18},"end":{"row":9,"column":19},"action":"insert","lines":["b"],"id":55}],[{"start":{"row":9,"column":19},"end":{"row":9,"column":20},"action":"insert","lines":["y"],"id":56}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":33},"action":"remove","lines":["<!--Generated by Functions-->"],"id":57}],[{"start":{"row":9,"column":4},"end":{"row":9,"column":33},"action":"insert","lines":["<!--Generated by Functions-->"],"id":58,"ignore":true}],[{"start":{"row":19,"column":0},"end":{"row":19,"column":49},"action":"remove","lines":["<div class=\"col-sm-10 col-sm-offset-1 col-xs-12\">"],"id":59},{"start":{"row":19,"column":0},"end":{"row":19,"column":40},"action":"insert","lines":["<section class=\"column is-12 padding-0\">"]}],[{"start":{"row":23,"column":0},"end":{"row":23,"column":6},"action":"remove","lines":["</div>"],"id":60},{"start":{"row":23,"column":0},"end":{"row":23,"column":10},"action":"insert","lines":["</section>"]}],[{"start":{"row":19,"column":0},"end":{"row":19,"column":4},"action":"insert","lines":["    "],"id":61},{"start":{"row":20,"column":0},"end":{"row":20,"column":4},"action":"insert","lines":["    "]},{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"insert","lines":["    "]},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"insert","lines":["    "]},{"start":{"row":23,"column":0},"end":{"row":23,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":19,"column":44},"end":{"row":21,"column":8},"action":"remove","lines":["","        ","        "],"id":62},{"start":{"row":19,"column":44},"end":{"row":19,"column":45},"action":"insert","lines":[" "]}],[{"start":{"row":19,"column":44},"end":{"row":19,"column":45},"action":"remove","lines":[" "],"id":63}],[{"start":{"row":19,"column":67},"end":{"row":21,"column":4},"action":"remove","lines":["","        ","    "],"id":65}],[{"start":{"row":20,"column":0},"end":{"row":21,"column":0},"action":"remove","lines":["",""],"id":66,"ignore":true},{"start":{"row":20,"column":4},"end":{"row":21,"column":0},"action":"insert","lines":["",""]},{"start":{"row":22,"column":8},"end":{"row":23,"column":3},"action":"remove","lines":["    ","   "]},{"start":{"row":22,"column":8},"end":{"row":23,"column":0},"action":"insert","lines":["",""]},{"start":{"row":23,"column":8},"end":{"row":23,"column":9},"action":"remove","lines":[" "]},{"start":{"row":24,"column":4},"end":{"row":25,"column":4},"action":"remove","lines":["    ","    "]},{"start":{"row":24,"column":4},"end":{"row":25,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"insert","lines":["    "],"id":67,"ignore":true},{"start":{"row":28,"column":0},"end":{"row":28,"column":4},"action":"insert","lines":["    "]},{"start":{"row":29,"column":4},"end":{"row":29,"column":6},"action":"insert","lines":["  "]},{"start":{"row":29,"column":6},"end":{"row":29,"column":8},"action":"insert","lines":["  "]},{"start":{"row":30,"column":8},"end":{"row":30,"column":12},"action":"insert","lines":["    "]},{"start":{"row":31,"column":12},"end":{"row":31,"column":15},"action":"insert","lines":["   "]},{"start":{"row":31,"column":15},"end":{"row":31,"column":16},"action":"insert","lines":[" "]},{"start":{"row":32,"column":0},"end":{"row":32,"column":4},"action":"insert","lines":["    "]},{"start":{"row":33,"column":0},"end":{"row":33,"column":4},"action":"insert","lines":["    "]},{"start":{"row":34,"column":12},"end":{"row":34,"column":16},"action":"insert","lines":["    "]},{"start":{"row":35,"column":0},"end":{"row":35,"column":4},"action":"insert","lines":["    "]},{"start":{"row":36,"column":8},"end":{"row":36,"column":9},"action":"insert","lines":[" "]},{"start":{"row":36,"column":9},"end":{"row":36,"column":12},"action":"insert","lines":["   "]},{"start":{"row":37,"column":16},"end":{"row":37,"column":20},"action":"insert","lines":["    "]},{"start":{"row":38,"column":20},"end":{"row":38,"column":23},"action":"insert","lines":["   "]},{"start":{"row":38,"column":23},"end":{"row":38,"column":24},"action":"insert","lines":[" "]},{"start":{"row":39,"column":0},"end":{"row":39,"column":4},"action":"insert","lines":["    "]},{"start":{"row":40,"column":0},"end":{"row":40,"column":4},"action":"insert","lines":["    "]},{"start":{"row":41,"column":16},"end":{"row":42,"column":0},"action":"remove","lines":["",""]},{"start":{"row":41,"column":16},"end":{"row":42,"column":4},"action":"insert","lines":["    ","    "]},{"start":{"row":43,"column":20},"end":{"row":43,"column":21},"action":"insert","lines":[" "]},{"start":{"row":43,"column":21},"end":{"row":43,"column":24},"action":"insert","lines":["   "]},{"start":{"row":44,"column":0},"end":{"row":44,"column":4},"action":"insert","lines":["    "]},{"start":{"row":45,"column":16},"end":{"row":45,"column":18},"action":"insert","lines":["  "]},{"start":{"row":45,"column":18},"end":{"row":45,"column":20},"action":"insert","lines":["  "]},{"start":{"row":46,"column":16},"end":{"row":47,"column":0},"action":"remove","lines":["",""]},{"start":{"row":46,"column":16},"end":{"row":47,"column":4},"action":"insert","lines":["    ","    "]},{"start":{"row":48,"column":20},"end":{"row":48,"column":24},"action":"insert","lines":["    "]},{"start":{"row":49,"column":0},"end":{"row":49,"column":4},"action":"insert","lines":["    "]},{"start":{"row":50,"column":16},"end":{"row":50,"column":17},"action":"insert","lines":[" "]},{"start":{"row":50,"column":17},"end":{"row":50,"column":20},"action":"insert","lines":["   "]},{"start":{"row":51,"column":16},"end":{"row":52,"column":0},"action":"remove","lines":["",""]},{"start":{"row":51,"column":16},"end":{"row":52,"column":2},"action":"insert","lines":["    ","  "]},{"start":{"row":52,"column":18},"end":{"row":52,"column":20},"action":"insert","lines":["  "]},{"start":{"row":53,"column":0},"end":{"row":53,"column":4},"action":"insert","lines":["    "]},{"start":{"row":54,"column":20},"end":{"row":54,"column":23},"action":"insert","lines":["   "]},{"start":{"row":54,"column":23},"end":{"row":54,"column":24},"action":"insert","lines":[" "]},{"start":{"row":55,"column":16},"end":{"row":55,"column":20},"action":"insert","lines":["    "]},{"start":{"row":56,"column":16},"end":{"row":57,"column":0},"action":"remove","lines":["",""]},{"start":{"row":56,"column":16},"end":{"row":57,"column":1},"action":"insert","lines":["    "," "]},{"start":{"row":57,"column":17},"end":{"row":57,"column":20},"action":"insert","lines":["   "]},{"start":{"row":58,"column":0},"end":{"row":58,"column":4},"action":"insert","lines":["    "]},{"start":{"row":59,"column":20},"end":{"row":59,"column":22},"action":"insert","lines":["  "]},{"start":{"row":59,"column":22},"end":{"row":59,"column":24},"action":"insert","lines":["  "]},{"start":{"row":60,"column":16},"end":{"row":60,"column":20},"action":"insert","lines":["    "]},{"start":{"row":61,"column":16},"end":{"row":61,"column":19},"action":"insert","lines":["   "]},{"start":{"row":61,"column":19},"end":{"row":62,"column":0},"action":"remove","lines":["",""]},{"start":{"row":61,"column":19},"end":{"row":62,"column":4},"action":"insert","lines":[" ","    "]},{"start":{"row":63,"column":0},"end":{"row":63,"column":4},"action":"insert","lines":["    "]},{"start":{"row":64,"column":20},"end":{"row":64,"column":24},"action":"insert","lines":["    "]},{"start":{"row":65,"column":16},"end":{"row":65,"column":20},"action":"insert","lines":["    "]},{"start":{"row":66,"column":16},"end":{"row":66,"column":18},"action":"insert","lines":["  "]},{"start":{"row":66,"column":18},"end":{"row":67,"column":0},"action":"remove","lines":["",""]},{"start":{"row":66,"column":18},"end":{"row":67,"column":4},"action":"insert","lines":["  ","    "]},{"start":{"row":68,"column":20},"end":{"row":68,"column":23},"action":"insert","lines":["   "]},{"start":{"row":68,"column":23},"end":{"row":68,"column":24},"action":"insert","lines":[" "]},{"start":{"row":69,"column":20},"end":{"row":69,"column":24},"action":"insert","lines":["    "]},{"start":{"row":70,"column":0},"end":{"row":70,"column":4},"action":"insert","lines":["    "]},{"start":{"row":71,"column":0},"end":{"row":71,"column":4},"action":"insert","lines":["    "]},{"start":{"row":72,"column":24},"end":{"row":72,"column":28},"action":"insert","lines":["    "]},{"start":{"row":73,"column":24},"end":{"row":73,"column":25},"action":"insert","lines":[" "]},{"start":{"row":73,"column":25},"end":{"row":73,"column":28},"action":"insert","lines":["   "]},{"start":{"row":74,"column":0},"end":{"row":74,"column":4},"action":"insert","lines":["    "]},{"start":{"row":75,"column":20},"end":{"row":75,"column":23},"action":"insert","lines":["   "]},{"start":{"row":75,"column":23},"end":{"row":75,"column":24},"action":"insert","lines":[" "]},{"start":{"row":76,"column":0},"end":{"row":76,"column":4},"action":"insert","lines":["    "]},{"start":{"row":77,"column":16},"end":{"row":77,"column":20},"action":"insert","lines":["    "]},{"start":{"row":78,"column":16},"end":{"row":78,"column":20},"action":"insert","lines":["    "]},{"start":{"row":79,"column":0},"end":{"row":79,"column":4},"action":"insert","lines":["    "]},{"start":{"row":80,"column":0},"end":{"row":80,"column":4},"action":"insert","lines":["    "]},{"start":{"row":81,"column":16},"end":{"row":81,"column":20},"action":"insert","lines":["    "]},{"start":{"row":82,"column":16},"end":{"row":82,"column":18},"action":"insert","lines":["  "]},{"start":{"row":82,"column":18},"end":{"row":83,"column":0},"action":"remove","lines":["",""]},{"start":{"row":82,"column":18},"end":{"row":83,"column":4},"action":"insert","lines":["  ","    "]},{"start":{"row":84,"column":0},"end":{"row":84,"column":4},"action":"insert","lines":["    "]},{"start":{"row":85,"column":20},"end":{"row":85,"column":24},"action":"insert","lines":["    "]},{"start":{"row":86,"column":16},"end":{"row":86,"column":20},"action":"insert","lines":["    "]},{"start":{"row":87,"column":16},"end":{"row":87,"column":17},"action":"insert","lines":[" "]},{"start":{"row":87,"column":17},"end":{"row":88,"column":0},"action":"remove","lines":["",""]},{"start":{"row":87,"column":17},"end":{"row":88,"column":4},"action":"insert","lines":["   ","    "]},{"start":{"row":89,"column":16},"end":{"row":89,"column":20},"action":"insert","lines":["    "]},{"start":{"row":90,"column":0},"end":{"row":90,"column":4},"action":"insert","lines":["    "]},{"start":{"row":91,"column":28},"end":{"row":91,"column":31},"action":"insert","lines":["   "]},{"start":{"row":91,"column":31},"end":{"row":92,"column":0},"action":"remove","lines":["",""]},{"start":{"row":91,"column":31},"end":{"row":92,"column":4},"action":"insert","lines":[" ","    "]},{"start":{"row":93,"column":16},"end":{"row":93,"column":20},"action":"insert","lines":["    "]},{"start":{"row":94,"column":0},"end":{"row":94,"column":4},"action":"insert","lines":["    "]},{"start":{"row":95,"column":16},"end":{"row":95,"column":20},"action":"insert","lines":["    "]},{"start":{"row":96,"column":0},"end":{"row":96,"column":4},"action":"insert","lines":["    "]},{"start":{"row":97,"column":0},"end":{"row":97,"column":4},"action":"insert","lines":["    "]},{"start":{"row":98,"column":0},"end":{"row":98,"column":4},"action":"insert","lines":["    "]},{"start":{"row":99,"column":0},"end":{"row":99,"column":4},"action":"insert","lines":["    "]},{"start":{"row":100,"column":0},"end":{"row":100,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":32,"column":35},"end":{"row":32,"column":59},"action":"insert","lines":[" class=\"font-weight-700\""],"id":68,"ignore":true},{"start":{"row":33,"column":23},"end":{"row":33,"column":47},"action":"insert","lines":[" class=\"font-weight-700\""]}]]},"ace":{"folds":[],"scrolltop":361.5,"scrollleft":1.5,"selection":{"start":{"row":32,"column":35},"end":{"row":32,"column":35},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":119,"mode":"ace/mode/php"}},"timestamp":1528153183938,"hash":"38ed03986ca6aff2177abe983ce90ef7cbe17215"}
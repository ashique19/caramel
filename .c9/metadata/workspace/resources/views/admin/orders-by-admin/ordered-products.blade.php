{"filter":false,"title":"ordered-products.blade.php","tooltip":"/resources/views/admin/orders-by-admin/ordered-products.blade.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":151,"column":26},"end":{"row":151,"column":27},"action":"insert","lines":["i"],"id":246}],[{"start":{"row":151,"column":27},"end":{"row":151,"column":28},"action":"insert","lines":["t"],"id":247}],[{"start":{"row":151,"column":28},"end":{"row":151,"column":29},"action":"insert","lines":[" "],"id":248}],[{"start":{"row":151,"column":29},"end":{"row":151,"column":30},"action":"insert","lines":["P"],"id":249}],[{"start":{"row":151,"column":30},"end":{"row":151,"column":31},"action":"insert","lines":["r"],"id":250}],[{"start":{"row":151,"column":31},"end":{"row":151,"column":32},"action":"insert","lines":["o"],"id":251}],[{"start":{"row":151,"column":32},"end":{"row":151,"column":33},"action":"insert","lines":["d"],"id":252}],[{"start":{"row":151,"column":33},"end":{"row":151,"column":34},"action":"insert","lines":["u"],"id":253}],[{"start":{"row":151,"column":34},"end":{"row":151,"column":35},"action":"insert","lines":["c"],"id":254}],[{"start":{"row":151,"column":35},"end":{"row":151,"column":36},"action":"insert","lines":["t"],"id":255}],[{"start":{"row":168,"column":16},"end":{"row":288,"column":22},"action":"remove","lines":["@if( $product->product )","                <a  href=\"#\" ","                    class=\"status\" ","                    data-toggle=\"popover\" ","                    data-placement=\"left\" ","                    data-html=\"true\" ","                    data-container=\"body\"","                    data-trigger=\"click\"","                    data-content='","                    ","                    {!! Form::open([ \"url\" => action(\"Products@update\", $product->product_id), \"method\"=>\"PATCH\", \"enctype\"=>\"multipart/form-data\", \"class\"=>\"columns is-multiline product-edit-form white-bg\" ]) !!}","                            ","                    <div class=\"column is-5\">","                        ","                        <div class=\"field padding-left-0\">","                            <div class=\"image-upload\">","                                <label class=\"label is-pulled-left\">Thumbnail:</label>","                                {!! Form::file(\"thumb_images\", [\"class\"=> \"file image-file\", \"placeholder\"=> \"Thumbnail\"]) !!}","                                <i class=\"fas fa-plus hover yellow-text\"></i>","                                <p class=\"preview\">","                                    <img src=\"{{ $product->product->thumb_image }}\" width=\"100\" />","                                </p>","                            </div>","                        </div>","                        ","                        <div class=\"field padding-left-0\">","                            <div class=\"image-upload\">","                                <label class=\"label is-pulled-left\">All Images:</label>","                                {!! Form::file(\"all_image[]\", [\"class\"=> \"file image-file\", \"multiple\"=> \"multiple\"]) !!}","                                <i class=\"fas fa-plus hover yellow-text\"></i>","                                <p class=\"preview\">","                                    @if( count($product->product->all_images) > 0 )","                                    @foreach( $product->product->all_images as $img )","                                    <span>","                                        delete <input type=\"checkbox\" name=\"all_images_delete[]\" value=\"{{ $img }}\" />","                                        <img src=\"{{ $img }}\" width=\"100\" />","                                    </span>","                                    @endforeach","                                    @endif","                                </p>","                            </div>","                        </div>","                        ","                    </div>","                    ","                    <div class=\"column is-7 columns is-multiline\">","                    ","                        <div class=\"field column is-6-desktop is-12-mobile\">","                            <label class=\"label is-pulled-left\">Name</label>","                            {!! Form::text(\"name\", $product->product->name, [\"class\"=> \"input\", \"placeholder\"=> \"Name\"]) !!}","                        </div>","                    ","                        <div class=\"field column is-6-desktop is-12-mobile\">","                            <label class=\"label is-pulled-left\">Category</label>","                            {!! Form::select(\"category_id\", \\App\\Category::pluck(\"name\", \"id\"), $product->product->category_id, [\"class\"=> \"select\", \"placeholder\"=> \"-Category-\", \"required\"=> \"required\"]) !!}","                        </div>","                        ","                        <div class=\"field column is-6-desktop is-12-mobile\">","                            <label class=\"label is-pulled-left\">Price</label>","                            {!! Form::text(\"price\", $product->product->price, [\"class\"=> \"input\", \"placeholder\"=>\"price\"]) !!}","                        </div>","                        ","                        <div class=\"field column is-6-desktop is-12-mobile \">","                            <label class=\"label is-pulled-left\">Order</label>","                            {!! Form::text(\"display_order\", $product->product->display_order, [\"class\"=> \"input\", \"placeholder\"=>\"Display order\"]) !!}","                        </div>","                        ","                        @if( in_array(auth()->user()->role, [1,2]) )","                        <div class=\"field column is-12\">","                            <label class=\"label is-pulled-left\">Purchase Price</label>","                            {!! Form::text(\"purchase_price\", $product->product->purchase_price, [\"class\"=> \"input\", \"placeholder\"=>\"Purchase price\"]) !!}","                        </div>","                        @endif","                        ","                        <div class=\"field column is-12\">","                            {!! Form::textarea(\"product_detail\", $product->product->product_detail, [\"class\"=> \"textarea summernote\", \"placeholder\"=>\"Detail\"]) !!}","                        </div>","                        ","                        <div class=\"field column is-12\">","                            {!! Form::textarea(\"note\", $product->product->note, [\"class\"=> \"textarea summernote\", \"placeholder\"=>\"Note (private to admins)\"]) !!}","                        </div>","                        ","                        <div class=\"field column is-6 has-text-left padding-left-30\">","                            <label class=\"checkbox has-text-left black-text\">","                                <input type=\"checkbox\" name=\"is_published\" value=\"1\" {{ $product->product->is_published == 1 ? \"checked\" : \"\" }}>","                                Publish","                            </label>","                        </div>","                        ","                        <div class=\"field column is-6 \">","                            {!! Form::text(\"stock_quantity\", $product->product->stock_quantity, [\"class\"=> \"input\", \"placeholder\"=>\"Stock Quantity\"]) !!}","                        </div>","                        ","                        <div class=\"field column is-12 has-text-centered\">","                            {!! Form::submit(\"SAVE\", [\"class\"=>\"button is-large is-fullwidth yellow-bg yellow-border black-text font-weight-700 has-text-uppercase\"]) !!}","                        </div>","                        ","                    </div>","                    {!! Form::close() !!}","                    ","                    @if( in_array( auth()->user()->role, [1,2,3] ) )","                    ","                    {!! Form::open([ \"url\" => action(\"Products@destroy\", $product->product->id), \"method\"=>\"DELETE\", \"enctype\"=>\"multipart/form-data\", \"class\"=>\"columns is-multiline product-edit-form white-bg\" ]) !!}","                    ","                    {!! Form::hidden(\"product_id\", $product->product->id) !!}","                    ","                    {!! Form::submit(\"Delete this product\", [\"class\"=>\"button is-danger is-small\"]) !!}","                    ","                    {!! Form::close() !!}","                    ","                    @endif","                    ","                    '>","                  <i class=\"fas fa-dot-circle fa-2x @if($product->product->is_published == 0)yellow-text @else green-text @endif\" ","                     data-toggle=\"tooltip\" ","                     data-placement=\"bottom\" ","                     data-trigger=\"hover\" ","                     data-container=\"body\" ","                     data-title=\"@if($product->product->is_published == 0) Unpublished : Visitors cannot see this post. @else Published. Visitors can see this post. @endif\"></i>","                </a>","                @endif"]},{"start":{"row":168,"column":16},"end":{"row":168,"column":63},"action":"insert","lines":["@include('public.partials.product-edit-button')"]}],[{"start":{"row":160,"column":65},"end":{"row":160,"column":78},"action":"remove","lines":["product_image"],"id":257},{"start":{"row":160,"column":65},"end":{"row":160,"column":76},"action":"insert","lines":["thumb_image"]}],[{"start":{"row":160,"column":55},"end":{"row":160,"column":62},"action":"insert","lines":["sm_link"],"id":258}],[{"start":{"row":160,"column":62},"end":{"row":160,"column":83},"action":"remove","lines":["$product->thumb_image"],"id":259}],[{"start":{"row":160,"column":62},"end":{"row":160,"column":63},"action":"insert","lines":["("],"id":260}],[{"start":{"row":160,"column":63},"end":{"row":160,"column":64},"action":"insert","lines":[")"],"id":261}],[{"start":{"row":160,"column":63},"end":{"row":160,"column":64},"action":"insert","lines":[" "],"id":262}],[{"start":{"row":160,"column":63},"end":{"row":160,"column":64},"action":"insert","lines":[" "],"id":263}],[{"start":{"row":160,"column":64},"end":{"row":160,"column":85},"action":"insert","lines":["$product->thumb_image"],"id":264}],[{"start":{"row":164,"column":19},"end":{"row":164,"column":20},"action":"insert","lines":["\\"],"id":265}],[{"start":{"row":164,"column":20},"end":{"row":164,"column":21},"action":"insert","lines":["A"],"id":266}],[{"start":{"row":164,"column":21},"end":{"row":164,"column":22},"action":"insert","lines":["p"],"id":267}],[{"start":{"row":164,"column":22},"end":{"row":164,"column":23},"action":"insert","lines":["p"],"id":268}],[{"start":{"row":164,"column":23},"end":{"row":164,"column":24},"action":"insert","lines":["\\"],"id":269}],[{"start":{"row":164,"column":24},"end":{"row":164,"column":25},"action":"insert","lines":["O"],"id":270}],[{"start":{"row":164,"column":25},"end":{"row":164,"column":26},"action":"insert","lines":["r"],"id":271}],[{"start":{"row":164,"column":26},"end":{"row":164,"column":27},"action":"insert","lines":["d"],"id":272}],[{"start":{"row":164,"column":27},"end":{"row":164,"column":28},"action":"insert","lines":["e"],"id":273}],[{"start":{"row":164,"column":28},"end":{"row":164,"column":29},"action":"insert","lines":["r"],"id":274}],[{"start":{"row":164,"column":29},"end":{"row":164,"column":30},"action":"insert","lines":[":"],"id":275}],[{"start":{"row":164,"column":29},"end":{"row":164,"column":30},"action":"remove","lines":[":"],"id":276}],[{"start":{"row":164,"column":29},"end":{"row":164,"column":30},"action":"insert","lines":["_"],"id":277}],[{"start":{"row":164,"column":30},"end":{"row":164,"column":31},"action":"insert","lines":["p"],"id":278}],[{"start":{"row":164,"column":31},"end":{"row":164,"column":32},"action":"insert","lines":["r"],"id":279}],[{"start":{"row":164,"column":32},"end":{"row":164,"column":33},"action":"insert","lines":["o"],"id":280}],[{"start":{"row":164,"column":33},"end":{"row":164,"column":34},"action":"insert","lines":["d"],"id":281}],[{"start":{"row":164,"column":34},"end":{"row":164,"column":35},"action":"insert","lines":["u"],"id":282}],[{"start":{"row":164,"column":35},"end":{"row":164,"column":36},"action":"insert","lines":["c"],"id":283}],[{"start":{"row":164,"column":36},"end":{"row":164,"column":37},"action":"insert","lines":["t"],"id":284}],[{"start":{"row":164,"column":37},"end":{"row":164,"column":38},"action":"insert","lines":[":"],"id":285}],[{"start":{"row":164,"column":38},"end":{"row":164,"column":39},"action":"insert","lines":[":"],"id":286}],[{"start":{"row":164,"column":39},"end":{"row":164,"column":40},"action":"insert","lines":["w"],"id":287}],[{"start":{"row":164,"column":40},"end":{"row":164,"column":41},"action":"insert","lines":["h"],"id":288}],[{"start":{"row":164,"column":41},"end":{"row":164,"column":42},"action":"insert","lines":["e"],"id":289}],[{"start":{"row":164,"column":42},"end":{"row":164,"column":43},"action":"insert","lines":["r"],"id":290}],[{"start":{"row":164,"column":43},"end":{"row":164,"column":44},"action":"insert","lines":["e"],"id":291}],[{"start":{"row":164,"column":44},"end":{"row":164,"column":45},"action":"insert","lines":["("],"id":292}],[{"start":{"row":164,"column":45},"end":{"row":164,"column":46},"action":"insert","lines":[")"],"id":293}],[{"start":{"row":164,"column":46},"end":{"row":164,"column":54},"action":"remove","lines":["$product"],"id":294}],[{"start":{"row":164,"column":46},"end":{"row":164,"column":56},"action":"remove","lines":["->quantity"],"id":295}],[{"start":{"row":164,"column":45},"end":{"row":164,"column":46},"action":"insert","lines":["'"],"id":296}],[{"start":{"row":164,"column":46},"end":{"row":164,"column":47},"action":"insert","lines":["'"],"id":297}],[{"start":{"row":164,"column":46},"end":{"row":164,"column":47},"action":"insert","lines":["p"],"id":298}],[{"start":{"row":164,"column":47},"end":{"row":164,"column":48},"action":"insert","lines":["r"],"id":299}],[{"start":{"row":164,"column":48},"end":{"row":164,"column":49},"action":"insert","lines":["o"],"id":300}],[{"start":{"row":164,"column":49},"end":{"row":164,"column":50},"action":"insert","lines":["d"],"id":301}],[{"start":{"row":164,"column":50},"end":{"row":164,"column":51},"action":"insert","lines":["u"],"id":302}],[{"start":{"row":164,"column":51},"end":{"row":164,"column":52},"action":"insert","lines":["c"],"id":303}],[{"start":{"row":164,"column":52},"end":{"row":164,"column":53},"action":"insert","lines":["t"],"id":304}],[{"start":{"row":164,"column":53},"end":{"row":164,"column":54},"action":"insert","lines":["_"],"id":305}],[{"start":{"row":164,"column":54},"end":{"row":164,"column":55},"action":"insert","lines":["i"],"id":306}],[{"start":{"row":164,"column":55},"end":{"row":164,"column":56},"action":"insert","lines":["d"],"id":307}],[{"start":{"row":164,"column":57},"end":{"row":164,"column":58},"action":"insert","lines":[","],"id":308}],[{"start":{"row":164,"column":58},"end":{"row":164,"column":59},"action":"insert","lines":[" "],"id":309}],[{"start":{"row":164,"column":59},"end":{"row":164,"column":60},"action":"insert","lines":["$"],"id":310}],[{"start":{"row":164,"column":60},"end":{"row":164,"column":61},"action":"insert","lines":["p"],"id":311}],[{"start":{"row":164,"column":61},"end":{"row":164,"column":62},"action":"insert","lines":["r"],"id":312}],[{"start":{"row":164,"column":62},"end":{"row":164,"column":63},"action":"insert","lines":["o"],"id":313}],[{"start":{"row":164,"column":63},"end":{"row":164,"column":64},"action":"insert","lines":["d"],"id":314}],[{"start":{"row":164,"column":64},"end":{"row":164,"column":65},"action":"insert","lines":["u"],"id":315}],[{"start":{"row":164,"column":65},"end":{"row":164,"column":66},"action":"insert","lines":["c"],"id":316}],[{"start":{"row":164,"column":66},"end":{"row":164,"column":67},"action":"insert","lines":["t"],"id":317}],[{"start":{"row":164,"column":67},"end":{"row":164,"column":68},"action":"insert","lines":["-"],"id":318}],[{"start":{"row":164,"column":68},"end":{"row":164,"column":69},"action":"insert","lines":[">"],"id":319}],[{"start":{"row":164,"column":69},"end":{"row":164,"column":70},"action":"insert","lines":["i"],"id":320}],[{"start":{"row":164,"column":70},"end":{"row":164,"column":71},"action":"insert","lines":["d"],"id":321}],[{"start":{"row":164,"column":72},"end":{"row":164,"column":73},"action":"insert","lines":["-"],"id":322}],[{"start":{"row":164,"column":73},"end":{"row":164,"column":74},"action":"insert","lines":[">"],"id":323}],[{"start":{"row":164,"column":74},"end":{"row":164,"column":75},"action":"insert","lines":["c"],"id":324}],[{"start":{"row":164,"column":75},"end":{"row":164,"column":76},"action":"insert","lines":["o"],"id":325}],[{"start":{"row":164,"column":76},"end":{"row":164,"column":77},"action":"insert","lines":["u"],"id":326}],[{"start":{"row":164,"column":77},"end":{"row":164,"column":78},"action":"insert","lines":["n"],"id":327}],[{"start":{"row":164,"column":78},"end":{"row":164,"column":79},"action":"insert","lines":["t"],"id":328}],[{"start":{"row":164,"column":79},"end":{"row":164,"column":80},"action":"insert","lines":["("],"id":329}],[{"start":{"row":164,"column":80},"end":{"row":164,"column":81},"action":"insert","lines":[")"],"id":330}],[{"start":{"row":164,"column":74},"end":{"row":164,"column":79},"action":"remove","lines":["count"],"id":331},{"start":{"row":164,"column":74},"end":{"row":164,"column":75},"action":"insert","lines":["s"]}],[{"start":{"row":164,"column":75},"end":{"row":164,"column":76},"action":"insert","lines":["u"],"id":332}],[{"start":{"row":164,"column":76},"end":{"row":164,"column":77},"action":"insert","lines":["n"],"id":333}],[{"start":{"row":164,"column":76},"end":{"row":164,"column":77},"action":"remove","lines":["n"],"id":334}],[{"start":{"row":164,"column":76},"end":{"row":164,"column":77},"action":"insert","lines":["m"],"id":335}],[{"start":{"row":164,"column":78},"end":{"row":164,"column":79},"action":"insert","lines":["'"],"id":336}],[{"start":{"row":164,"column":79},"end":{"row":164,"column":80},"action":"insert","lines":["'"],"id":337}],[{"start":{"row":164,"column":79},"end":{"row":164,"column":80},"action":"insert","lines":["q"],"id":338}],[{"start":{"row":164,"column":80},"end":{"row":164,"column":81},"action":"insert","lines":["u"],"id":339}],[{"start":{"row":164,"column":81},"end":{"row":164,"column":82},"action":"insert","lines":["a"],"id":340}],[{"start":{"row":164,"column":82},"end":{"row":164,"column":83},"action":"insert","lines":["n"],"id":341}],[{"start":{"row":164,"column":83},"end":{"row":164,"column":84},"action":"insert","lines":["t"],"id":342}],[{"start":{"row":164,"column":84},"end":{"row":164,"column":85},"action":"insert","lines":["i"],"id":343}],[{"start":{"row":164,"column":85},"end":{"row":164,"column":86},"action":"insert","lines":["t"],"id":344}],[{"start":{"row":164,"column":86},"end":{"row":164,"column":87},"action":"insert","lines":["y"],"id":345}],[{"start":{"row":165,"column":29},"end":{"row":165,"column":77},"action":"remove","lines":["product ? $product->product->stock_quantity : \"\""],"id":346},{"start":{"row":165,"column":29},"end":{"row":165,"column":43},"action":"insert","lines":["stock_quantity"]}]]},"ace":{"folds":[{"start":{"row":21,"column":57},"end":{"row":140,"column":4},"placeholder":"..."}],"scrolltop":571.5,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":204,"column":5},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":153,"state":"start","mode":"ace/mode/php"}},"timestamp":1529794106686,"hash":"5f42f471954f0f04f8107376526f3f58a3ae3a69"}
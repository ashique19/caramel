
<div class="column is-4-desktop is-4-tablet is-6-mobile">
  <div class="category-thumb">
    
    <a href="{{ action( 'CategoryPublic@'.$category->name_slug.'Item', $product->id ) }}">
      <img data-lazy="{{ md_link( $product->thumb_image ) }}" src="/public/img/settings/loading.gif" alt="{{ $category->name }}">
    </a>
    
    @include('public.partials.product-edit-button')
    
    <p class="show-all">
      <a>
        PRICE: {{ $product->price }} BDT
        <br>
        <span class="small">(SEE DETAIL)</span>
      </a>
    </p>
    
  </div>
  
  @if( count( $product->all_images ) > 0 )
  @foreach( $product->all_images as $img )
  <div class="category-thumb">
    
    <a href="{{ action( 'CategoryPublic@'.$category->name_slug.'Item', $product->id ) }}">
      <img data-lazy="{{ sm_link( $img ) }}" src="/public/img/settings/loading.gif" alt="{{ $category->name }}">
    </a>
    
    @include('public.partials.product-edit-button')
    
    <p class="show-all">
      <a class="button is-fullwidth margin-top-5 whitish-bg black-text">PRICE: {{ $product->price }} BDT</a>
      <!--<a href="{{ action( 'CategoryPublic@'.$category->name_slug.'Item', $product->id ) }}" class="button is-fullwidth margin-top-5 whitish-bg black-text">SHOW DETAIL</a>-->
    </p>
    
  </div>
  
  @endforeach
  @endif
  
</div>
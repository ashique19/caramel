<div class="column is-2-desktop is-3-tablet is-12-mobile category-sidebar">
  
  <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
  <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
  
  <nav class="panel yellow-border black-bg is-shadowless">
    
    <h3 class="panel-heading font-weight-700 yellow-bg yellow-border padding-5 xs-font-size-10 margin-bottom-10">
    CATEGORY
    @include('public.partials.add-category-button')
    </h3>
    
    @if( \App\Category::count() > 0 )
    @foreach( \App\Category::all() as $category )
    
      @if( $category->products()->published()->count() > 0 )
  
      <figure class="column is-12-desktop is-4-mobile">
        <a class="card" href="{{ action('CategoryPublic@'.$category->name_slug) }}">
          <div class="card-image">
            <figure class="image is-square thumb-holder">
              <img src="/public/img/categories/{{ $category->name }}.jpg" alt="{{ $category->name }}">
              <h2 class="has-text-centered font-size-16 xs-font-size-10">{{ $category->name }}</h2>
            </figure>
          </div>
        </a>
      </figure>
      
      @endif
  
    @endforeach
    @endif
    
  </nav>
  
</div>
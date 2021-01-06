

{{-- Blog Side bar --}}


<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
      <div class="widget">
        <h6 class="upper">Search blog</h6>
        <form action="{{ route('post.search') }}" method="POST">
            @csrf
          <input type="text" name="search" placeholder="Search.." class="form-control">
        </form>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">

            @php
                $all_category = App\Models\Category::latest() -> take(7) -> get();
            @endphp

            @foreach($all_category as $category)
                <li><a href="{{ route('blog.category.search', $category -> slug ) }}">{{ $category -> name }}</a>
                </li>
            @endforeach




        </ul>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">
            @php
            $all_tags = App\Models\Tag::latest() -> take(7) -> get();
            @endphp

            @foreach($all_tags as $tag)
                <a href="{{ route('blog.tag.search', $tag -> slug ) }}">{{ $tag -> name }}</a>
             @endforeach




        </div>
      </div>
      <!-- end of widget      -->
      <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">

            @php
            $latest_post = App\Models\Post::latest() -> take(7) -> get();
            @endphp

            @foreach($latest_post as $latest)

                <li><a href="{{ route('post.latest.search', $latest -> slug ) }}">{{ $latest -> title }}<i class="ti-arrow-right"></i><span>{{ date('M d, Y', strtotime($latest -> created_at) ) }}</span></a>
                </li>
             @endforeach




        </ul>
      </div>
      <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
  </div>

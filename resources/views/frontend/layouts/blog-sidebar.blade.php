

{{-- Blog Side bar --}}


<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
      <div class="widget">
        <h6 class="upper">Search blog</h6>
        <form>
          <input type="text" placeholder="Search.." class="form-control">
        </form>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">

            @foreach($all_category as $category)
                <li><a href="{{ $category -> slug }}">{{ $category -> name }}</a>
                </li>
            @endforeach




        </ul>
      </div>
      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">

            @foreach($all_tags as $tag)
                <a href="{{ $tag -> slug }}">{{ $tag -> name }}</a>
             @endforeach




        </div>
      </div>
      <!-- end of widget      -->
      <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">

            @foreach($latest_post as $latest)

                <li><a href="{{ $latest -> slug }}">{{ $latest -> title }}<i class="ti-arrow-right"></i><span>{{ date('F d, Y', strtotime($latest -> created_at) ) }}</span></a>
                </li>
             @endforeach




        </ul>
      </div>
      <!-- end of widget          -->
    </div>
    <!-- end of sidebar-->
  </div>

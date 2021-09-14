@extends("frontend.Layout")
@section("do-du-lieu-vao-layout")
    <?php
        $category = DB::table("categories")->where("id","=",$id)->first();
    ?>
    <h5 class="box-main-title">{{ isset($category->name)?$category->name:'' }}</h5>

    <div class="row">
        <?php
            $news = DB::table("news")->where("category_id","=",$id)->paginate(4);
        ?>
    @foreach($news as $rows)
        <!-- news -->
        <div class="col-md-6 col-sm-12">
            <article class="news">
                <figure> <img class="img-thumbnail" src="{{ asset('upload/news/'.$rows->photo) }}"> </figure>
                <div><a href="{{ url('news/detail/'.$rows->id) }}">
                        <h5>{{ $rows->name }}</h5>
                    </a></div>
                <p>{!! $rows->description !!}</p>
            </article>
        </div>
        <!-- end news -->
        @endforeach
    </div>
    <!-- paging -->
    {{ $news->render() }}
    <!-- end paging -->
@endsection

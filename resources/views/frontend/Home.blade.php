@extends("frontend.Layout")
@section("do-du-lieu-vao-layout")
<!-- slide -->
<div id="slideshow" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#slideshow" data-slide-to="0" class="active"></li>
        <li data-target="#slideshow" data-slide-to="1"></li>
        <li data-target="#slideshow" data-slide-to="2"></li>
        <li data-target="#slideshow" data-slide-to="3"></li>
    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active"> <img src="frontend/images/slide-01.jpg" alt="Los Angeles">
            <div class="carousel-text"><a href="#">Duis tellus risus, convallis ac mi in, varius pharetra lacus</a></div>
        </div>
        <div class="carousel-item"> <img src="frontend/images/slide-02.jpg" alt="Chicago">
            <div class="carousel-text"><a href="#">Duis tellus risus, convallis ac mi in, varius pharetra lacus</a></div>
        </div>
        <div class="carousel-item"> <img src="frontend/images/slide-03.jpg" alt="New York">
            <div class="carousel-text"><a href="#">Duis tellus risus, convallis ac mi in, varius pharetra lacus</a></div>
        </div>
        <div class="carousel-item"> <img src="frontend/images/slide-04.jpg" alt="New York">
            <div class="carousel-text"><a href="#">Duis tellus risus, convallis ac mi in, varius pharetra lacus</a></div>
        </div>
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slideshow" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#slideshow" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> </div>
<!-- end slide -->
<?php
    $categories = DB::select("select * from categories where id in (
        select category_id from news where categories.id = news.category_id
    ) order by id desc ");
?>
@foreach($categories as $rowsCategory)
<!-- list category -->
<h5 class="box-main-title">{{ $rowsCategory->name }}</h5>
<div class="row">
    <!-- news -->
    <div class="col-md-6 col-sm-12">
        <?php
            $firstNews = DB::table("news")->where("category_id","=",$rowsCategory->id)->orderBy("id","desc")->first();
        ?>
        <article class="news">
            <figure> <img class="img-thumbnail" src="{{ asset('upload/news/'.$firstNews->photo) }}">
                <figcaption><a href="{{ url('news/detail/'.$firstNews->id) }}">
                        <h6>{{ $firstNews->name }}</h6>
                    </a> </figcaption>
            </figure>
            <p>{!! $firstNews->description !!}</p>
        </article>
    </div>
    <!-- end news -->
    <!-- news -->
    <div class="col-md-6 col-sm-12">
        <?php
//        lay 3 tin tiep theo
            $otherNews = DB::table("news")->where("category_id","=",$rowsCategory->id)->orderBy("id","desc")->offset(1)->limit(4)->get();
        ?>
            @foreach($otherNews as $rows)
        <!-- other news -->
        <article class="news">
            <div class="row">
                <div class="col-md-4"><img class="img-thumbnail" src="{{ asset('upload/news/'.$rows->photo) }}"></div>
                <div class="col-md-8 no-padding"><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a></div>
            </div>
            <div class="dotted"></div>
        </article>
        <!-- end other news -->
                @endforeach
    </div>
    <!-- end news -->
</div>
<!-- end list category -->
@endforeach
@endsection

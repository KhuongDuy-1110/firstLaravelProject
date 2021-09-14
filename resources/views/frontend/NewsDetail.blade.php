@extends("frontend.Layout")
@section("do-du-lieu-vao-layout")
    <?php
        $news = DB::table("news")->where("id","=",$id)->first();
    ?>
    <div class="row" style="margin-top: 20px;">
        <!-- news -->
        <div class="col-md-12 col-sm-12">
            <div><a href="#">
                    <h5>{{ $news->name }}</h5>
                </a></div>
            <article class="news">
                <figure> <img class="img-thumbnail text-center" src="{{ asset('upload/news/'.$news->photo) }}"> </figure>
                <p>
                    {!! $news->description !!}
                    {!! $news->content !!}
                </p>
            </article>
        </div>
        <!-- end news -->
    </div>
@endsection

<!-- hot news -->
<h5 class="box-right-title">Tin nổi bật</h5>
<div class="card" style="margin-top: 20px; height: 300px; margin-top:0px;">
    <div class="card-body">
        <marquee behavior="scroll" direction="up" onMouseOver="this.setAttribute('scrollamount', 0, 0);this.stop();" OnMouseOut="this.setAttribute('scrollamount', 2, 0);this.start();" height="250px" scrollamount="2">
            <ul class="hot-news" style="padding:0px; margin:0px; list-style: none;">
                <?php
                    $hot = DB::table("news")->where("hot","=","1")->orderBy("id","desc")->offset(0)->take(10)->get();
                ?>
                @foreach($hot as $rows)
                <li><a href="{{ url('news/detail/'.$rows->id) }}">{{ $rows->name }}</a>
                    <div class="dotted"></div>
                </li>
                    @endforeach
            </ul>
        </marquee>
    </div>
</div>
<!-- end hotnews -->

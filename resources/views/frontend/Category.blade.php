<!-- category -->
<h5 class="box-right-title">Danh mục</h5>
<div class="card">
    <ul class="list-group list-group-flush category-box">
        <?php
            $categories = DB::select("select * from categories order by id desc ");
        ?>
        @foreach($categories as $rows)
            <li class="list-group-item"><a href="{{ url('news/category/'.$rows->id) }}">{{ $rows->name }}</a></li>
        @endforeach
    </ul>
</div>
<!-- end category -->

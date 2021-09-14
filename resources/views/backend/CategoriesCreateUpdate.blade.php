@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
    <div class="col-md-8 col-xs-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">Add edit category</div>
            <div class="panel-body">
                <form method="post" action="">
                    {{--            phai co the sau thi laravel moi bat duoc du lieu --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- rows -->
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2">Name</div>
                        <div class="col-md-10">
                            <input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" required>
                        </div>
                    </div>
                    <!-- end rows -->
                    <!-- rows -->
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <input type="submit" value="Process" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- end rows -->
                </form>
            </div>
        </div>
    </div>
@endsection

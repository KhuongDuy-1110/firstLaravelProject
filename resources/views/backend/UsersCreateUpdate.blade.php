@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<div class="col-md-8 col-xs-offset-2">
    @if(Request::get("notify")=="exists")
        <div class="alert alert-danger">Email nay da ton tai</div>
        @endif
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit user</div>
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
				<div class="col-md-2">Email</div>
				<div class="col-md-10">
					<input type="email" value="{{ isset($record->email)?$record->email:'' }}" name="email" @if(isset($record->email)) disabled @else required @endif class="form-control" >
				</div>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2">Password</div>
				<div class="col-md-10">
					<input type="password" name="password" @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" @else required @endif class="form-control" >
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

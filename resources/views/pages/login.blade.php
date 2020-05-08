@extends('layouts.master')

@section('pageTitle', "About")

@section('breadcrumb')
    
@endsection

@section('content')
<!--Page Title-->
<div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng nhập</div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('postLogin') }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" 
                                >
                            </div>
                            <br>    
                            <div>
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Đăng nhập
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <a href="{{ url('login/facebook') }}" title=""><li><i class="fa fa-sign-in">Đăng nhập</i></li></a>
            </div>
        </div>
        <!-- end slide -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    
</script>
@endsection

@section('style')
<style type="text/css">

</style>
@endsection
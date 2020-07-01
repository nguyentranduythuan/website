@extends('layouts.admin')

@section('title', $title)
@section('content')

<div class="page-content" style="min-height:1269px">
         <h3 class="page-title">Bảng tổng hợp</h3>
         <div class="page-bar">
            <ul class="page-breadcrumb">
               <li>
                  <i class="fa fa-home"></i>
                  <a href="{{ url('/cms') }}">Trang chủ</a>
                  <i class="fa fa-angle-right"></i>
               </li>
               <li>
                  <a href="#">Bảng tổng hợp</a>
               </li>
            </ul>
         </div>
         <!-- END PAGE HEADER-->
         <!-- BEGIN DASHBOARD STATS -->
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light red-soft" href="{{ url('/cms/member/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_user_register }}
                     </div>
                     <div class="desc">
                        Thành viên đăng ký
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light red-soft" href="{{ url('/cms/member/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_user_register_last_login }}
                     </div>
                     <div class="desc">
                        Người dùng trong ngày hôm nay
                     </div>
                  </div>
               </a>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light blue-soft" href="{{ url('/cms/member/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_user_register_month }}
                     </div>
                     <div class="desc">
                        Thành viên đăng ký trong tháng
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light blue-soft" href="{{ url('/cms/member/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_user_register_today }}
                     </div>
                     <div class="desc">
                        Thành viên đăng ký trong ngày
                     </div>
                  </div>
               </a>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light green-soft" href="{{ url('/cms/event/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_event }}
                     </div>
                     <div class="desc">
                        Tổng Event
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light green-soft" href="{{ url('/cms/event/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_event_today }}
                     </div>
                     <div class="desc">
                        Tổng event trong ngày
                     </div>
                  </div>
               </a>
            </div>
         </div>

         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light yellow-crusta" href="{{ url('/cms/member-join-event/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_join_event_today }}
                     </div>
                     <div class="desc">
                        Đăng ký tham gia event trong ngày
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
               <a class="dashboard-stat dashboard-stat-light yellow-crusta" href="{{ url('/cms/member-join-event/lists') }}">
                  <div class="visual">
                     <i class="fa fa-comments"></i>
                  </div>
                  <div class="details">
                     <div class="number">
                        {{ $data->total_join_event_month }}
                     </div>
                     <div class="desc">
                        Đăng ký tham gia event trong tháng
                     </div>
                  </div>
               </a>
            </div>
         </div>

         <!-- END DASHBOARD STATS -->
         <div class="clearfix"></div>
      </div>
@stop

@section('script')
<script type="text/javascript">
   jQuery(document).ready(function() {

   });
</script>
@stop
@extends('layout/layout')

@section('menu-bar')
    <!--== Main Menu Start ==-->
    <div class="col-lg-8 d-none d-xl-block">
        <nav class="mainmenu alignright">
            <ul>
                <li><a href="{{route('info.index')}}">Thông tin tài khoản</a></li>
                <li><a href="{{route('logout')}}">Đăng xuất</a></li>
            </ul>
        </nav>
    </div>
    <!--== Main Menu End ==-->
@endsection

@section('content')
    <!--== List ==-->
    <section id="what-do-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Danh sách đặt chuyến</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Message</p>
                        <div style="padding-top: 50px">
                            <div style="margin-bottom: 10px; text-align: right">
                                <a class="btn btn-primary" href="{{route('admin.car.arrange')}}">Xếp xe</a>
                            </div>
                            <table class="table table-bordered table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Điểm đón</th>
                                    <th scope="col">Điểm trả</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Số người</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Biển xe</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bookings as $key => $booking)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$booking->user->name}}</td>
                                        <td>{{$booking->user->phone}}</td>
                                        <td>{{$booking->trip->startPlace->address}}</td>
                                        <td>{{$booking->trip->startPlace->address}}</td>
                                        <td>{{\Carbon\Carbon::parse($booking->trip->date)->format('d-m-Y') .' '. $booking->trip->time . ':00'}}</td>
                                        <td>{{$booking->person}}</td>
                                        <td @if($booking->status_id == 5) style="color: red" @endif>{{$booking->status->status_name}}</td>
                                        <td>
                                            @if(isset($booking->car))
                                                {{$booking->car->car_name}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.trip.start',['id' => $booking->id])}}">
                                                <button
                                                    @if($booking->status_id != 2)
                                                    disabled
                                                    @endif
                                                    type="submit" style="margin: 3px" class="btn btn-info">
                                                    Xuất phát
                                                </button>
                                            </a>
                                            <a href="{{route('admin.trip.end',['id' => $booking->id])}}">
                                                <button
                                                    @if($booking->status_id != 3)
                                                    disabled
                                                    @endif
                                                    type="submit" style="margin: 3px" class="btn btn-info">
                                                    Hoàn thành
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Chưa có chuyến đi nào</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
        </div>
    </section>
    <!--== List ==-->
@endsection

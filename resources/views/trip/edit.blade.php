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
            <div style="margin-bottom: 50px">
                <a class="btn btn-secondary" href="{{route('trip.index')}}">Quay lại</a>
            </div>
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Chuyến đi của bạn</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Danh sách các chuyến đi Thái Bình - Hà Nội và ngược lại</p>
                        <div style="padding-top: 50px">
                            <form action="{{route('booking.update',['id' => $booking_id])}}" method="post">
                                @csrf
                                <table class="table table-bordered table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Điểm đón</th>
                                        <th scope="col">Điểm trả</th>
                                        <th scope="col">Thời gian</th>
                                        <th scope="col">Số lượng vé</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Biển xe</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($bookings as $key => $booking)
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>{{$booking->trip->startPlace->address}}</td>
                                            <td>{{$booking->trip->endPlace->address}}</td>
                                            <td>{{\Carbon\Carbon::parse($booking->trip->date)->format('d-m-Y') .' '. $booking->trip->time . ':00'}}</td>
                                            <td>@if($booking_id == $booking->id) <input style="width: 50px; text-align: center" name="person_update"
                                                                                        value="{{$booking->person}}"> @else{{{$booking->person}}} @endif
                                            </td>
                                            <td>{{$booking->trip->status->name}}</td>
                                            <td>@if($booking->trip->status_id == 1)
                                                    Chưa xác định
                                                @else
                                                    {{$booking->trip->car}}
                                                @endif</td>
                                            <td>@if($booking_id == $booking->id)
                                                    <button type="submit" style="margin: 3px" class="btn btn-info">Lưu
                                                        thay đổi
                                                    </button> @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Chưa có chuyến đi nào</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
        </div>
    </section>
    <!--== List ==-->
@endsection

@extends('layout/layout')

@section('menu-bar')
    <!--== Main Menu Start ==-->
    <div class="col-lg-8 d-none d-xl-block">
        <nav class="mainmenu alignright">
            <ul>
                <li><a href="{{route('admin.trip.index')}}">Danh sách chuyến đi</a></li>
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
                <a class="btn btn-secondary" href="{{route('admin.index')}}">Quay lại</a>
            </div>
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Danh sách đặt chuyến</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Message</p>
                        <div style="padding-top: 50px">
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
                                    <th scope="col">Xếp xe</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bookings as $key => $booking)
                                    <form action="{{ route('admin.car.store') }}"
                                          method="post">
                                        @csrf
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>{{$booking->user->name}}</td>
                                            <td>{{$booking->user->phone}}</td>
                                            <td>{{$booking->trip->startPlace->address}}</td>
                                            <td>{{$booking->trip->startPlace->address}}</td>
                                            <td>{{\Carbon\Carbon::parse($booking->trip->date)->format('d-m-Y') .' '. $booking->trip->time . ':00'}}</td>
                                            <td>{{$booking->person}}</td>
                                            <td @if($booking->status_id == 5) style="color: red" @endif>{{$booking->status->status_name}}</td>
                                            <td>@if($booking->status_id == 1 || $booking->status_id == 2)
                                                    <select class="custom-select" name="car_booking">
                                                        <option selected disabled>Chọn xe</option>
                                                        @foreach($cars as $key => $car)
                                                            <option value="{{$car->id}},{{$booking->id}}"
                                                                @if($car->id == $booking->car_id) selected @endif

                                                                @if($booking->trip->startPlace->area_id != $car->area_id || $booking->person > 9-($car->person))
                                                                    disabled
                                                                @endif>

                                                                {{$car->car_name}}

                                                                @if($booking->trip->startPlace->area_id == $car->area_id)
                                                                    - còn {{9-($car->person)}} chỗ
                                                                @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if($booking->status_id == 2)
                                                        <button type="submit" style="margin: 3px" class="btn btn-info">
                                                            Chuyển xe
                                                        </button>
                                                    @else
                                                        <button type="submit" style="margin: 3px"
                                                                class="btn btn-primary">
                                                            Xếp xe
                                                        </button>
                                                    @endif
                                                @elseif($booking->status_id == 5)
                                                    -
                                                @else
                                                    {{$booking->trip->car}}
                                                @endif</td>
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

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
    <!--== Book Car Area Start ==-->
    <div id="book-a-car">
        <div class="container">
            <div class="row">
                <div style="margin-bottom: 50px" class="col-lg-7 text-right">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="slider-right-text">
                                <h2>ĐẶT CHUYẾN</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="booka-car-content">
                        <form action="{{route('booking.store')}}" method="post">
                            @csrf
                            <div class="pick-location bookinput-item">
                                <select class="custom-select" name="start_place">
                                    <option selected disabled>Điểm đón</option>
                                    @foreach($addresses as $key => $address)
                                        <option value="{{$address->id}}">{{$address->address}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pick-location bookinput-item">
                                <select class="custom-select" name="end_place">
                                    <option selected disabled>Điểm trả</option>
                                    @foreach($addresses as $key => $address)
                                        <option value="{{$address->id}}">{{$address->address}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pick-date bookinput-item">
                                <input type="text" id="startDate2" name="date" placeholder="Ngày xuất phát"/>
                            </div>

                            <div class="pick-location bookinput-item">
                                <select class="custom-select" name="time">
                                    <option selected disabled>Thời gian xuất phát</option>
                                    <option value="6">06:00</option>
                                    <option value="8">08:00</option>
                                    <option value="10">10:00</option>
                                    <option value="12">12:00</option>
                                    <option value="14">14:00</option>
                                    <option value="16">16:00</option>
                                    <option value="18">18:00</option>
                                    <option value="20">20:00</option>
                                </select>
                            </div>

                            <div class="car-choose bookinput-item">
                                <select class="custom-select" name="person">
                                    <option selected disabled>Số lượng vé</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>

                            <div class="bookcar-btn bookinput-item">
                                <button type="submit">Đặt chuyến</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Book Car Area End ==-->

    <!--== List ==-->
    <section id="what-do-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Chuyến đi của bạn</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Danh sách các chuyến đi Thái Bình - Hà Nội và ngược lại</p>
                        <div style="padding-top: 50px">
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
                                        <td>{{$booking->person}}</td>
                                        <td @if($booking->status_id == 5) style="color: red" @endif>{{$booking->status->status_name}}</td>
                                        <td>@if($booking->status_id == 1)
                                                Chưa xác định
                                            @elseif($booking->status_id == 5)
                                                -
                                            @else
                                                {{$booking->car_name}}
                                            @endif</td>
                                        <td>
                                            <a href="{{route('booking.edit',['id' => $booking->id])}}">
                                                <button @if($booking->status_id > 2) disabled
                                                        @endif
                                                        style="margin: 3px" class="btn btn-primary">Chỉnh sửa
                                                </button>
                                            </a>
                                            <a href="{{route('booking.delete',['id' => $booking->id])}}">
                                                <button @if($booking->status_id > 2) disabled
                                                        @endif
                                                        style="margin: 3px" class="btn btn-danger">Hủy chuyến
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

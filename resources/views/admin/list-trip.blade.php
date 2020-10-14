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
                        <h2>Danh sách chuyến đi</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Message</p>
                        <div style="padding-top: 50px">
                            <table class="table table-bordered table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Điểm đón</th>
                                    <th scope="col">Điểm trả</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Số người</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Biển xe</th>
                                    <th scope="col">Lái xe</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($trips as $key => $trip)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$trip->startPlace->address}}</td>
                                        <td>{{$trip->endPlace->address}}</td>
                                        <td>{{\Carbon\Carbon::parse($trip->date)->format('d-m-Y') .' '. $trip->time . ':00'}}</td>
                                        <td>---</td>
                                        <td>{{$trip->status->name}}</td>
                                        <td>{{$trip->car}}</td>
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

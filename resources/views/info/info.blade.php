@extends('layout.layout')

@section('menu-bar')
    <!--== Main Menu Start ==-->
    <div class="col-lg-8 d-none d-xl-block">
        <nav class="mainmenu alignright">
            <ul>
                <li><a href="{{ route('trip.index') }}">Chuyến đi</a></li>
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
                <div class="col-lg-12">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Thông tin tài khoản</h3>
                            <table class="table table-bordered table-light" style="text-align: left">
                                <tbody>
                                <tr>
                                    <th scope="col">Họ tên</th>
                                    <td scope="col">{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Số điện thoại</th>
                                    <td scope="col">{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Địa chỉ</th>
                                    <td scope="col">{{$user->address}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Số CMND</th>
                                    <td scope="col">{{$user->issue_number}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="log-btn">
                                <a href="{{route('info.edit')}}"><button>Sửa thông tin</button></a>
                                <a href="{{route('password.edit')}}"><button>Đổi mật khẩu</button></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== List ==-->
@endsection

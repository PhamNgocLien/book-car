@extends('layout.layout')

@section('menu-bar')
    <!--== Main Menu Start ==-->
    <div class="col-lg-8 d-none d-xl-block">
        <nav class="mainmenu alignright">
            <ul>
                <li><a href="{{ route('trip.index') }}">Đặt chuyến</a></li>
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
                <a class="btn btn-secondary" href="{{route('info.index')}}">Quay lại</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Sửa mật khẩu</h3>
                            <form method="post" action="{{route('password.update')}}">
                                @csrf
                                <table class="table table-bordered table-light" style="text-align: left">
                                    <tbody>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Mật khẩu cũ</th>
                                        <td scope="col"><input type="password" name="old_password"}}"></td>
                                        @if($errors->first('name'))
                                            <p class="text-danger" >{{ $errors->first('name') }}</p>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Mật khẩu mới</th>
                                        <td scope="col"><input type="password" name="new_password" ></td>
                                        @if($errors->first('phone'))
                                            <p class="text-danger" >{{ $errors->first('phone') }}</p>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Xác nhận mật khẩu mới</th>
                                        <td scope="col"><input type="password" name="repass_confirmation" ></td>
                                        @if($errors->first('address'))
                                            <p class="text-danger" >{{ $errors->first('address') }}</p>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="log-btn">
                                    <button type="submit">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== List ==-->
@endsection

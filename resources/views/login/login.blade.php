@extends('layout/layout')

@section('title')
    <h2>Đăng nhập</h2>
    <span class="title-line"><i class="fa fa-car"></i></span>
    <p>Hãy đăng nhập để đặt chuyến đi</p>
@endsection

@section('content')
    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Đăng nhập</h3>
                            <form action="{{ route('login.store') }}" method="post">
                                @csrf
                                <div class="phone">
                                    <input type="tel" name="phone" placeholder="Số điện thoại">
                                </div>
                                <div class="password">
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                </div>
                                <div class="log-btn">
                                    <button type="submit">Đăng nhập</button>
                                </div>
                            </form>
                        </div>

                        <div class="create-ac">
                            <p>Bạn chưa có tài khoản?<a href="{{ route('register.index') }}">Đăng ký</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Login Page Content End ==-->
@endsection

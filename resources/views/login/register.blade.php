@extends('layout/layout')

@section('content')
    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Đăng ký</h3>
                            <form action="{{ route('register.store') }}" method="post">
                                @csrf
                                <div class="name">
                                    <input type="text" name="name" placeholder="Họ tên">
                                    @if($errors->first('name'))
                                        <p class="text-danger" >{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="phone">
                                    <input type="tel" name="phone" placeholder="Số điện thoại">
                                    @if($errors->first('phone'))
                                        <p class="text-danger" >{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="address">
                                    <input type="text" name="address" placeholder="Địa chỉ">
                                    @if($errors->first('address'))
                                        <p class="text-danger" >{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <div class="issue_number">
                                    <input type="text" name="issue_number" placeholder="Số CMND">
                                    @if($errors->first('issue_number'))
                                        <p class="text-danger" >{{ $errors->first('issue_number') }}</p>
                                    @endif
                                </div>
                                <div class="password">
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                    @if($errors->first('password'))
                                        <p class="text-danger" >{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="log-btn">
                                    <button type="submit">Đăng ký</button>
                                </div>
                            </form>
                        </div>

                        <div class="create-ac">
                            <p>Bạn đã có tài khoản?<a href="{{ route('login.index') }}">Đăng nhập</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Login Page Content End ==-->
@endsection

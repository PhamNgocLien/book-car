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
                            <h3>Sửa thông tin</h3>
                            <form method="post" action="{{route('info.update')}}">
                                @csrf
                                <table class="table table-bordered table-light" style="text-align: left">
                                    <tbody>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Họ tên</th>
                                        <td scope="col"><input name="name_update" value="{{$user->name}}"></td>
                                        @if($errors->first('name'))
                                            <p class="text-danger" >{{ $errors->first('name') }}</p>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Số điện thoại</th>
                                        <td scope="col"><input name="phone_update" value="{{$user->phone}}"></td>
                                        @if($errors->first('phone'))
                                            <p class="text-danger" >{{ $errors->first('phone') }}</p>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Địa chỉ</th>
                                        <td scope="col"><input name="address_update" value="{{$user->address}}"></td>
                                        @if($errors->first('address'))
                                            <p class="text-danger" >{{ $errors->first('address') }}</p>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle" scope="col">Số CMND</th>
                                        <td scope="col"><input name="issue_number_update" value="{{$user->issue_number}}"></td>
                                        @if($errors->first('issue_number'))
                                            <p class="text-danger" >{{ $errors->first('issue_number') }}</p>
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

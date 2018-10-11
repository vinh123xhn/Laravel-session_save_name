@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Raising the bar
    </div>
    @if (Session::has('user'))
        <div class="login-fail">
            <p class="text-danger">chao mung boss {{ Session::get('user') }}</p>
        </div>
    @endif

            <p class="text-danger">ban da xem
            <?php $views = Session::get('login');
             echo count($views);
            ?>
            </p>
    <a href="{{ route('user.logout') }}">
        <button type="button" class="btn btn-outline-primary">Đăng Xuất</button>
    </a>
    <hr>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function loginform(){
        return view('loginform');
    }

    public function login(Request $request){
        $username = $request->inputUsername;
        $password = $request->inputPassword;

        // Kiem tra thong tin dang nhap
        if ($username == 'admin' && $password == '123456'){

            //Neu thong tin chinh xac tao sesstion luu tru trang thai dang nhap
            $request->session()->push('login', true);

            $request->session()->flash('user', $username);

            //di den route show.login, de di chuyen nguoi dung den trang blog
            return redirect()->route('show.blog');
        }

        // neu thong tin dang nhap khong chinh sac, gan thong bao vao sesstion
        $message = 'dang nhap khong thanh cong, ten nguoi dung hoac mat khau sai';
        $request->session()->flash('login-fail', $message);

        //quay tro lai trang dang nhap
        return view('login');
    }

    public function showBlog(Request $request)
    {
        // Kiểm tra Session login có tồn tại hay không
        if ($request->session()->has('login') && $request->session()->get('login')) {
            // Session login tồn tại và có giá trị là true, chuyển hướng người dùng đến trang blog
            return view('blog');
        }
        // Session không tồn tại, người dùng chưa đăng nhập
        // Gán một thông báo vào Session not-login
        $message = 'Bạn chưa đăng nhập.';
        $request->session()->flash('not-login', $message);
        // Chuyển hướng về trang đăng nhập
        return view('login');
    }

    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        $request->session()->flush();
        return view('login');
    }
}

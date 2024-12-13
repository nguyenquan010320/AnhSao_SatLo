<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        } else {
            return view('pages.login');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'You are logged in!');
        } else {
            return redirect()->back()->with('error', 'Tài khoản của bạn không đúng');
        }
    }

    public function updateinfo(Request $request)
    {
        if(!Auth::user()){
            return redirect()->intended('/');
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'pass_old' => 
                function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Mật khẩu không đúng');
                }   
            },
            'pass_new_reenter' => function ($attribute, $value, $fail) use ($request) {
                if ($value !== $request->input('pass_new')) {
                    $fail('Mật khẩu không trùng nhau');
                }
            }, // Kiểm tra nếu email_confirmation trùng với email
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Lấy file từ request
        $file = $request->file('image');




        $user = Auth::user();
        $user->name_en = $input['name_en'];
        $user->contact_en = $input['contact_en'];
        if ($file) {
            // Tạo tên file duy nhất
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Đường dẫn lưu file trong thư mục public/avatars
            $destinationPath = public_path('avatars');

            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Lưu file vào thư mục public/avatars
            $file->move($destinationPath, $fileName);

            // Đường dẫn file để lưu vào cơ sở dữ liệu
            $filePath = 'avatars/' . $fileName;
            $user->image = $filePath;
        }

        // if (!Hash::check($input['pass_old'], Auth::user()->password)) {
        //     return redirect()->back()->with('error', 'Không trùng mật khẩu');
        // }

        $user->password = Hash::make($input['pass_new']);

        $user->save();

        return redirect()->route('profile')->with('success', 'Thông tin đã được cập nhật');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

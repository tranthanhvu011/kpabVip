<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('fe.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Tạo token ngẫu nhiên
        $token = Str::random(60);

        // Xóa các token cũ của email này
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Lưu token vào bảng password_resets
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Gửi mã qua email
        Mail::send('fe.reset_email', ['token' => $token, 'email' => $request->email], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('success', 'Đã gửi thông tin về gmail!');
    }
}

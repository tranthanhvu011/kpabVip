<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\FE\Account;
use App\User;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('fe.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]);

        $passwordReset = DB::table('password_resets')->where([
            ['token', $request->token],
            ['email', $request->email],
        ])->first();

        if (!$passwordReset) {
            return back()->withErrors(['error' => 'Link Này Đã Cũ, Hãy Vào Link Mới Nhất Được Gửi Về Gmail Nhé.']);
        }

        // Tìm user và cập nhật mật khẩu
        $user = Account::where('email', $request->email)->first();
        $user->password = $request->password;

        $user->save();

        // Xóa token sau khi sử dụng
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Khôi Phục Mật Khẩu Thành Công!');
    }
}


<?php
namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FE\Account;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmailController extends Controller
{
    public function showAddEmailForm()
    {
        // Lấy thông tin người dùng hiện tại từ Auth và Session
        $sessionAccount = Session::get('idAccount');
        $account = Account::find($sessionAccount);
        if ($account) {
            $email = $account->email;
            if ($email) {
                return redirect()->route('profile')->with('error', 'Bạn đã có email rồi.');
            } else {
                return view('fe.add-email');
            }
    }}
    public function addEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email', // Kiểm tra tính duy nhất của email trong bảng 'users'
        ]);
            $user = Session::get('idAccount');
            $account = Account::find($user);
        if ($account) {
            if (empty($account->email)) {
                $account->email = $request->input('email');
                $account->save();
    
                // Cập nhật email trong session (nếu cần)
                Session::put('user_email', $request->input('email'));
    
                return redirect()->route('profile')->with('success', 'Email đã được thêm thành công.');
            } else {
                return redirect()->route('profile')->with('error', 'Người dùng đã có email.');
            }
        }
    
        return redirect()->route('home')->with('error', 'Người dùng không tồn tại.');
    }
    public function sendDeleteEmailLink(Request $request)
{
    $request->validate(['email' => 'required|email']);
    $sessionEmail = Session::get('idEmail');
    $sessionAccount = Session::get('idAccount');
    if (empty($sessionEmail)) {
        return back()->with('error', 'Email không tồn tại trong hệ thống.');
    }
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
    Mail::send('fe.delete_email', ['token' => $token], function($message) use ($request){
        $message->to($request->email);
        $message->subject('Delete Email Notification');
    });

    return back()->with('success', 'Đã gửi liên kết xóa email qua gmail!');
}
public function confirmDeleteEmail($token)
{
    // Tìm token trong bảng password_resets
    $reset = DB::table('password_resets')->where('token', $token)->first();

    if (!$reset) {
        return redirect()->route('home')->with('error', 'Liên kết không hợp lệ hoặc đã hết hạn.');
    }

    // Tìm account dựa trên email
    $account = Account::where('email', $reset->email)->first();

    if ($account) {
        // Xóa email
        $account->email = null;
        $account->save();

        // Xóa token sau khi đã sử dụng
        DB::table('password_resets')->where('email', $reset->email)->delete();

        return redirect()->route('profile')->with('success', 'Email đã được xóa thành công.');
    }

    return redirect()->route('home')->with('error', 'Người dùng không tồn tại.');
}

}
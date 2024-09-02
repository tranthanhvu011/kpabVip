<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword2Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreatePassword2Request;
use App\Http\Requests\DeletePassword2Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception, Log;
use Illuminate\Support\Facades\DB;
use App\Http\Responses\APIResponse;
use App\Models\FE\Account;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class FEAccountController extends Controller
{
    public function index(){
        $user = Auth::user();
        $query = Account::orderBy('create_time', 'desc');
        $items = $query->paginate(config('constants.items_per_page'));
        return view('fe.list-account', compact('items'));
    }

    public function active(Request $request, $id){
        try{
            $account = Account::find($id);
            $account->update([
                'active' => 1
            ]);
            Session::flash('success', 'Kích hoạt tài khoản thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|active|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function getLogin(Request $request){
        return view('fe.login');
    }

      public function postLogin(LoginRequest $request){
        try{
            $data = $request->all();
            $credentials = $request->only('username', 'password');
            $account = Account::with('player')->where('username', $data['username'])->where('password', $data['password'])->first();
            if($account){
                if($account->ban == 1){
                    Session::flash('error', 'Tài khoản của bạn đang bị khóa vui lòng liên hệ Admin!');
                    return back();
                }
                $user = User::where('username', $data['username'])->first();
                if($user){
                    Auth::login($user);
                    Session::put('idAccount', $account->id);
                    Session::put('idEmail', $account->email);
                    $account->last_login_ip = $_SERVER['REMOTE_ADDR'];
                    $account->save();
                    return redirect()->route('home');
                }else{
                    if($this->createUser($request) == false){
                        Session::flash('error', 'Tài khoản bị lỗi!');
                        return back();
                    }
                    $credentials = $request->only('username', 'password');
                    Auth::attempt($credentials);
                    $account->last_login_ip = $_SERVER['REMOTE_ADDR'];
                    $account->save();
                    return redirect()->route('home');
                }
            }else{
                Session::flash('error', 'Tên tài khoản hoặc mật khẩu không chính xác');
                return back();
            }
        }catch(Exception $e){
            Log::error('FEAccountController|postLogin|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function getChangePassword(){
        return view('fe.change-password');
    }

    public function postChangePassword(ChangePasswordRequest $request){
        try{
            $data = $request->all();
            $current_user = Auth::user();
            $account = $current_user->account;
            if($account->password != $data['old_password']){
                Session::flash('error', 'Mật khẩu hiện tại không chính xác');
                return back();
            }
            if($account->password == $data['password']){
                Session::flash('error', 'Mật khẩu mới không được phép giống mật khẩu hiện tại');
                return back();
            }
            if($account->mkc2 && !isset($data['password2']) && empty($data['password2'])){
                Session::flash('error', 'Bạn chưa nhập mật khẩu cấp 2');
                return back();
            }
            if(isset($data['password2']) && $account->mkc2 != $data['password2']){
                Session::flash('error', 'Mật khẩu cấp 2 không chính xác');
                return back();
            }
            $data = $request->only('password');
            Account::find($account->id)->update($data);
            $data['password'] = Hash::make($data['password']);
            User::find($current_user->id)->update($data);
            Session::flash('success', 'Đổi mật khẩu thành công');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|postChangePassword|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function getRegister(){
        if (Auth::check()) {
            Session::forget('code_invite');
            return redirect()->route('home');
        }
        return view('fe.register');
    }

    public function createUser($request){
        try{
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user = new User();
            $user->fill($data);
            $user->save();
            return $user;
        }catch(Exception $e){
            Log::error('FEAccountController|createUser|' . $e->getMessage() . $e->getTraceAsString());
            return false;
        }
    }

   public function postRegister(RegisterRequest $request){
        try{
            if($request->session()->token() !== $request->input('_token')){
                Session::flash('error', 'Lỗi đăng ký vui lòng liên hệ admin!');
                return back();
            }
            $data = $request->all();
            $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $user = User::where('username', $data['username'])->first();
            if($user){
                Session::flash('error', 'Tên tài khoản đã tồn tại!');
                return back();
            }

            $code_invite = Session::get('code_invite');
            if(isset($code_invite) && !empty($code_invite)){
                $account_invite = Account::where('code_invite', $code_invite)->first();
                $registered_ips = $account_invite->registered_ips??[];
                if($account_invite && !empty($account_invite->last_login_ip) && $account_invite->last_login_ip != $data['ip_address'] && !in_array($data['ip_address'], $registered_ips)){
                    $registered_ips[] = $data['ip_address'];
                    $account_invite->update([
                        'registered_ips' => $registered_ips,
                        'invitation_used' => $account_invite->invitation_used + 1
                    ]);
                }
            }
            
            $account = new Account();
            $account->fill(array_merge([
                'vip1' => 0,
                'vip2' => 0,
                'vip3' => 0,
                'vip4' => 0,
                'vip5' => 0,
                'vip6' => 0,
                'tichdiemweb' => 0
            ], $data));
            $account->save();
            if(!$account->id){
                Session::flash('error', 'Lỗi đăng ký tài khoản!');
                return back();
            }
            if($this->createUser($request) == false){
                Session::flash('error', 'Lỗi đăng ký tài khoản!');
                return back();
            }
            Session::flash('success', 'Đăng ký tài khoản thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|postRegister|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }

    public function profile(){
        return view('fe.profile');
    }

    public function getActiveMember(){
        return view('fe.active-member');
    }

    public function postActiveMember(){
        try {
            $user = Auth::user();
            
            if ($user->account->vnd < 10000) {
                Session::flash('error', 'Số dư tài khoản của bạn không đủ để kích hoạt!');
                return back();
            }
            
            if ($user->account->active == 1) {
                Session::flash('error', 'Tài khoản của bạn đã được kích hoạt!');
                return back();
            }
    
            // Thay thế Redis bằng kiểm tra trong cơ sở dữ liệu
            $recentActivation = Account::where('username', $user->username)
                                        ->where('updated_at', '>', now()->subMinutes(10))
                                        ->exists();
                                        
            if (!$recentActivation) {
                Account::find($user->account->id)->update([
                    'active' => 1,
                    'vnd' => round($user->account->vnd - 10000)
                ]);
            } else {
                Session::flash('error', 'Bạn đã thực hiện thao tác này gần đây. Vui lòng thử lại sau!');
                return back();
            }
    
            Session::flash('success', 'Mở thành viên thành công!');
            return back();
        } catch (Exception $e) {
            Log::error('FEAccountController|postActiveMember|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', "Eror!");
            return back();
        }
    }
    

    public function getPassword2(){
        return view('fe.password-2');
    }

    public function postPassword2(CreatePassword2Request $request){
        try{
            $user = Auth::user();
            $data = $request->all();
            if($user->account->password != $data['current_password']){
                Session::flash('error', 'Mật khẩu hiện tại không chính xác');
                return back();
            }
            Account::find($user->account->id)->update([
                'mkc2' => $data['password']
            ]);
            Session::flash('success', 'Tạo mật khẩu cấp 2 thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|postPassword2|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function postChangePassword2(ChangePassword2Request $request){
        try{
            $user = Auth::user();
            $data = $request->all();
            if($user->account->password != $data['current_password']){
                Session::flash('error', 'Mật khẩu hiện tại không chính xác');
                return back();
            }
            if($user->account->mkc2 != $data['old_password2']){
                Session::flash('error', 'Mật khẩu cấp 2 hiện tại không chính xác');
                return back();
            }
            if($user->account->mkc2 == $data['password']){
                Session::flash('error', 'Mật khẩu cấp 2 mới không được trùng với mật khẩu cấp 2 hiện tại');
                return back();
            }
            Account::find($user->account->id)->update([
                'mkc2' => $data['password']
            ]);
            Session::flash('success', 'Đổi mật khẩu cấp 2 thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|postChangePassword2|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function getDeletePassword2(){
        try{
            $user = Auth::user();
            if($user->account->mkc2){
                return view('fe.delete-password-2');
            }
            return redirect()->route('home');
        }catch(Exception $e){
            return redirect()->route('home');
        }
    }

    public function postDeletePassword2(DeletePassword2Request $request){
        try{
            $user = Auth::user();
            $data = $request->all();
            if($user->account->password != $data['password']){
                Session::flash('error', 'Mật khẩu hiện tại không chính xác');
                return back();
            }
            $del_pass2_date = Carbon::now()->addDays(7);
            Account::find($user->account->id)->update([
                'del_pass2' => $del_pass2_date
            ]);
            Session::flash('success', 'Gửi yêu cầu xóa mật khẩu cấp 2 thành công, mật khẩu sẽ được xóa sau 7 ngày!');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|postDeletePassword2|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function checkDateDeletePassword2() {
        try{
            $user = Auth::user();
            $current_date = Carbon::now();
            if($current_date->gte($user->account->del_pass2)){
                Account::find($user->account->id)->update([
                    'del_pass2' => null,
                    'mkc2' => null
                ]);
                Session::flash('success', 'Mật khẩu cấp 2 của bạn đã được xóa!');
                return back();
            }
            Session::flash('warning', 'Mật khẩu cấp 2 của bạn sẽ được xóa vào: '.$user->account->del_pass2);
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|checkDateDeletePassword2|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function cancelDeletePassword2() {
        try{
            $user = Auth::user();
            Account::find($user->account->id)->update([
                'del_pass2' => null
            ]);
            Session::flash('success', 'Hủy yêu cầu xóa mật khẩu cấp 2 thành công!');
            return back();
        }catch(Exception $e){
            Log::error('FEAccountController|cancelDeletePassword2|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function topPower(){
        try{
            if(!Session::exists('TOP_POWER') || (Session::exists('TOP_POWER') && Session::exists('TOP_POWER_TIMEOUT') && round(Session::exists('TOP_POWER_TIMEOUT') + 86400) < time())){
                $statement = "SELECT name, gender, 
                    CASE 
                        WHEN gender = 1 THEN CAST(JSON_UNQUOTE(JSON_EXTRACT(data_point, '$[11]')) AS SIGNED)
                        WHEN gender = 2 THEN CAST(JSON_UNQUOTE(JSON_EXTRACT(data_point, '$[11]')) AS SIGNED)
                        ELSE CAST(JSON_UNQUOTE(JSON_EXTRACT(data_point, '$[11]')) AS SIGNED)
                    END AS second_value,
                    SUBSTRING_INDEX(SUBSTRING_INDEX(JSON_UNQUOTE(pet_power), ',', 2), ',', -1) AS detu_sm,
                    CAST(JSON_UNQUOTE(JSON_EXTRACT(data_point, '$[11]')) AS SIGNED) + CAST(COALESCE(SUBSTRING_INDEX(SUBSTRING_INDEX(JSON_UNQUOTE(pet_power), ',', 2), ',', -1), '0') AS SIGNED) AS tongdiem
                FROM player
                ORDER BY tongdiem DESC
                LIMIT 10;";
                $items = DB::select(DB::raw($statement));
                Session::put('TOP_POWER', $items);
                Session::put('TOP_POWER_TIME', time());
            }
            $items = Session::get('TOP_POWER');
            return view('fe.top-power', compact('items'));
        }catch(Exception $e){
            return redirect()->route('home');
        }
    }
    // Định nghĩa hàm generateRandomString
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
   

    public function codeInvite($code_invite){
        Session::put('code_invite', $code_invite);
        return redirect()->route('register');
    }

    public function createUniqueInviteCode() {
        $code = $this->generateRandomString(); // Sử dụng $this->generateRandomString()
        $existingCode = Account::where('code_invite', $code)->exists();
        if ($existingCode) {
            return $this->createUniqueInviteCode();
        }
        return $code;
    }
    
    public function linkCodeInvite()
    {
        $user = Auth::user();
        $account = $user->account;
        $code_invite = $account->code_invite;
        if (empty($code_invite)) {
            $code_invite = $this->createUniqueInviteCode();
            $account->code_invite = $code_invite;
            $account->save();
        }
        return view('fe.link-code-invite', compact('code_invite', 'account'));
    }
    public function getConvertToXu(){
        return view('fe.convertToXu');
    }
    public function convertToXuNe(Request $request)
    {
        $user = Auth::user();
        $vndAmount = $request->input('vnd_amount');

        // Bảng giá đổi VND sang Xu
        $vndToXu = [
            10000 => 10000000,
            20000 => 20000000,
            30000 => 30000000,
            50000 => 60000000,
            100000 => 130000000,
            200000 => 280000000,
            300000 => 435000000,
            500000 => 750000000,
            1000000 => 1700000000,
        ];

        if ($user->account->vnd < $vndAmount) {
            Session::flash('error', 'Số dư tài khoản của bạn không đủ!');
            return back();
        }

        if (isset($vndToXu[$vndAmount])) {
            $xuAmount = $vndToXu[$vndAmount];
            $user->account->xu += $xuAmount;
            $user->account->vnd -= $vndAmount;
            $user->account->save();
            Session::flash('success', 'Đổi tiền thành công!');
        } else {
            Session::flash('error', 'Số tiền VND không hợp lệ!');
        }

        return back();
    }

    public function getConvertToLuong(){
        return view('fe.convertToLuong');
    }
    public function convertToLuongNe(Request $request)
    {
        $user = Auth::user();
        $vndAmount = $request->input('vnd_amount');

        // Bảng giá đổi VND sang Lượng
        $vndToLuong = [
            10000 => 500,
            20000 => 1000,
            30000 => 1500,
            50000 => 2500,
            100000 => 5000,
            200000 => 10000,
            300000 => 15000,
            500000 => 25000,
            1000000 => 50000,
        ];

        if ($user->account->vnd < $vndAmount) {
            Session::flash('error', 'Số dư tài khoản của bạn không đủ!');
            return back();
        }

        if (isset($vndToLuong[$vndAmount])) {
            $luongAmount = $vndToLuong[$vndAmount];
            $user->account->luong += $luongAmount;
            $user->account->vnd -= $vndAmount;
            $user->account->save();
            Session::flash('success', 'Đổi tiền thành công!');
        } else {
            Session::flash('error', 'Số tiền VND không hợp lệ!');
        }

        return back();
    }

}




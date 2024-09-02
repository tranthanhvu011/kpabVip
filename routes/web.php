<?php

use App\Http\Middleware\CheckAccountLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['middleware' => ['auth', CheckRole::class] ], function () {
    
//     Route::get('/', 'HomeController@dashboard')->name('dashboard');

//     // User
//     Route::get('user/profile', 'UserController@profile')->name('user.profile');
//     Route::resource('user', UserController::class);
//     // Role
//     Route::resource('role', RoleController::class);
//     // Class
//     Route::resource('class', ClassController::class);
// });
Route::group(['middleware' => ['auth']], function(){
    Route::group(['namespace' => 'FE'], function(){
        Route::get('dang-xuat', 'FEAccountController@logout')->name('logout');

        // Account
        Route::get('thong-tin-nhan-vat', 'FEAccountController@profile')->name('profile');
        Route::get('doi-mat-khau', 'FEAccountController@getChangePassword')->name('change-password');
        Route::post('doi-mat-khau', 'FEAccountController@postChangePassword')->name('change-password');
        Route::get('danh-sachs-tai-khoan', 'FEAccountController@index')->name('list-account');
        Route::post('kich-hoat-tai-khoan/{id}', 'FEAccountController@active')->name('active-account');
        Route::get('link-gioi-thieu', 'FEAccountController@linkCodeInvite')->name('link-code-invite');

        Route::get('mo-thanh-vien', 'FEAccountController@getActiveMember')->name('active-member');
        Route::post('mo-thanh-vien', 'FEAccountController@postActiveMember')->name('active-member');

        Route::get('mat-khau-cap-2', 'FEAccountController@getPassword2')->name('password-2');
        Route::post('mat-khau-cap-2', 'FEAccountController@postPassword2')->name('password-2');
        Route::post('doi-mat-khau-cap-2', 'FEAccountController@postChangePassword2')->name('change-password-2');
        Route::get('xoa-mat-khau-cap-2', 'FEAccountController@getDeletePassword2')->name('delete-password-2');
        Route::post('xoa-mat-khau-cap-2', 'FEAccountController@postDeletePassword2')->name('delete-password-2');
        Route::post('kiem-tra-xoa-mat-khau-cap-2', 'FEAccountController@checkDateDeletePassword2')->name('check-date-delete-password-2');
        Route::post('huy-xoa-mat-khau-cap-2', 'FEAccountController@cancelDeletePassword2')->name('cancel-delete-password-2');

        // Add card
        Route::get('nap-so-du', 'FEAddCardController@getAddCard')->name('add-card');
        Route::post('nap-so-du', 'FEAddCardController@postAddCard')->name('add-card');
        Route::get('lich-su-nap-the', 'FEAddCardController@addCardHistory')->name('add-card-history');

        // Forum
        Route::resource('dien-dan', 'FEForumController')->except(['index', 'update', 'show'])->names('forum');
        Route::post('tao-binh-luan/{id}', 'FEForumController@createComment')->name('comment.create');
        Route::post('xoa-binh-luan/{id}', 'FEForumController@commentDestroy')->name('comment.destroy');

        Route::get('quy-doi-xu', 'FEAccountController@getConvertToXu')->name('convertToXu');
        Route::post('quy-doi-xu', 'FEAccountController@ConvertToXuNe')->name('convertToXu');
        Route::get('quy-doi-luong', 'FEAccountController@getConvertToLuong')->name('convertToLuong');
        Route::post('quy-doi-luong', 'FEAccountController@ConvertToLuongNe')->name('convertToLuong');
    });
});
Route::group(['namespace' => 'FE'], function(){
    // Home
    Route::get('/', 'FEHomeController@index')->name('home');
    Route::get('Huong-Dan-Tan-Thu', 'FEHomeController@huongDanTanThu')->name('Huong-Dan-Tan-Thu');
    Route::get('OpenTest', 'FEHomeController@openTest')->name('OpenTest');
    Route::get('hungvuong', 'FEHomeController@hungVuong')->name('hungvuong');
    Route::get('dieu-khoang', 'FEHomeController@dieuKhoang')->name('dieu-khoang');
    Route::get('Kiem-Nguoi-Yeu', 'FEHomeController@kiemNguoiYeu')->name('Kiem-Nguoi-Yeu');
    Route::get('Open', 'FEHomeController@Open')->name('Open');
    Route::get('8-3', 'FEHomeController@suKien8thang3')->name('8-3');
    Route::get('Up-Set-Kich-Hoat', 'FEHomeController@upSetKichHoat')->name('Up-Set-Kich-Hoat');
    Route::get('hao-quang-ruc-ro', 'FEHomeController@haoQuangRucRo')->name('hao-quang-ruc-ro');
    Route::get('Up-De-Bat-Tu', 'FEHomeController@upDeBatTu')->name('Up-De-Bat-Tu');
    Route::get('X2-Quy-Doi', 'FEHomeController@x2QuyDoi')->name('X2-Quy-Doi');
    Route::get('GIFTCODE', 'FEHomeController@giftcode')->name('GIFTCODE');
    Route::get('SuKienTet', 'FEHomeController@suKienTet')->name('SuKienTet');
    Route::get('tai-game-android', 'FEHomeController@downloadGameAndroid')->name('download-game-android');
    Route::get('tai-game', 'FEHomeController@downloadGamePC')->name('download-game-pc');
    Route::get('tai-game-ios', 'FEHomeController@downloadGameIOS')->name('download-game-ios');
    Route::get('tai-game-android', 'FEHomeController@downloadGameAndroid')->name('download-game-android');
    Route::get('groupzalo', 'FEHomeController@groupZalo')->name('groupzalo');

    // Account
    Route::get('dang-nhap', 'FEAccountController@getLogin')->name('login');
    Route::post('dang-nhap', 'FEAccountController@postLogin')->name('login');
    Route::get('bang-xep-hang', 'FEAccountController@topPower')->name('top-power');

    // Register
    Route::get('dang-ky', 'FEAccountController@getRegister')->name('register');
    Route::post('dang-ky', 'FEAccountController@postRegister')->name('register');
    Route::get('ma-gioi-thieu/{code_invite}', 'FEAccountController@codeInvite')->name('code-invite');

    // Add card
    Route::get('card-callback', 'FEAddCardController@cardCallback')->name('card-callback');
    
    // Forum
    Route::get('dien-dan/{id}', 'FEForumController@show')->name('forum.show');
    Route::get('dien-dan/', 'FEForumController@index')->name('forum.index');

    Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
    
    Route::get('reset-password/{token}', 'ResetPasswordController@showResetForm')->name('reset');
    Route::post('reset-password', 'ResetPasswordController@reset')->name('password.update');

    Route::get('/add-email', 'EmailController@showAddEmailForm')->name('add-email-form');
    Route::post('/add-email', 'EmailController@addEmail')->name('add-email');

    Route::post('/send-delete-email-link', 'EmailController@sendDeleteEmailLink')->name('send-delete-email-link');
    Route::get('/confirm-delete-email/{token}', 'EmailController@confirmDeleteEmail')->name('confirm-delete-email');

});

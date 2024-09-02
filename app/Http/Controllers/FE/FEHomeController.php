<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\FE\Account;
use App\Models\FE\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FEHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = ForumPost::with(['user'])->orderBy('created_at', 'DESC');
        $items = $query->paginate(config('constants.items_per_page'));
        return view('fe.home', compact('items'));
    }
    
    public function dieuKhoang(){
        return view('fe.dieu-khoang');
    }
     public function huongDanTanThu(){
        return view('fe.Huong-Dan-Tan-Thu');
    }

     public function openTest(){
        return view('fe.OpenTest');
    }
    public function suKienTet(){
        return view('fe.SuKienTet');
    }
    public function Open(){
        return view('fe.Open');
    }
    public function kiemNguoiYeu(){
        return view('fe.Kiem-Nguoi-Yeu');
    }
    public function haoQuangRucRo(){
        return view('fe.hao-quang-ruc-ro');
    }
    public function upSetKichHoat(){
        return view('fe.Up-Set-Kich-Hoat');
    }
     public function hungVuong(){
        return view('fe.hungvuong');
    }
    public function upDeBatTu(){
        return view('fe.Up-De-Bat-Tu');
    }
    public function giftcode(){
        return view('fe.GIFTCODE');
    }
    public function suKien8thang3(){
        return view('fe.8-3');
    }
    public function x2QuyDoi(){
        return view('fe.X2-Quy-Doi');
    }
 
    public function downloadGameAndroid(){
        return view('fe.download-game-android');
    }

    public function downloadGamePC(){
        return view('fe.download-game-pc');
    }
    public function downloadGameIOS(){
        return view('fe.download-game-ios');
    }
    public function groupZalo(){
        return view('fe.groupzalo');
    }

}

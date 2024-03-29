<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Header;
use App\Models\Home;
use App\Models\Team;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSize;
use App\Models\Img;

class PagesController extends Controller
{
    public $data;
    public $homeSlide;
    public $teamData;

    public function setData($data)
    {
        $this->data = $data;
    }
    public function setHomeSlide($homeSlide)
    {
        $this->homeSlide = $homeSlide;
    }
    public function setTeamData($teamData)
    {
        $this->teamData = $teamData;
    }
    public function __construct()
    {
        $all = Header::headers();
        $this->setData($all);

        $team = Team::get();
        $this->setTeamData($team);
    }



    public function home()
    {
        $homeSlide = Home::get();
        $this->setHomeSlide($homeSlide);
        return view('index', [
            'data' => $this->data,
            'homeSlide' => $this->homeSlide,
            'user' => Auth::user()
        ]);
    }



    public function about()
    {
        return view('about', [
            'data' => $this->data,
            'team' => $this->teamData,
            'user' => Auth::user()
        ]);
    }



    public function shop($name, $sort = null, $search = null)
    {
        $products = Product::products($id = null , $name);
        $productsCategory = ProductCategory::all();
        return view('shop', [
            'data' => $this->data,
            'products' => $products,
            'productsCategory' => $productsCategory,
            'user' => Auth::user()
        ]);
    }



    public function cart()
    {
        return view('cart', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }



    public function checkout()
    {
        return view('checkout', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }



    public function productDetail($id)
    {
        $product = Product::products($id);
        return view('productDetail', [
            'data' => $this->data,
            'product' => $product,
            'user' => Auth::user()
        ]);
    }



    public function service()
    {
        return view('service', [
            'data' => $this->data,
            'team' => $this->teamData,
            'user' => Auth::user()
        ]);
    }



    public function contact()
    {
        return view('contact', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }



    public function registration()
    {
        return view('registration', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }



    public function login()
    {
        return view('login', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }



    public function myAccount()
    {
        return view('my-account', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }



    public function myAccountSettings()
    {
        return view('my-account-settings', [
            'data' => $this->data,
            'user' => Auth::user()
        ]);
    }
}

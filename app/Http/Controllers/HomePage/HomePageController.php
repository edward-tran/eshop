<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index(){
        $featuredProducts = Product::where('trending', '1')->take(15)->get();
        $featuredCategories = Category::where('popular', '1')->take(15)->get();
        return view('homepage.index', compact('featuredProducts', 'featuredCategories'));
    }

    public function showUserDetail(){
        $userName = Auth::user()->name;
        $email = Auth::user()->email;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;
        return view('homepage.user_detail', compact('userName', 'email', 'address', 'phone'));
    }
    public function showCategory(){
        $categories = Category::where('status', '0')->get();
        return view('homepage.category', compact('categories'));
    }

    public function showProduct($slug){
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('homepage.product.index', compact('category', 'products'));
        }else{
            return redirect('/')->with('error', 'Oops. Slug does not exists. Please try again!');
        }
    }

    public function showProductDetail($category_slug, $product_slug){
        if(Category::where('slug', $category_slug)->exists()){
            if(Product::where('slug', $product_slug)->exists()){
                $product = Product::where('slug', $product_slug)->first();
                $category = Category::where('slug', $category_slug)->first();
                return view('homepage.product.product_detail', compact('product', 'category'));
            }else{
                return redirect('/')->with('error', 'The link was broken');
            }
        }else{
            return redirect('/')->with('No such category found');
        }
    }
}

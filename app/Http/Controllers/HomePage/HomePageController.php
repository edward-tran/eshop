<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
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

    public function showSearchResult(){
        $products = Product::select('name')->where('status','0')->get();
        $data = [];

        foreach( $products as $product){
            $data[] = $product['name'];
        }
        return $data;
    }

    public function searchProduct( Request $request){
        $result = $request->product;
        if($result != " "){
            $product = Product::where('name', 'LIKE', '%'. $result .'%')->first();
            if($product){
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }else{
                return redirect()->back()->with('message', 'Khong tim thay san pham nay.');
            }
        }else{
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\About;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimoni;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $testimonies = Testimoni::all();
        $products = Product::skip(0)->take(8)->get();
        $about = About::first();

        return view('home.index', compact('sliders', 'categories', 'testimonies', 'products', 'about'));
    }
    public function produk_tampil()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $testimonies = Testimoni::all();
        $products = Product::skip(0)->take(8)->get();
        $about = About::first();

        $products = Product::all(); // Fetch all products
        $products = Product::paginate(9);
        return view('home.produk_tampil', compact('products', 'testimonies'));
    }

    public function products($id_subcategory)
    {

        $products = Product::where('id_subkategori', $id_subcategory)->get();
        $products = Product::where('id_subkategori', $id_subcategory)->paginate(9);
        $subcategory = Subcategory::findOrFail($id_subcategory);
        return view('home.products', compact('products', 'subcategory'));
    }
    public function products_category($category_id)
    {


        // Ambil semua subkategori dari kategori ini
        $subcategories = Subcategory::where('id_kategori', $category_id)->pluck('id');

        // Ambil semua produk yang memiliki subkategori dari kategori ini
        $products = Product::whereIn('id_subkategori', $subcategories)->get();
        $products = Product::whereIn('id_subkategori', $subcategories)->paginate(12);

        // Ambil informasi kategori untuk ditampilkan di halaman
        $category = Category::findOrFail($category_id);


        return view('home.products_category', compact('products', 'category', 'subcategories'));
    }

    public function add_to_cart(Request $request)
    {
        $input = $request->all();
        Cart::create($input);
    }

    public function delete_from_cart(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart');
    }

    public function product($id_product)
    {
        $product = Product::find($id_product);
        if (!$product) {
            // Jika produk tidak ditemukan, bisa mengarahkan ke halaman 404 atau halaman lain
            return redirect()->route('404');
        }
        $latest_products = Product::orderByDesc('created_at')->offset(0)->limit(10)->get();

        return view('home.product', compact('product', 'latest_products'));
    }

    public function cart()
    {
        if (!Auth::guard('webmember')->user()) {
            return redirect('/login_member');
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 9815f8aa4f020195b845461221e2c03a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $provinsi = json_decode($response);
        $carts = Cart::where('id_member', Auth::guard('webmember')->user()->id)->where('is_checkout', 0)->get();
        $cart_total = Cart::where('id_member', Auth::guard('webmember')->user()->id)->where('is_checkout', 0)->sum('total');

        return view('home.cart', compact('carts', 'provinsi', 'cart_total'));
    }

    public function get_kota($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 9815f8aa4f020195b845461221e2c03a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function get_ongkir($destination, $weight)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=39&destination=" . $destination . "&weight=" . $weight . "&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 9815f8aa4f020195b845461221e2c03a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function checkout_orders(Request $request)
    {
        $id = DB::table('orders')->insertGetId([
            'id_member' => $request->id_member,
            'invoice' => date('ymds'),
            'grand_total' => $request->grand_total,
            'status' => 'Baru',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        for ($i = 0; $i < count($request->id_produk); $i++) {
            DB::table('order_details')->insert([
                'id_order' => $id,
                'id_produk' => $request->id_produk[$i],
                'jumlah' => $request->jumlah[$i],
                'total' => $request->total[$i],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        Cart::where('id_member', Auth::guard('webmember')->user()->id)->update([
            'is_checkout' => 1
        ]);
    }

    public function checkout()
    {
        $about = About::first();
        $orders = Order::where('id_member', Auth::guard('webmember')->user()->id)->first();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 9815f8aa4f020195b845461221e2c03a"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $provinsi = json_decode($response);

        return view('home.checkout', compact('about', 'orders', 'provinsi'));
    }

    public function payments(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('bukti_transfer')) {
            $image = $request->file('bukti_transfer');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/payment_proof'), $imageName);
        }

        Payment::create([
            'id_order' => $request->id_order,
            'id_member' => Auth::guard('webmember')->user()->id,
            'jumlah' => $request->jumlah,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => "",
            'detail_alamat' => $request->detail_alamat,
            'status' => 'MENUNGGU',
            'no_rekening' => $request->no_rekening,
            'no_telepon' => $request->no_telepon,
            'atas_nama' => $request->atas_nama,
            'bukti_transfer' => $imageName
        ]);

        return redirect('/orders');
    }

    public function orders()
    {
        $orders = Order::where('id_member', Auth::guard('webmember')->user()->id)->get();
        $payments = Payment::where('id_member', Auth::guard('webmember')->user()->id)->get();
        return view('home.orders', compact('orders', 'payments'));
    }

    public function pesanan_selesai(Order $order)
    {
        $order->status = 'Selesai';
        $order->save();

        return redirect('/orders');
    }

    public function about()
    {
        $about = About::first();
        $testimonies = Testimoni::all();

        return view('home.about', compact('about', 'testimonies')); 
    }

    public function contact()
    {
        $about = About::first();

        return view('home.contact', compact('about'));
    }

    public function faq()
    {
        return view('home.faq');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search'); // Get the search term from the query
        $products = Product::where('nama_produk', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('subcategory', function ($query) use ($searchTerm) {
                $query->where('nama_subkategori', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(12);

        return view('home.search-results', compact('products', 'searchTerm'));
    }
    public function add_rating(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:500'
        ]);

        // Check if user is authenticated
        if (!Auth::guard('webmember')->check()) {
            return redirect('/login_member')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Check if user has already rated this product
        $existingReview = Review::where('id_member', Auth::guard('webmember')->user()->id)
            ->where('id_produk', $request->id_produk)
            ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk produk ini');
        }

        Review::create([
            'id_member' => Auth::guard('webmember')->user()->id,
            'id_produk' => $request->id_produk,
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan');
    }
}

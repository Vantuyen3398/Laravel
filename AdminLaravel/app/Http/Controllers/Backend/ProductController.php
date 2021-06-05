<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = DB::table('categories')->orderby('cat_id','desc')->get();
        return view('admin.product.create')->with('cate', $cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request -> isMethod('post')) {
            $validator = Validator::make($request->all(),[
                'product_name'=>'required|max:255',
                'price'=>'required|max:255',
                'image'=>'required|image|mimes:jpg,jpeg,png,gif|mimetypes:image/jpg,image/jpeg,image/png,image/gif|max:10000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                 ->withErrors($validator)
                                 ->withInput();
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destination_Path = public_path('backend/images/product');
                $file_name = time().'_'.$file->getClientOriginalName(); 
                $file->move($destination_Path, $file_name);
            } else {
                $file_name = 'noname.jpg';
            }
            $product = DB::table('products')->where('product_name', $request->product_name)->first();
            if (!$product) {
                $newProduct = new Products();
                $newProduct->product_name = $request->product_name;
                $newProduct->cat_id = $request->cat_id;
                $newProduct->price = $request->price;
                $newProduct->image = $file_name;
                $newProduct->save();
                return redirect()->route('admin.product.create')->with('message','Add Product SuccessFully!');
            } else {
                return redirect()->route('admin.product.create')->with('message','Your Product Name existed, Product can not be created');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $data = Products::paginate(5);
        // return view('admin.product.list_pd',['products'=>$data]);
        $data = DB::table('products')->join('categories','categories.cat_id','=','products.cat_id')->orderby('products.product_id','asc')->paginate(5);
        return view('admin.product.list_pd')->with('products',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $data = Products::find($product_id);
        $data->delete();
        return redirect()->route('admin.product.show');
    }
}

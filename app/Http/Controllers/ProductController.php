<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Filter pencarian dan category
        $categorySlug = request('category');
        $products = Product::filter(request(['search']))->filterByCategory($categorySlug)->latest()->paginate(9)->withQueryString();

        return view('products.index', [
            'title' => 'Products',
            'products' => $products,
            'categories' => Category::all(), // untuk dropdown filter kategori
            'selectedCategory' => $categorySlug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['title' => 'Create', 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes: jpeg,jpg,png|max:5024|dimensions:max_width:1980,max_height:1500',
        ]);

        // upload image
        $image = $request->file('image');
        $imageName = date('Y-m-d') . '-' . $image->getClientOriginalName();
        $image->storeAs('public/products', $imageName);

        // create data
        $product = Product::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        $product->categories()->attach($request->categories);
        // redirect halaman product
        return redirect()->route('product.index')->with('success', 'Product created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['title' => $product->title, 'product' => $product]);   
    }

    public function detailProduct(Product $product)
    {
        // dd($product);
        return view('products.detail', ['title' => $product->title, 'product' => $product]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', ['title' => 'Edit', 'product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes: jpeg,jpg,png|max:1024|dimensions:max_width:1980,max_height:1500',
        ]);

        if ($request->hasFile('image')) {
            // image baru
            $image = $request->file('image');
            $imageName = date('Y-m-d') . '-' .$image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);

            // delete image lama
            Storage::delete('public/products' . $product->image);

            $product->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imageName,
            ]);
            $product->categories()->attach($request->categories);
        } else {
            // jika tidak diubah image
            $product->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            $product->categories()->attach($request->categories);
        }
        

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete('public/products' . $product->image);
        $product->delete();

        return redirect()->route('product.index')->with(['success' => 'The product has been deleted!']);
    }
}

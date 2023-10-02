<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Toon een lijst met alle producten
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    // Toon het formulier om een nieuw product toe te voegen
    public function create()
    {
        return view('products.create');
    }

    // Opslaan van een nieuw product in de database
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index');
    }

    // Toon de details van een specifiek product
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }

    // Toon het formulier om een product te bewerken
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    // Bijwerken van een product in de database
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index');
    }

    // Verwijder een product uit de database
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}


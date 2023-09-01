<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Sortie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return View('product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('product.index')->with('success', "produit ajouté avec succès");
    }

    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, ProductRequest $request)
    {       
        $product->update($request->validated());
        return redirect()->route('product.index')->with('success', "produit modifié avec succès");        
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', "produit supprimé avec succès");
    }

    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product
        ]);
    }

    public function sortie()
    {
        $products = Product::all();
        return view('product.sortie', [
            'products' => $products
        ]);
    }

    public function sale(Request $request)
    {
        $request->validate([
            'quantite' => ['required', 'numeric']
        ]);

        $product = Product::where('reference', $request->reference)->firstOrFail();

        if ($request->quantite > $product->quantite) {
            return to_route('product.sortie')->withErrors([
                'quantite' => "Impossible! la quantité en stock est : ". $product->quantite 
            ])->onlyInput('quantite');
        } else {
            Sortie::create([
                'quantite' => $request->input('quantite'),
                'product_id' => $product->id,
                'user_id' => Auth::user()->id
            ]);
            $newstock = $product->quantite - $request->quantite;
            $product->update(['quantite' => $newstock]);
            return redirect()->route('product.index')->with('success', "sortie effectuée avec succès");
        }
    }
}

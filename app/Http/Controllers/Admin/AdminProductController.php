<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ], [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.max' => 'El nombre del producto no puede tener más de :max caracteres.',
            'price.required' => 'El precio del producto es obligatorio.',
            'price.numeric' => 'El precio del producto debe ser un número.',
            'price.min' => 'El precio del producto debe ser mayor o igual a :min.',
            'description.required' => 'La descripción del producto es obligatoria.',
        ]);
    
        // Crear un nuevo producto
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        
        // Establecer una imagen predeterminada
$product->image = 'default_image.jpg'; 
        // Guardar el producto en la base de datos
        $product->save();
    
        // Redireccionar a alguna vista de confirmación o a la lista de productos
        return redirect()->route('admin.product.index')->with('success', 'Producto creado exitosamente.');
    }
    
}
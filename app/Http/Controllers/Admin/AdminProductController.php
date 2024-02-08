<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        
      
         // Obtener el ID del producto recién creado
    $productId = $product->id;

    // Comprobar si se ha adjuntado un archivo
    if ($request->hasFile('image')) {
        // Obtener el nombre original y la extensión del archivo
        $originalName = $request->file('image')->getClientOriginalName();
        $extension = $request->file('image')->extension();

        // Definir el nombre del archivo a guardar (concatenando el ID del producto)
        $fileName = $productId . '_' . $originalName;
        // Verificar si ya existe un archivo con el mismo nombre
        if (Storage::disk('public')->exists($fileName)) {
             // Mostrar un mensaje de error al usuario
            return redirect()->back()->with('error', 'Ya existe un archivo con este nombre. Por favor, elige otro nombre para tu imagen.');
        }

        // Mover el archivo a la ubicación definitiva
        Storage::disk('public')->put($fileName, file_get_contents($request->file('image')));

        // Actualizar el campo de imagen en la base de datos
        $product->image = $fileName;
        $product->save();
    }

    // Redireccionar a alguna vista de confirmación o a la lista de productos
    return redirect()->route('admin.product.index')->with('success', 'Producto creado exitosamente.');
}
}
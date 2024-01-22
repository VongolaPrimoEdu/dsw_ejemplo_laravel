<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Almacena temporalmente los productos en el controlador
    private $products;

    public function __construct()
    {
        // Inicializa la colección de productos en el constructor
        $this->products = collect([
            (object)['id' => 1, 'name' => 'Mando', 'subtitle' => 'El mejor del mercado', 'image' => 'game.png', 'price' => 19.99],
            (object)['id' => 2, 'name' => 'Caja Fuerte', 'subtitle' => 'Nunca te robaran', 'image' => 'safe.png', 'price' => 49.99],
            (object)['id' => 3, 'name' => 'Submarino', 'subtitle' => 'Hasta los abismos', 'image' => 'submarine.png', 'price' => 5519.99],
            // Agrega más productos según sea necesario
        ]);
    }

    // Mostrar el listado de productos
    public function index()
    {
        // Pasa la colección de productos a la vista
       
        return view('product.productos', ['products' => $this->products]);
    }

    // Mostrar detalles del producto
    public function show($id)
    {
        // Busca el producto por su id en la colección de productos
        $product = $this->products->firstWhere('id', $id);

        // Pasa el producto encontrado a la vista
        
        return view('product.detalles', ['product' => $product]);
    }
}

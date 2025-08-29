<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductDetail;
use GuzzleHttp\Handler\Proxy;

class ProductDetailManager extends Component
{
    use WithFileUploads;

    public $productId, $category, $target = '_self';
    public $product;
    public  $id, $nombre, $correo, $estado, $tipo, $category_id, $clasificacion, $cupon, $encusta, $fecharedencion, 
            $textodestacado, $descripcionlarga, $fechalimitepublicacion, $destacado, $ordendestacado, $imagenuno_path, 
            $imagendos_path, $imagentres_path, $valor, $valormembresia, $descuento, $cobroenvio, $iva, $cantidadinventario, 
            $linkmuestrasagotadas, $condiciones, $solomembresia, $registrados;
    

    public function mount($product)
    {
       
       $this->$product = Product:: find($product->id)->get(); 
       $this->category = Category::orderBy('name')->get();
             
    }

    public function save()
    {
        dd("Hola");
        $this->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'nullable|string|max:255',
            'estado' => 'nullable|boolean',
            'tipo'  => 'nullable|boolean',
            'category_id' => 'required|integer',
            'clasificacion' => 'nullable|string|max:255',
            'cupon' => 'nullable|boolean',
            'encusta' => 'nullable|boolean',
            'fecharedencion' => 'nullable|datetime', 
            'textodestacado' => 'nullable|datetime',
            'descripcionlarga' =>'nullable|string|max:255',
            'fechalimitepublicacion' => 'nullable|datetime',
            'destacado' => 'nullable|boolean',
            'ordendestacado' => 'nullable|integer',
            'imagenuno_path' => $this->productId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'imagendos_path' => $this->productId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'imagentres_path' => $this->productId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'target' => 'required|in:_self,_blank',
            'valor' => 'nullable|float(10,2)',
            'valormembresia' => 'nullable|float(10,2)',
            'descuento' => 'nullable|float(10,2)',
            'cobroenvio' => 'nullable|boolean',
            'iva' => 'nullable|float(10,2)',
            'cantidadinventario' => 'nullable|integer',
            'linkmuestrasagotadas' => 'nullable|string|max:255',
            'condiciones' => 'nullable|string|max:255',
            'solomembresia' => 'nullable|boolean',
            'registrados'=> 'nullable|boolean',
        ]);

        $path = $this->image ? $this->image->store('products', 'public') : null;

        $product = Product::updateOrCreate(
            [   'id' => $this->productId,
                'nombre' => $this->nombre,
                'correo' => $this->correo,
                'estado' => $this->estado,
                'tipo'  => $this->tipo,
                'category_id' => $this->category_id,
                'clasificacion' => $this->clasificacion,
                'cupon' => $this->cupon,
                'encusta' => $this->encusta,
                'fecharedencion' => $this->fecharedencion, 
                'textodestacado' => $this->textodestacado,
                'descripcionlarga' => $this->descripcionlarga,
                'fechalimitepublicacion' => $this->fechalimitepublicacion,
                'destacado' => $this->destacado,
                'ordendestacado' => $this->ordendestacado,
                'imagenuno_path' => $path ?? Product::find($this->productId)?->image_path,
                'imagendos_path' => $path ?? Product::find($this->productId)?->image_path,
                'imagentres_path' => $path ?? Product::find($this->productId)?->image_path,
                'target' => $this->target,
                'valor' => $this->valor,
                'valormembresia' => $this->valormembresia,
                'descuento' => $this->descuento,
                'cobroenvio' => $this->cobroenvio,
                'iva' => $this->iva,
                'cantidadinventario' => $this->cantidadinventario,
                'linkmuestrasagotadas' => $this->linkmuestrasagotadas,
                'condiciones' => $this->condiciones,
                'solomembresia' => $this->solomembresia,
                'registrados'=> $this->registrados,
            ]
        );

        $this->resetForm();
        $this->loadCategory();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->nombre = $product->nombre;
        $this->correo = $product->correo;
        $this->estado = $product->estado;
        $this->tipo = $product->tipo;
        $this->category_id = $product->category_id;
        $this->clasificacion = $product->clasificacion;
        $this->cupon = $product->cupon;
        $this->encusta = $product->encusta;
        $this->fecharedencion = $product->fecharedencion; 
        $this->textodestacado = $product->textodestacado;
        $this->descripcionlarga = $product->descripcionlarga;
        $this->fechalimitepublicacion = $product->fechalimitepublicacion;
        $this->destacado = $product->destacado;
        $this->ordendestacado = $product->ordendestacado;
        $this->target = $product->target;
        $this->valor = $product->valor;
        $this->valormembresia = $product->valormembresia;
        $this->descuento = $product->descuento;
        $this->cobroenvio = $product->cobroenvio;
        $this->iva = $product->iva;
        $this->cantidadinventario = $product->cantidadinventario;
        $this->linkmuestrasagotadas = $product->linkmuestrasagotadas;
        $this->condiciones = $product->condiciones;
        $this->solomembresia = $product->solomembresia;
        $this->registrados = $product->registrados;
    }
        
   public function delete($id)
    {
        Product::destroy($id);
    }

    public function resetForm()
    {
        $this->reset(['id', 'nombre', 'correo', 'estado', 'tipo', 'category_id', 'clasificacion', 'cupon', 'encusta', 'fecharedencion', 'textodestacado', 'descripcionlarga', 'fechalimitepublicacion', 'destacado', 'ordendestacado', 'imagenuno_path', 'imagendos_path', 'imagentres_path', 'target', 'valor', 'valormembresia', 'descuento', 'cobroenvio', 'iva', 'cantidadinventario', 'linkmuestrasagotadas', 'condiciones', 'solomembresia', 'registrados']);
    }

    public function render()
    {
        return view('livewire.admin.productdetail-manager');
    }
}



<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductDetail;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Storage;

class ProductDetailManager extends Component
{
    use WithFileUploads;

    public $productId, $category, $target = '_self';
    public $product;
    public  $id, $nombre, $correo, $estado = 1, $tipo, $category_id, $clasificacion, $cupon, $encuesta, $fecharedencion,
        $textodestacado, $descripcionlarga, $fechalimitepublicacion, $destacado, $ordendestacado, $imagenuno_path,
        $imagendos_path, $imagentres_path, $valor, $valormembresia, $descuento, $cobroenvio, $iva, $cantidadinventario,
        $linkmuestrasagotadas, $condiciones, $solomembresia, $registrados, $productid;

    public $imageUno;
    public $imageDos;
    public $imageTres;

    public function mount($productId = null)
    {
        $this->category = Category::orderBy('name')->get();

        if ($productId) {
            $this->productId = $productId;
            $product = Product::find($productId);
            //dd($product->id);

            if ($product) {
                $this->edit($productId); // reutiliza el método que ya tienes
            }
        }
    }

    public function save()
    {
        $this->validate([
            'estado' => 'required',
            'nombre' => 'required',
            'category_id' => 'required',
            'tipo' => 'required',
            'clasificacion' => 'required|in:muestra,venta',
            'imageUno' => $this->productId ? 'nullable' : 'required',
            'textodestacado' => 'required',
            'cantidadinventario'  => 'required',
            'valor' => 'required',
        ]);
        try {

            $product = Product::updateOrCreate(
                // Condiciones para buscar
                ['id' => $this->productId],
                // Valores a crear o actualizar
                [
                    'nombre' => $this->nombre,
                    'correo' => $this->correo,
                    'estado' => $this->estado,
                    'tipo'  => $this->tipo,
                    'category_id' => $this->category_id,
                    'clasificacion' => $this->clasificacion,
                    'cupon' => $this->cupon,
                    'encuesta' => $this->encuesta,
                    'fecharedencion' => $this->fecharedencion,
                    'textodestacado' => $this->textodestacado,
                    'descripcionlarga' => $this->descripcionlarga,
                    'fechalimitepublicacion' => $this->fechalimitepublicacion,
                    'destacado' => $this->destacado,
                    'ordendestacado' => $this->ordendestacado,
                    'imagenuno_path' => $this->imageUno
                        ? $this->imageUno->store('products', 'public')
                        : Product::find($this->productId)?->imagenuno_path,

                    'imagendos_path' => $this->imageDos
                        ? $this->imageDos->store('products', 'public')
                        : Product::find($this->productId)?->imagendos_path,

                    'imagentres_path' => $this->imageTres
                        ? $this->imageTres->store('products', 'public')
                        : Product::find($this->productId)?->imagentres_path,
                    'valor' => $this->valor,
                    'valormembresia' => $this->valormembresia,
                    'descuento' => $this->descuento,
                    'cobroenvio' => $this->cobroenvio,
                    'iva' => $this->iva,
                    'cantidadinventario' => $this->cantidadinventario,
                    'linkmuestrasagotadas' => $this->linkmuestrasagotadas,
                    'condiciones' => $this->condiciones,
                    'solomembresia' => $this->solomembresia,
                    'registrados' => $this->registrados,
                ]
            );

            return redirect('/m_product')
                ->with('success', 'Producto guardado correctamente ✅');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al guardar el producto: ' . $e->getMessage());
        }
    }

    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $this->productid = $product->id;
        $this->nombre = $product->nombre;
        $this->correo = $product->correo;
        $this->estado = $product->estado;
        $this->tipo = $product->tipo;
        $this->category_id = $product->category_id;
        $this->clasificacion = $product->clasificacion;
        $this->cupon = $product->cupon;
        $this->encuesta = $product->encuesta;
        $this->fecharedencion = $product->fecharedencion;
        $this->textodestacado = $product->textodestacado;
        $this->descripcionlarga = $product->descripcionlarga;
        $this->fechalimitepublicacion = $product->fechalimitepublicacion;
        $this->destacado = $product->destacado;
        $this->ordendestacado = $product->ordendestacado;
        $this->imagenuno_path = $product->imagenuno_path;
        $this->imagendos_path = $product->imagendos_path;
        $this->imagentres_path = $product->imagentres_path;
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
        $this->reset([
            'id',
            'nombre',
            'correo',
            'estado',
            'tipo',
            'category_id',
            'clasificacion',
            'cupon',
            'encuesta',
            'fecharedencion',
            'textodestacado',
            'descripcionlarga',
            'fechalimitepublicacion',
            'destacado',
            'ordendestacado',
            'imagenuno_path',
            'imagendos_path',
            'imagentres_path',
            'valor',
            'valormembresia',
            'descuento',
            'cobroenvio',
            'iva',
            'cantidadinventario',
            'linkmuestrasagotadas',
            'condiciones',
            'solomembresia',
            'registrados'
        ]);
    }

    public function eliminarImagen($numero)
    {
        switch ($numero) {
            case 'uno':
                if ($this->imagenuno_path && Storage::disk('public')->exists($this->imagenuno_path)) {
                    Storage::disk('public')->delete($this->imagenuno_path);
                }
                $this->imagenuno_path = null;
                $this->imageUno = null;
                break;

            case 'dos':
                if ($this->imagendos_path && Storage::disk('public')->exists($this->imagendos_path)) {
                    Storage::disk('public')->delete($this->imagendos_path);
                }
                $this->imagendos_path = null;
                $this->imageDos = null;
                break;

            case 'tres':
                if ($this->imagentres_path && Storage::disk('public')->exists($this->imagentres_path)) {
                    Storage::disk('public')->delete($this->imagentres_path);
                }
                $this->imagentres_path = null;
                $this->imageTres = null;
                break;
        }
    }


    public function render()
    {
        return view('livewire.admin.productdetail-manager');
    }
}

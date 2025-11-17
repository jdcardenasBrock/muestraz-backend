<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductDetail;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductDetailManager extends Component
{
    use WithFileUploads;

    public $productId;
    public $category = [];
    public $target = '_self';
    public $product;
    public  $id, $nombre, $correo, $estado = 1, $tipo, $category_id, $clasificacion, $cupon, $encuesta, $fecharedencion,
        $textodestacado, $descripcionlarga, $fechalimitepublicacion, $destacado, $ordendestacado, $imagenuno_path,
        $imagendos_path, $imagentres_path, $valor, $valormembresia, $descuento, $cobroenvio, $iva, $cantidadinventario, $cantidadminima,
        $linkmuestrasagotadas, $condiciones, $solomembresia, $registrados, $productid;
    public bool $controlarinventario = false;

    public $imageUno;
    public $imageDos;
    public $imageTres;

    public function mount($productId = null)
    {
        $this->category = Category::orderBy('name')->get();

        if ($productId) {
            $this->productId = $productId;
            $product = Product::find($productId);

            if ($product) {
                $this->edit($productId); // reutiliza el método que ya tienes
            }
        }
    }

    public function updated($property, $value)
    {
        // Campos que deben tener formato de moneda
        $camposMonetarios = [
            'valor',
            'valormembresia',
            'iva',
        ];

        if (in_array($property, $camposMonetarios)) {
            $this->$property = $this->formatCurrency($value);
        }
    }

    private function formatCurrency($value)
    {
        // Quitar todo excepto números
        $value = preg_replace('/[^\d]/', '', $value);

        if ($value === '' || $value === null) {
            return null;
        }

        // Formatear con separador de miles
        return number_format((float) $value, 0, ',', '.');
    }

    private function unformatCurrency($value)
    {
        // Quitar puntos y convertir a número flotante
        return $value ? (float) str_replace('.', '', $value) : null;
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
            'controlarinventario' => 'boolean',
            'cantidadinventario' => $this->controlarinventario ? 'required|integer|min:0' : 'nullable',
            'valor' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $valorLimpio = $this->unformatCurrency($this->valor);
            $valorMembresiaLimpio = $this->unformatCurrency($this->valormembresia);
            $descuentoLimpio = $this->unformatCurrency($this->descuento);
            $ivaLimpio = $this->unformatCurrency($this->iva);

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
                    'controlarinventario' => $this->controlarinventario,
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
                    'valor' => $valorLimpio,
                    'valormembresia' => $valorMembresiaLimpio,
                    'descuento' => $descuentoLimpio,
                    'cobroenvio' => $this->cobroenvio,
                    'iva' => $ivaLimpio,
                    'cantidadinventario' => $this->cantidadinventario,
                    'cantidadminima' => $this->cantidadminima,
                    'linkmuestrasagotadas' => $this->linkmuestrasagotadas,
                    'condiciones' => $this->condiciones,
                    'solomembresia' => $this->solomembresia,
                    'registrados' => $this->registrados,
                ]

            );
            //dd($this->controlarinventario);
            DB::commit();
            return redirect('/m_product')
                ->with('success', 'Producto guardado correctamente ✅');
        } catch (\Exception $e) {
            DB::rollBack();
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
        $this->controlarinventario = $product->controlarinventario;
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
        $this->cantidadminima = $product->cantidadminima;
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
            'controlarinventario',
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
            'cantidadminima',
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

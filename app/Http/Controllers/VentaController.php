<?php

namespace App\Http\Controllers;

use App\TipoComprobante;
use Illuminate\Http\Request;
use App\Venta;
use App\DetalleVenta;
use App\Producto;
use Illuminate\Support\Carbon;

class VentaController extends Controller
{

    function index(Request $request)
    {
        $model = Venta::orderBy('id', 'desc')->paginate(5);

        $data = [
            'model' => $model
        ];

        return response()->json($data);
    }


    public function store(Request $request)
    {
        $fecha_hora = Carbon::now();
        $impuesto = TipoComprobante::find($request->tipo_comprobante_id)->impuesto;


        $model = new  Venta;
        $model->tipo_comprobante_id = $request->tipo_comprobante_id;
        $model->forma_pago_id = $request->forma_pago_id;
        $model->cliente_id = $request->cliente_id;
        $model->caja_id = $request->caja_id;
        $model->descuento = $request->descuento;

        $model->num_comprobante = true;
        $model->serie_comprobante = true;
        $model->fecha_hora = $fecha_hora;
        $model->impuesto = $impuesto;
        $model->save();

        $producto_id = $request->get('producto_id');
        $producto_cantidad = $request->get('producto_cantidad');

        $cont = 0;

        while ($cont < count($producto_id)) {

            $producto = Producto::select('costo_total', 'precio_venta')
                ->where('id', $producto_id[$cont])
                ->first();

            $detalle = new DetalleVenta();
            $detalle->venta_id = $model->id;
            $detalle->producto_id = $producto_id[$cont];

            $detalle->costo_producto = $producto->costo_total;
            $detalle->precio_venta = $producto->precio_venta;
            $detalle->cantidad = $producto_cantidad[$cont];
            $detalle->subtotal = $producto_cantidad[$cont] * $producto->precio_venta;
            $detalle->save();
            $cont = $cont + 1;
        }

        $data = [
            'respuesta_operacion' => true
        ];

        return response()->json($data);
    }

    public function anular($id)
    { }
}

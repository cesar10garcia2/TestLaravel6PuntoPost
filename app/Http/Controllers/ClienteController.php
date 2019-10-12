<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    function index(Request $request)
    {
        $documento_identidad = trim($request->documento_identidad);
        $nombre_completo = trim($request->nombre_completo);
        $opcion = trim($request->opcion);

        $model = null;
        if ($opcion == "top_5") {
            $model = Cliente::where('documento_identidad', "like", "%$documento_identidad%")
                ->where('nombre_completo', "like", "%$nombre_completo%")
                ->take(5)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $model = Cliente::orderBy('id', 'desc')->paginate(5);
        }

        $data = [
            'model' => $model
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:200',
            'apellido' => 'required|string|max:200',
            'celular' => 'required|string|max:12',
            'documento_identidad' => 'required|string',
            'tipo_documento_id' => 'required'
        ]);

        switch ($request->tipo_documento_id) {
            case 'DNI':
                $request->tipo_documento_id = 1;
                break;
            case 'RUC':
                $request->tipo_documento_id = 2;
                break;
            case 'PASAPORTE':
                $request->tipo_documento_id = 3;
                break;
            default:
                $request->tipo_documento_id;
                break;
        }

        $model = new Cliente();
        $model->nombre = $request->nombre;
        $model->apellido = $request->apellido;
        $model->nombre_completo = $request->nombre . ' ' . $request->apellido;
        $model->celular = $request->celular;
        $model->documento_identidad = $request->documento_identidad;
        $model->empresa = $request->empresa;
        $model->direccion_fiscal = $request->direccion_fiscal;
        $model->direccion_cobranza = $request->direccion_cobranza;

        $model->user_creacion_id = Auth::user()->id;
        $model->tipo_documento_id = $request->tipo_documento_id;
        $model->save();

        $data = [
            'respuesta_operacion' => true
        ];

        return response()->json($data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:200',
            'apellido' => 'required|string|max:200',
            'celular' => 'required|string|max:12',
            'documento_identidad' => 'required|string',
            'tipo_documento_id' => 'required'
        ]);

        switch ($request->tipo_documento_id) {
            case 'DNI':
                $request->tipo_documento_id = 1;
                break;
            case 'RUC':
                $request->tipo_documento_id = 2;
                break;
            case 'PASAPORTE':
                $request->tipo_documento_id = 3;
                break;
            default:
                $request->tipo_documento_id;
                break;
        }

        $model = Cliente::find($id);
        $model->nombre = $request->nombre;
        $model->apellido = $request->apellido;
        $model->nombre_completo = $request->nombre . ' ' . $request->apellido;
        $model->celular = $request->celular;
        $model->documento_identidad = $request->documento_identidad;
        $model->empresa = $request->empresa;
        $model->direccion_fiscal = $request->direccion_fiscal;
        $model->direccion_cobranza = $request->direccion_cobranza;

        $model->user_creacion_id = Auth::user()->id;
        $model->tipo_documento_id = $request->tipo_documento_id;
        $model->save();

        $data = [
            'respuesta_operacion' => true
        ];

        return response()->json($data);
    }

    function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        $data = [
            'respuesta_operacion' => true
        ];

        return response()->json($data);
    }
}

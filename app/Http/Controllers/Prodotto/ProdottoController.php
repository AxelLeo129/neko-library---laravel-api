<?php

namespace App\Http\Controllers\Prodotto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodotto;

class ProdottoController extends Controller
{
    public function list(Request $request) {
        try {
            $ordinato_da = $request->query('order_by');
            $campo_ricerca = $request->query('search_field');
            $valore_ricerca = $request->query('search_value');
            $limite = $request->query('limit');
            $prodotti = empty($request->query('order_by')) ? Prodotto::orderBy($ordinato_da, 'desc')->paginate($limite) : Prodotto::orderBy($ordinato_da, 'desc')->where($campo_ricerca, $valore_ricerca)->paginate($limite);
            return response($prodotti, 200);
        } catch (\Exception $e) {
            return response(['result' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }

    public function verifyRoute($ruta) {
        try {
            $prodotto = Prodotto::where('rotta', $ruta)->first();
            return response($prodotto ? $prodotto : ["mensaje" => "No encontrado"], 200);
        } catch (\Exception $e) {
            return response(['result' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }

}

<?php


namespace App\Http\Controllers;


use App\TipoConsultor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TipoConsultorController extends Controller
{
    /**
     * Retorna todas os tipos de consultor
     * cadastrados
     *
     * @return TipoConsultor[]|Collection
     */
    public function index(){
        return TipoConsultor::all();
    }

    /**
     * Retorna um tipo de consultor pelo
     * código
     *
     * @param int $codTipoConsultor
     * @return mixed
     */
    public function show(int $codTipoConsultor){
        return TipoConsultor::find($codTipoConsultor);
    }

    /**
     * Cadastra um novo tipo consultor
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $tipo = $this->validate($request, TipoConsultor::$rules);

        TipoConsultor::create($tipo);
        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um tipo consultor
     *
     * @param Request $request
     * @param $codTipoConsultor
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codTipoConsultor){
        $this->validate($request, TipoConsultor::$rules);

        $tipo = TipoConsultor::findOrFail($codTipoConsultor);
        $tipo->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um tipo consultor
     *
     * @param int $codTipoConsultor
     * @return JsonResponse
     */
    public function destroy(int $codTipoConsultor){
        TipoConsultor::destroy($codTipoConsultor);
        return response()->json(['success' => true]);
    }
}

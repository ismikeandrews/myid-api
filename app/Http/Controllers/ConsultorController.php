<?php


namespace App\Http\Controllers;


use App\Consultor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultorController extends Controller
{
    /**
     * Retorna todas os consultores
     * cadastrados
     *
     * @return Consultor[]|Collection
     */
    public function index(){
        return Consultor::all();
    }

    /**
     * Retorna um consultor pelo
     * código
     *
     * @param int $codConsultor
     * @return mixed
     */
    public function show(int $codConsultor){
        return Consultor::find($codConsultor);
    }

    /**
     * Cadastra um novo consultor
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $consultor = $this->validate($request, Consultor::$rules);

        Consultor::create($consultor);
        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um consultor
     *
     * @param Request $request
     * @param $codConsultor
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codConsultor){
        $this->validate($request, Consultor::$rules);

        $consultor = Consultor::findOrFail($codConsultor);
        $consultor->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um consultor
     *
     * @param int $codConsultor
     * @return JsonResponse
     */
    public function destroy(int $codConsultor){
        Consultor::destroy($codConsultor);
        return response()->json(['success' => true]);
    }
}

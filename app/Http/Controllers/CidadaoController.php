<?php


namespace App\Http\Controllers;


use App\Cidadao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CidadaoController extends Controller
{
    /**
     * Retorna todos os cidadãos
     * cadastrados
     *
     * @return Cidadao[]|Collection
     */
    public function index(){
        return Cidadao::all();
    }

    /**
     * Retorna um cidadão pelo
     * código
     *
     * @param int $codCidadao
     * @return mixed
     */
    public function show(int $codCidadao){
        return Cidadao::find($codCidadao);
    }

    /**
     * Cadastra um novo cidadão
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $candidato = $this->validate($request, Cidadao::$rules);

        Cidadao::create($candidato);

        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um cidadão
     *
     * @param Request $request
     * @param $codCidadao
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codCidadao){
        $this->validate($request, Cidadao::$rules);

        if ( property_exists($request, 'codUsuario') ) {
            unset($request->codUsuario);
        }

        $cidadao = Cidadao::findOrFail($codCidadao);
        $cidadao->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um cidadão
     *
     * @param int $codCidadao
     * @return JsonResponse
     */
    public function destroy(int $codCidadao){
        Cidadao::destroy($codCidadao);

        return response()->json(['success' => true]);
    }
}

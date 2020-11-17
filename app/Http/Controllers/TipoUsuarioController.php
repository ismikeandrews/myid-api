<?php


namespace App\Http\Controllers;


use App\TipoUsuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Retorna todos os tipos de
     * usuário cadastrados no sistema
     *
     * @return TipoUsuario[]|Collection
     */
    public function index(){
        return TipoUsuario::all();
    }

    /**
     * Retorna um tipo de usuário específico
     *
     * @param $codTipoUsuario
     * @return mixed
     */
    public function show($codTipoUsuario){
        return TipoUsuario::find($codTipoUsuario);
    }

    /**
     * Cria um novo tipo de usuário
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $tipo = $this->validate($request, TipoUsuario::$rules);
        TipoUsuario::create($tipo);

        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um tipo de usuário
     *
     * @param Request $request
     * @param $codTipoUsuario
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $codTipoUsuario){
        $this->validate($request, TipoUsuario::$rules);

        $tipo = TipoUsuario::findOrFail($codTipoUsuario);
        $tipo->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um tipo de usuário
     *
     * @param $codTipoUsuario
     * @return JsonResponse
     */
    public function destroy($codTipoUsuario){
        TipoUsuario::destroy($codTipoUsuario);
        return response()->json(['success' => true]);
    }
}

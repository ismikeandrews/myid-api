<?php


namespace App\Http\Controllers;


use App\Funcionario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FuncionarioController extends Controller
{
    /**
     * Retorna todos os funcionários cadastrados
     *
     * @return Funcionario[]|Collection
     */
    public function index(){
        return Funcionario::all();
    }

    /**
     * Retorna um funcionário específico
     * pelo código
     *
     * @param int $codFuncionario
     * @return mixed
     */
    public function show(int $codFuncionario){
        return Funcionario::find($codFuncionario);
    }

    /**
     * Adiciona um novo funcionário
     *
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request){
        $funcionario = $this->validate($request, Funcionario::$rules);

        Funcionario::create($funcionario);

        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um funcionário
     *
     * @param Request $request
     * @param int $codFuncionario
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codFuncionario){
        $this->validate($request, Funcionario::$rules);

        $funcionario = Funcionario::findOrFail($codFuncionario);

        if ( property_exists($request, 'codUsuario') ) {
            unset($request->codUsuario);
        }

        $funcionario->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um funcionário
     *
     * @param int $codFuncionario
     * @return JsonResponse
     */
    public function destroy(int $codFuncionario){
        Funcionario::destroy($codFuncionario);

        return response()->json(['success' => true]);
    }
}

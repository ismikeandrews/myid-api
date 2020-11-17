<?php


namespace App\Http\Controllers;


use App\Documento;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DocumentoController extends Controller
{
    /**
     * Retorna todas os documentos
     * cadastrados
     *
     * @return Documento[]|Collection
     */
    public function index(){
        return Documento::all();
    }

    /**
     * Retorna um documento pelo
     * código
     *
     * @param int $codDocumento
     * @return mixed
     */
    public function show(int $codDocumento){
        return Documento::find($codDocumento);
    }

    /**
     * Cadastra um novo documento
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $documento = $this->validate($request, Documento::$rules);

        Documento::create($documento);
        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um documento
     *
     * @param Request $request
     * @param $codDocumento
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codDocumento){
        $this->validate($request, Documento::$rules);

        $documento = Documento::findOrFail($codDocumento);
        $documento->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um documento
     *
     * @param int $codDocumento
     * @return JsonResponse
     */
    public function destroy(int $codDocumento){
        Documento::destroy($codDocumento);
        return response()->json(['success' => true]);
    }
}

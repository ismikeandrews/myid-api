<?php


namespace App\Http\Controllers;


use App\DocumentoCampo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DocumentoCampoController extends Controller
{
    /**
     * Retorna todas os campos de documentos
     * cadastrados
     *
     * @return DocumentoCampo[]|Collection
     */
    public function index(){
        return DocumentoCampo::all();
    }

    /**
     * Retorna um campo de documento pelo
     * código
     *
     * @param int $codDocumentoCampo
     * @return mixed
     */
    public function show(int $codDocumentoCampo){
        return DocumentoCampo::find($codDocumentoCampo);
    }

    /**
     * Adiciona um novo campo a um documento
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $campo = $this->validate($request, DocumentoCampo::$rules);

        DocumentoCampo::create($campo);
        return response()->json(['success' => true]);
    }

    /**
     * Atualiza um campo de um documento
     *
     * @param Request $request
     * @param $codDocumentoCampo
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codDocumentoCampo){
        $this->validate($request, DocumentoCampo::$rules);

        $campo = DocumentoCampo::findOrFail($codDocumentoCampo);
        $campo->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um campo de um documento
     *
     * @param int $codDocumentoCampo
     * @return JsonResponse
     */
    public function destroy(int $codDocumentoCampo){
        DocumentoCampo::destroy($codDocumentoCampo);
        return response()->json(['success' => true]);
    }
}

<?php


namespace App\Http\Controllers;


use App\DocumentoCampoOpcao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DocumentoCampoOpcaoController extends Controller
{
    /**
     * Retorna todas as opções de campos de documentos
     * cadastrados
     *
     * @return DocumentoCampoOpcao[]|Collection
     */
    public function index(){
        return DocumentoCampoOpcao::all();
    }

    /**
     * Retorna uma opção de um campo de documento pelo
     * código
     *
     * @param int $codDocumentoCampoOpcao
     * @return mixed
     */
    public function show(int $codDocumentoCampoOpcao){
        return DocumentoCampoOpcao::find($codDocumentoCampoOpcao);
    }

    /**
     * Adiciona uma nova opção a um campo
     * de um documento
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $opcao = $this->validate($request, DocumentoCampoOpcao::$rules);

        DocumentoCampoOpcao::create($opcao);
        return response()->json(['success' => true]);
    }

    /**
     * Atualiza uma opção de um campo
     * de um documento
     *
     * @param Request $request
     * @param $codDocumentoCampoOpcao
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $codDocumentoCampoOpcao){
        $this->validate($request, DocumentoCampoOpcao::$rules);

        $opcao = DocumentoCampoOpcao::findOrFail($codDocumentoCampoOpcao);
        $opcao->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Exclui uma opção de um campo
     * de um documento
     *
     * @param int $codDocumentoCampoOpcao
     * @return JsonResponse
     */
    public function destroy(int $codDocumentoCampoOpcao){
        DocumentoCampoOpcao::destroy($codDocumentoCampoOpcao);
        return response()->json(['success' => true]);
    }
}

<?php


namespace App\Http\Controllers;


use App\DocumentoCidadao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DocumentoCidadaoController extends Controller
{
    /**
     * Retorna todos os documentos de cidadãos
     * cadastrados no sistema
     *
     * @return DocumentoCidadao[]|Collection
     */
    public function index(){
        return DocumentoCidadao::all();
    }

    /**
     * Retorna um documento específico
     * de um cidadão
     *
     * @param $codDocumentoCidadao
     * @return mixed
     */
    public function show($codDocumentoCidadao){
        return DocumentoCidadao::find($codDocumentoCidadao);
    }

    /**
     * Adiciona um novo documento a um cidadão
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $documento = $this->validate($request, DocumentoCidadao::$rules);
        DocumentoCidadao::create($documento);

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um documento de um cidadão
     *
     * @param $codDocumentoCidadao
     * @return JsonResponse
     */
    public function destroy($codDocumentoCidadao){
        DocumentoCidadao::destroy($codDocumentoCidadao);

        return response()->json(['success' => true]);
    }
}

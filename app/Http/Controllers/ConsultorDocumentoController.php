<?php


namespace App\Http\Controllers;


use App\ConsultorDocumento;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ConsultorDocumentoController extends Controller
{
    /**
     * Retorna todos os documentos de consultores
     * cadastrados no sistema
     *
     * @return ConsultorDocumento[]|Collection
     */
    public function index(){
        return ConsultorDocumento::all();
    }

    /**
     * Retorna um documento específico
     * de um consultor
     *
     * @param $codConsultorDocumento
     * @return mixed
     */
    public function show($codConsultorDocumento){
        return ConsultorDocumento::find($codConsultorDocumento);
    }

    /**
     * Adiciona um novo documento a um consultor
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $documento = $this->validate($request, ConsultorDocumento::$rules);
        ConsultorDocumento::create($documento);

        return response()->json(['success' => true]);
    }

    /**
     * Exclui um documento de um consultor
     *
     * @param $codConsultorDocumento
     * @return JsonResponse
     */
    public function destroy($codConsultorDocumento){
        ConsultorDocumento::destroy($codConsultorDocumento);

        return response()->json(['success' => true]);
    }
}

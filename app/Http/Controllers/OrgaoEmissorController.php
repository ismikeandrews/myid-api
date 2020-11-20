<?php


namespace App\Http\Controllers;


use App\OrgaoEmissor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrgaoEmissorController extends Controller
{
    /**
     * Retorna todos os órgão emissores
     * cadastrados no sistema
     *
     * @return OrgaoEmissor[]|Collection
     */
    public function index(){
        return OrgaoEmissor::all();
    }

    /**
     * Retorna um órgão emissor específico
     *
     * @param int $codOrgaoEmissor
     * @return mixed
     */
    public function show(int $codOrgaoEmissor){
        return OrgaoEmissor::find($codOrgaoEmissor);
    }

    public function store(Request $request){
        $orgaoEmissor = $this->validate($request, OrgaoEmissor::$rules);

        OrgaoEmissor::create($orgaoEmissor);

        return response()->json(['success' => true]);
    }
}

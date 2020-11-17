<?php


namespace App\Http\Controllers;


use App\OrgaoEmissor;
use Illuminate\Database\Eloquent\Collection;

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
}

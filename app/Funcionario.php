<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table	  = 'tbFuncionario';
    protected $primaryKey = 'codFuncionario';
    protected $fillable   = ['codUsuario', 'codOrgaoEmissor'];

    public static $rules  = [
        'codUsuario'      => 'required|integer',
        'codOrgaoEmissor' => 'required|integer'
    ];

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'codUsuario', 'codUsuario');
    }

    public function OrgaoEmissor(){
        return $this->belongsTo(OrgaoEmissor::class, 'codOrgaoEmissor', 'codOrgaoEmissor');
    }
}

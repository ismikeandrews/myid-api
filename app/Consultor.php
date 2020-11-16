<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Consultor extends Model
{
    protected $table	  = 'tbConsultor';
    protected $primaryKey = 'codConsultor';
    protected $fillable   = ['nomeConsultor', 'cnpjConsultor', 'codTipoConsultor'];

    public static $rules  = [
        'nomeConsultor'    => 'required|max:100|string|unique:tbconsultor',
        'cnpjConsultor'    => 'required|size:14|unique:tbconsultor',
        'codTipoConsultor' => 'required|integer'
    ];

    public function TipoConsultor(){
        return $this->hasOne(TipoConsultor::class, 'codTipoConsultor', 'codTipoConsultor');
    }
}

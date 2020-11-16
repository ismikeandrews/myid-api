<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class ConsultorDocumento extends Model
{
    protected $table	  = 'tbConsultorDocumento';
    protected $primaryKey = 'codConsultorDocumento';
    protected $fillable   = ['codConsultor', 'codDocumento'];

    public static $rules  = [
        'codConsultor' => 'required|integer',
        'codDocumento' => 'required|integer',
    ];

    public function Consultor(){
        return $this->belongsTo(Consultor::class, 'codConsultor', 'codConsultor');
    }

    public function Documento(){
        return $this->hasOne(Documento::class, 'codDocumento', 'codDocumento');
    }
}

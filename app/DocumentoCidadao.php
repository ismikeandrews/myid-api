<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class DocumentoCidadao extends Model
{
    protected $table	  = 'tbDocumentoCidadao';
    protected $primaryKey = 'codDocumentoCidadao';
    protected $fillable   = ['frenteDocumentoCidadao', 'versoDocumentoCidadao', 'codDocumento', 'codCidadao'];

    public static $rules  = [
        'frenteDocumentoCidadao' => 'required|string',
        'versoDocumentoCidadao'  => 'required|string',
        'codDocumento'           => 'required|integer',
        'codCidadao'             => 'required|integer'
    ];

    public function Cidadao(){
        return $this->belongsTo(Cidadao::class, 'codCidadao', 'codCidadao');
    }

    public function Documento(){
        return $this->hasOne(Documento::class, 'codDocumento', 'codDocumento');
    }
}

<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class DocumentoCampo extends Model
{
    protected $table	  = 'tbDocumentoCampo';
    protected $primaryKey = 'codDocumentoCampo';
    protected $fillable   = ['nomeCampo', 'tipoCampo', 'codDocumento'];

    public static $rules  = [
        'nomeCampo'    => 'required|string|max:100',
        'tipoCampo'    => 'required|string|max:20',
        'codDocumento' => 'required|integer'
    ];

    public function Documento(){
        return $this->belongsTo(Documento::class, 'codDocumento', 'codDocumento');
    }
}

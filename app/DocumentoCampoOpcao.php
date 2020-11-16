<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class DocumentoCampoOpcao extends Model
{
    protected $table	  = 'tbDocumentoCampoOpcao';
    protected $primaryKey = 'codDocumentoCampoOpcao';
    protected $fillable   = ['nomeOpcao', 'valorOpcao', 'codDocumentoCampo'];

    public static $rules  = [
        'nomeOpcao'         => 'required|string|max:100',
        'valorOpcao'        => 'required|string|max:100',
        'codDocumentoCampo' => 'required|integer'
    ];

    public function DocumentoCampo(){
        return $this->belongsTo(DocumentoCampo::class, 'codDocumentoCampo', 'codDocumentoCampo');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use App\Models\Livro;

class Emprestimo extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emprestimos';

    public function contato(){
        return $this->belongsTo(Contato::class);
    }

    public function livro(){
        return $this->belongsTo(Livro::class);
    }
}

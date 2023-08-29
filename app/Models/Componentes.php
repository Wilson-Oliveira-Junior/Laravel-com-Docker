<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;

    public function formatacaoMascaraDinheiroDecimal($valorParaFormatar){
        $dados = str_replace('.', '', $valorParaFormatar);
        $dados = str_replace(',', '.', $dados);
        return $dados;
    }
}

<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venda::create([
                'numero_da_venda'=>1,
                'produto_id'=>3,
                'cliente_id'=>1,
            ]
        );
        Venda::create([
                'numero_da_venda'=>2,
                'produto_id'=>7,
                'cliente_id'=>4,
            ]
        );
    }
}

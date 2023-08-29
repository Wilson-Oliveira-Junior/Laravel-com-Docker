<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Produto::create([
            'nome'=>'Coca',
            'valor'=>'20.00'
        ]);
        Produto::create([
            'nome'=>'Fanta',
            'valor'=>'15.00'
        ]);
        Produto::create([
            'nome'=>'Sukita',
            'valor'=>'14.00'
        ]);
        Produto::create([
            'nome'=>'Mogi',
            'valor'=>'13.00'
        ]);
        Produto::create([
            'nome'=>'Pepsi',
            'valor'=>'1.00'
        ]);

    }
}

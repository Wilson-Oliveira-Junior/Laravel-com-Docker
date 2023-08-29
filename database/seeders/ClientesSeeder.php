<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome'=>'Bruno Dias',
            'email'=>'bruno.dias@gmail.com',
            'endereco'=>'rua 2',
            'logradouro'=>'rua 2',
            'cep'=>'13832216',
            'bairro'=>'dona irma',
        ]);
        Cliente::create([
            'nome'=>'Bruno Dias2',
            'email'=>'bruno.dias2@gmail.com',
            'endereco'=>'rua 2',
            'logradouro'=>'rua 2',
            'cep'=>'13832216',
            'bairro'=>'dona irma',
        ]);
        Cliente::create([
            'nome'=>'Bruno Dias3',
            'email'=>'bruno.dias3@gmail.com',
            'endereco'=>'rua 2',
            'logradouro'=>'rua 2',
            'cep'=>'13832216',
            'bairro'=>'dona irma',
        ]);
        Cliente::create([
            'nome'=>'Bruno Dias4',
            'email'=>'bruno.dias4@gmail.com',
            'endereco'=>'rua 23',
            'logradouro'=>'rua 23',
            'cep'=>'13832213',
            'bairro'=>'dona irma3',
        ]);
        Cliente::create([
            'nome'=>'Bruno Dias5',
            'email'=>'bruno.dias5@gmail.com',
            'endereco'=>'rua 23',
            'logradouro'=>'rua 23',
            'cep'=>'13832213',
            'bairro'=>'dona irma3',
        ]);

    }
}

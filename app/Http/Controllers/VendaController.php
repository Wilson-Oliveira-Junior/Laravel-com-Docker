<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;


class VendaController extends Controller
{
    private $venda;

    public function __construct(Venda $venda){
        $this->venda = $venda;
    }
    public function index(Request $request){
        
        $pesquisar = $request->pesquisar;
        $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    public function delete(Request $request){
        
        $id = $request->id;
        $buscaRegistro = Venda::find($id);
        $buscaRegistro->delete();

        return response()->json(['success'=>true]);
    }

    public function cadastrarVenda(FormRequestVenda $request){
        if($request->method() == 'POST'){
            $data = $request->all();
            Venda::create($data);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('vendas.index');
        }
        $findNumeracao = Venda::max('numero_da_venda')+1;
        $findCliente = Cliente::all();
        $findProduto = Produto::all();
        return view('pages.vendas.create', compact('findNumeracao', 'findCliente', 'findProduto'));
    }

    public function enviaEmailComprovantePorEmail($id){
        $findVenda = Venda::find($id);
        $clienteEmail = $findVenda->Cliente->email;
        $clienteNome = $findVenda->Cliente->nome;
        $produtoNome = $findVenda->Produto->nome;
        $produtoValor = $findVenda->Produto->valor;
        
        $sendMailData = [
            'clienteEmail'=>$clienteEmail,
            'clienteNome'=>$clienteNome,
            'produtoNome'=>$produtoNome,
            'produtoValor'=>$produtoValor,
        ];
        Mail::to($findVenda->Cliente->email)->send(new ComprovanteDeVendaEmail($sendMailData));
        Toastr::success('Email enviado com sucesso');
        return redirect()->route('vendas.index');
    }
}

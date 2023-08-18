<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    private $venda;

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findVendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.vendas.paginacao',compact('findVendas') );
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Venda::find($id);
        $buscaRegistro->delete();
        return response()->json(['sucess'=> true]);
    }

    public function cadastrarProduto(FormRequestVenda $request)
    {
        if($request->method() == "POST"){
            
            $data = $request->all();
            Venda::create($data);

            Toastr::success('Gravado com sucesso');

            return redirect()->route('venda.index');
        }
        return view('pages.vendas.create');
    }
}

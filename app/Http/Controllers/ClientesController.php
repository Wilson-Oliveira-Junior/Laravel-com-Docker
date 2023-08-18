<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(FormRequestClientes $request)
    {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.clientes.paginacao',compact('findCliente') );
    }

    public function delete(FormRequestClientes $request)
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        return response()->json(['sucess'=> true]);
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if($request->method() == "POST"){
            
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Cliente::create($data);

            Toastr::success('Gravado com sucesso');

            return redirect()->route('cliente.index');
        }
        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request, $id)
    {
        if($request->method() == "PUT"){
            
            $data = $request->all();
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('cliente.index');
        }
        $findCliente = Cliente::where('id', '=', $id)->first();
        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}

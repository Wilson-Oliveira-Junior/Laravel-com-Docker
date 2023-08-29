@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar nova Venda</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Numeração</label>
            <input type="text" value="{{ $findNumeracao }}" readonly class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda">
            @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback">{{$errors->first('numero_da_venda')}}</div>   
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Produto</label>
            <select name="produto_id" class="form-select @error('produto_id') is-invalid @enderror">
                <option selected value="" class="form-control">--Selecionar--</option>
                @foreach ($findProduto as $produto)
                    <option value="{{$produto->id}}" class="form-control">{{$produto->nome}}</option>
                @endforeach
                @if ($errors->has('produto_id'))
                    <div class="invalid-feedback">{{$errors->first('produto_id')}}</div>   
                @endif
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Cliente</label>
            <select name="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror">
                <option selected value="" class="form-control">--Selecionar--</option>
                @foreach ($findCliente as $cliente)
                    <option value="{{$cliente->id}}" class="form-control">{{$cliente->nome}}</option>
                @endforeach
                @if ($errors->has('cliente_id'))
                    <div class="invalid-feedback">{{$errors->first('cliente_id')}}</div>   
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@endsection

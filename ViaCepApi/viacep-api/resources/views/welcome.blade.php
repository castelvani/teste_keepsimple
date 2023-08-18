<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel fetch CEP</title>

</head>

<body>
    <form method="GET" action="/cep">
        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep">
        <button>Buscar</button>
    </form>
    <div>
        Para buscar mais de um CEP, digite os CEPs separando por ponto e virgula ;
    </div>
    @if(isset($cepsInfo))
    <table border="1">
        <tr>
            <th>Cep</th>
            <th>Logradouro</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Localidade</th>
            <th>UF</th>
            <th>IBGE</th>
            <th>GIA</th>
            <th>DDD</th>
            <th>SIAFI</th>
        </tr>
        @foreach($cepsInfo as $cep)
        @if(isset($cep->erro))
        <tr>
            <td colspan="10" style="text-align: center;">Cep não encontrado</td>
        </tr>
        @elseif(isset($cep->cep))
        <tr>
            <td>{{$cep->cep}}</td>
            <td>{{$cep->logradouro}}</td>
            <td>{{$cep->complemento}}</td>
            <td>{{$cep->bairro}}</td>
            <td>{{$cep->localidade}}</td>
            <td>{{$cep->uf}}</td>
            <td>{{$cep->ibge}}</td>
            <td>{{$cep->gia}}</td>
            <td>{{$cep->ddd}}</td>
            <td>{{$cep->siafi}}</td>
        </tr>
        @endif
        @endforeach
    </table>
    <a href="/">
        <button>Limpar tabela</button>
    </a>
    <form method="GET" action="/cep/export">
        <input type="hidden" name="cepsInfo" value="{{json_encode($cepsInfo)}}">
        <button>Exportar CSV</button>
    </form>
    @endif
</body>

</html>
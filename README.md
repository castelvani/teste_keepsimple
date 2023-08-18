# teste_keepsimple
teste_keepsimple

# Fetch js
Ao carregar a página uma requisição assíncrona é disparada via fetch para a API do Viacep, a requisição devolve uma promise que é resolvida exibindo os dados retornados

# Github Api
Ao clicar na busca, uma requisição GET é enviada para a rota /github/user na controller RetrieveUser para a função find, onde um cURL é feito na api do github trazendo os dados do usuário que são retornados para view

# Viacep Api
Ao clicar na busca, uma requisição GET é enviada para a rota /cep na controller RetrieveCeps para a função find, onde um cURL é feito na api do viacep trazendo os dados do CEP que são retornados para view montando uma tabela.
Ao clicar em limpar tabela a página é recarregada retirando da memória os dados retornado pela api
Ao clicar em exportar csv, uma requisição GET é enviada para a rota /cep/export na controller RetrieveCeps para a função exportCsv, onde os dados da tabela são enviados como json para a controller que recebe o request e converte de json para array, após a conversão é utilizado a função nativa do php fputcsv para exportar os dados via stream como um arquivo csv
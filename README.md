# Weather

### Previsão do Tempo

[![Canducci Weather](http://i666.photobucket.com/albums/vv25/netdragoon/1447477148_Weather_zpsczx6fzr6.png)](https://packagist.org/packages/canducci/weather)

## Instalação

### Configurações

___Para aplicações Laravel, configure dessa maneira:___

Adicione em seu `composer.json` essa chave:

```PHP
"canducci/weather": "0.1.*"
```

Agora execute esse comando no seu console:

    $ composer update


Abra o arquivo `config/app.php` e adicione essa linha em suas configurações de `providers`:

	Canducci\Weather\Providers\WeatherServiceProvider::class


Para funcionar o apelido (facade) adicione essa linha em suas configurações de `aliases`:

	'Weather'   => Canducci\Weather\Facades\Weather::class


Pronto agora é só utilizar na sua aplicação `Laravel 5.*`.

###Como utilizar no Laravel

####Buscas de Cidades:

Utilizando a função `cities` para trazer as cidades mediante a informação pela sua descrição:

```PHP
$items = cities('Sao Paulo');
return $items->getJson();
```

Nesse `return` de um anotação Javascript terá o seguinte resultado:

	[
	    {
	        "Id": 244,
	        "Name": "S\u00e3o Paulo",
	        "Uf": "SP"
	    },
	    {
	        "Id": 5019,
	        "Name": "S\u00e3o Paulo das Miss\u00f5es",
	        "Uf": "RS"
	    },
	    {
	        "Id": 5020,
	        "Name": "S\u00e3o Paulo de Oliven\u00e7a",
	        "Uf": "AM"
	    },
	    {
	        "Id": 5021,
	        "Name": "S\u00e3o Paulo do Potengi",
	        "Uf": "RN"
	    }
	]

Essas cidades encontradas tem um Id que é o responsável em buscar a previsão do tempo pelo outro função, ou seja, São Paulo tem o `Id = 244`, então:

```PHP
$item = forecast(244);
return $item->getJson();

```

Ele retornar esse modelo na anotação Javascript:

	{
	    "Id": 244,
	    "City": "S\u00e3o Paulo",
	    "Uf": "SP",
	    "Update": {
	        "Short": "16\/11\/2015",
	        "Date": {
	            "date": "2015-11-16 23:00:41.000000",
	            "timezone_type": 3,
	            "timezone": "UTC"
	        }
	    },
	    "Dates": [
	        {
	            "Date": {
	                "Short": "17\/11\/2015",
	                "Date": {
	                    "date": "2015-11-17 23:00:41.000000",
	                    "timezone_type": 3,
	                    "timezone": "UTC"
	                }
	            },
	            "Iuv": 13,
	            "Min": 16,
	            "Max": 26,
	            "Time": {
	                "Sigla": "ci",
	                "Description": "Chuvas Isoladas"
	            }
	        },
	        {
	            "Date": {
	                "Short": "18\/11\/2015",
	                "Date": {
	                    "date": "2015-11-18 23:00:42.000000",
	                    "timezone_type": 3,
	                    "timezone": "UTC"
	                }
	            },
	            "Iuv": 13,
	            "Min": 20,
	            "Max": 29,
	            "Time": {
	                "Sigla": "pnt",
	                "Description": "Pancadas de Chuva a Noite"
	            }
	        },
	        {
	            "Date": {
	                "Short": "19\/11\/2015",
	                "Date": {
	                    "date": "2015-11-19 23:00:42.000000",
	                    "timezone_type": 3,
	                    "timezone": "UTC"
	                }
	            },
	            "Iuv": 13,
	            "Min": 20,
	            "Max": 31,
	            "Time": {
	                "Sigla": "pt",
	                "Description": "Pancadas de Chuva a Tarde"
	            }
	        },
	        {
	            "Date": {
	                "Short": "20\/11\/2015",
	                "Date": {
	                    "date": "2015-11-20 23:00:42.000000",
	                    "timezone_type": 3,
	                    "timezone": "UTC"
	                }
	            },
	            "Iuv": 13,
	            "Min": 20,
	            "Max": 30,
	            "Time": {
	                "Sigla": "pc",
	                "Description": "Pancadas de Chuva"
	            }
	        }
	    ]
	}	

Também pode utilizado via facade (apelidos) dessa forma:

___namespace:___
	
	use Canducci\Weather\Facades\Weather;
	use Canducci\Weather\ForecastDay;

___código:___

	Weather::cities('Sao Paulo'); 
	Weather::forecast(244); //4 datas de previsão (padrão)
	Weather::forecast(244, ForecastDay::Day4); //4 datas de previsão
	Weather::forecast(244, ForecastDay::Day7); //7 datas de previsão

A `Weather::cities('Sao Paulo')` retorna uma coleção de cidades com o seguinte layout:

___código:___

```PHP	
$items = Weather::cities('Sao Paulo');
foreach ($items as $key => $value) 
{
    echo sprintf('<p>%s %s %s</p>',
            $value->getId(), 
            $value->getName(), 
            $value->getUf());
}
```

___resultado:___

	244 São Paulo SP
	5019 São Paulo das Missões RS
	5020 São Paulo de Olivença AM
	5021 São Paulo do Potengi RN

O `Weather::forecast(244, ForecastDay::Day4)` vai retornar a previsão do tempo conforme foi solicitado:

___código:___

```PHP	
$item = Weather::forecast(244, ForecastDay::Day4);    

//Dados da cidades
echo sprintf('<p>Id: %s</p><p> Cidade: %s</p><p> Uf: %s</p>
              <p>Data última atualização: %s</p>',
            $item->getId(), 
            $item->getCity(), 
            $item->getUf(), 
            $item->getUpdated()->format('d/m/Y'));

//Dados da previsões
foreach ($item->getDates() as $key => $value) 
{
    echo sprintf('<p>Data: %s</p><p>IUV: %s</p><p>Minima: %s</p>
                  <p>Maxima: %s</p><p>Status: %s - %s</p>', 
        $value->getDate()->format('d/m/Y'),
        $value->getIuv(), 
        $value->getMin(),
        $value->getMax(),
        $value->getTime()->getSigla(),
        $value->getTime()->getDescription());
}

```

___resultado:___

####Dados da cidades
	Id: 244

	Cidade: São Paulo

	Uf: SP

	Data última atualização: 16/11/2015

####Dados da previsões

	Data: 17/11/2015

	IUV: 13

	Minima: 16

	Maxima: 26

	Status: ci - Chuvas Isoladas


	Data: 18/11/2015

	IUV: 13

	Minima: 20

	Maxima: 29

	Status: pnt - Pancadas de Chuva a Noite


	Data: 19/11/2015

	IUV: 13

	Minima: 20

	Maxima: 31

	Status: pt - Pancadas de Chuva a Tarde


	Data: 20/11/2015

	IUV: 13

	Minima: 20

	Maxima: 30

	Status: pc - Pancadas de Chuva

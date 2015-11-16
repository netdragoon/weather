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

Essas cidades encontradas tem um Id que é o responsável em buscar a previsão do tempo pelo outro método ou seja São Paulo tem o `Id = 244`, então:

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
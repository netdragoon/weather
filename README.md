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

	`Canducci\Weather\Providers\WeatherServiceProvider::class`


Para funcionar o apelido (facade) adicione essa linha em suas configurações de `aliases`:

	'Weather'   => Canducci\Weather\Facades\Weather::class,


Pronto agora é só utilizar na sua aplicação Laravel 5.*	
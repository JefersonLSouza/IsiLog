# IsiLog

[![Maintainer](http://img.shields.io/badge/maintainer-@Jeferso28179293-blue.svg?style=flat-square)](https://twitter.com/Jeferso28179293)
[![Source Code](http://img.shields.io/badge/source-jeferson-lsouza/isilog-blue.svg?style=flat-square)](https://github.com/jeferson-lsouza/isilog)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/jeferson-lsouza/isilog.svg?style=flat-square)](https://packagist.org/packages/jeferson-lsouza/isilog)
[![Latest Version](https://img.shields.io/github/release/jeferson-lsouza/isilog.svg?style=flat-square)](https://github.com/jeferson-lsouza/isilog/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/jeferson-lsouza/isilog.svg?style=flat-square)](https://scrutinizer-ci.com/g/jeferson-lsouza/isilog)
[![Quality Score](https://img.shields.io/scrutinizer/g/jeferson-lsouza/isilog.svg?style=flat-square)](https://scrutinizer-ci.com/g/jeferson-lsouza/isilog)
[![Total Downloads](https://img.shields.io/packagist/dt/jeferson-lsouza/isilog.svg?style=flat-square)](https://packagist.org/packages/jeferson-lsouza/isilog)

###### IsiLog
IsiLog is a set of classes developed for the structured creation of simple Log.
IsiLog é um conjunto de classes desenvolvidas para a criação estruturada de Log simples.


### Highlights

- Simple installation (Instalação simples)
- Easy structuring and application (Fácil estruturação e aplicação)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"jeferson-lsouza/isilog": "dev-master"
```

or run

```bash
composer require jeferson-lsouza/isilog
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:
``

#### Structured Log (Call): Call to a structure defined with user, email, status and level of access and the name of the session.

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

$log = new \Developers\Log();
$log -> LogCreate(
    "Login",
    "Success",
    ["usuario" => "Jeferson L. Souza", 
    "email" => "contato@interligsolucoes.com.br", 
    "perfil"=> "Administrativo",
    "sessao"=>"Logado"]
);

```
#### Build custom log (Call) - You build your own structure with information for the log.:
```php
<?php

require __DIR__ . "/../vendor/autoload.php";

 $data = "
        URL: ".__DIR__."
        IP: {$_SERVER['REMOTE_ADDR']}
        BROWSER: {$_SERVER['HTTP_USER_AGENT']}
        PORT: {$_SERVER['REMOTE_PORT']}

        Result do {$Name}:
        Usuário: Jeferson L. Souza
        E-mail: contato@interligsolucoes.com.br
        Perfil: Admin
        Sessão: Logado

        Status: success";

$log = new \Developers\Log();
$log->LogManual($Name, $data); 


```

### Others

###### All the documentation of use with practical examples is available in the examples folder library. Please check there.

Toda documentação de uso com exemplos práticos está disponível na pasta examples desta biblioteca. Por favor, consulte lá.

## Contributing

Please see [CONTRIBUTING](https://github.com/jeferson-lsouza/isilog/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email contato@interligsolucoes.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para contato@interligsolucoes.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Jeferson L. Souza](https://github.com/JefersonLSouza) (Developer)
- [Soluções Inteligentes](https://github.com/jeferson-lsouza) (Team)
- [All Contributors](https://github.com/jeferson-lsouza/isilog/contributors) (Power)

## License

The MIT License (MIT). Please see [License File](https://github.com/jeferson-lsouza/isilog/blob/master/LICENSE) for more information.

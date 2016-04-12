# ACL API and interface
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
### Requirements
    PHP >= 5.5.9
    Laravel >=5.2
    Auto Loaded : [laravelcollective/html package for form & html](https://laravelcollective.com/docs/5.2/html)

## Thanks
    This package is based on @heerasheikh post :
    http://heera.it/laravel-5-1-x-acl-middleware#.Vwxunpl95TH
    with some fixes , improvment and interface 
## Installation

1.  Run
``` bash
    composer require zezont4/acl
```
2.  Add service provider & Aliases to **/config/app.php** file.
``` php
    'providers' => [
        \\ Other Providers,
        Zezont4\ACL\ACLServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
    ],

    'aliases' => [
        \\ Other Aliases,
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
    ],
```

## Credits

- [Abdulaziz Tayyer][link-author]
- [Sheikh Heera][link-heera]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/zezont4/z-acl.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zezont4/laravel-generator.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/zezont4/z-acl
[link-downloads]: https://packagist.org/packages/zezont4/z-acl
[link-author]: https://github.com/zezont4
[link-heera]: https://github.com/heera
[link-contributors]: ../../contributors

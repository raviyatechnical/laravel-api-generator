<br />
<div align="center">
  <img src="https://www.rajtechnologies.com/ui/images/raj-technologies-logo-top-panel.jpg" alt="Logo" width=120>  
<h1 align="center">Laravel API Generator</h1>
  <p align="center">
    Quickly generate rest api for your projects! with  API Response Helpers
  </p>
<br><br>
</div>

## Installation
Require the Laravel Repository Generator with composer.
```
composer require raviyatechnical/laravel-api-generator:dev-master --dev
```

## Usage
For usage take the following steps. Generate the api controller and base controller.

### Generating BaseController With Auth (Laravel Sanctum)
WARNING make you sure that file not exits it is overwrite file

Run the following command.
```
php artisan api:install --auth
```
This will generate the following files:

```
App\Http\Controllers\API\BaseController
App\Http\Controllers\API\Auth\LoginController.php
App\Http\Controllers\API\Auth\RegisterController.php
App\Http\Resources\AuthResource.php
```

### Generating BaseController Without Auth
WARNING make you sure that file not exits it is overwrite file

Run the following command.
```
php artisan api:install
```
This will generate the following files:

```
App\Http\Controllers\API\BaseController
```


### Generating API Controller
Run the following command.
```
php artisan api:controller UserController
```
This example will generate the following files:
```
App\Http\Controllers\API\UserController
```
## Tech Stack

**Server:** Laravel API


## Authors

- [@bhargavraviya](https://github.com/bhargavraviya)


## Support

For support, email raviyatechnical@gmail.com.
<!-- or join our Slack channel. -->

## 🔗 Links
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://raviyatechnical.medium.com)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/company/raviyatechnical)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/raviyatechnical)

## License

[MIT](LICENSE)


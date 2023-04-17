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

### Generating BaseController
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

# Laravel API Response Helpers

## Usage OF API Response Helpers 

Simply reference the required trait within your controller:

```php
<?php

namespace App\Http\Api\Controllers;

use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class OrdersController
{
    use ApiResponseHelpers;

    public function index(): JsonResponse
    {
        return $this->respondWithSuccess();
    }
}
```

Optionally, the trait could be imported within a base controller.

## Available methods

#### `respondNotFound(string|Exception $message, ?string $key = 'error')`

Returns a `404` HTTP status code, an exception object can optionally be passed.

#### `respondWithSuccess(array|Arrayable|JsonSerializable|null $contents = null)`

Returns a `200` HTTP status code, optionally `$contents` to return as json can be passed. By default returns `['success' => true]`.

#### `respondOk(string $message)`

Returns a `200` HTTP status code

#### `respondUnAuthenticated(?string $message = null)`

Returns a `401` HTTP status code

#### `respondForbidden(?string $message = null)`

Returns a `403` HTTP status code

#### `respondError(?string $message = null)`

Returns a `400` HTTP status code

#### `respondWithErrors(array|Arrayable|JsonSerializable|null $contents = null)`

Returns a `400` HTTP status code

#### `respondCreated(array|Arrayable|JsonSerializable|null $data = null)`

Returns a `201` HTTP status code, with response optional data

#### `respondNoContent(array|Arrayable|JsonSerializable|null $data = null)`

Returns a `204` HTTP status code, with optional response data. Strictly speaking, the response body should be empty. However, functionality to optionally return data was added to handle legacy projects. Within your own projects, you can simply call the method, omitting parameters, to generate a correct `204` response i.e. `return $this->respondNoContent()`

#### `setDefaultSuccessResponse(?array $content = null): self`

Optionally, replace the default `['success' => true]` response returned by `respondWithSuccess` with `$content`. This method can be called from the constructor (to change default for all calls), a base API controller or place when required. 

`setDefaultSuccessResponse` is a fluent method returning `$this` allows for chained methods calls:

```php
$users = collect([10, 20, 30, 40]);

return $this->setDefaultSuccessResponse([])->respondWithSuccess($users);
```

Or
```php
public function __construct()
{
    $this->setDefaultSuccessResponse([]);
}

...

$users = collect([10, 20, 30, 40]);

return $this->respondWithSuccess($users);
```


## Use with additional object types

In addition to a plain PHP `array`, the following data types can be passed to relevant methods:

- Objects implementing the Laravel `Illuminate\Contracts\Support\Arrayable` contract
- Objects implementing the native PHP `JsonSerializable` contract

This allows a variety of object types to be passed and converted automatically.

Below are a few common object types that can be passed.

#### Laravel Collections - `Illuminate\Support\Collection`

```php
$users = collect([10, 20, 30, 40]);

return $this->respondWithSuccess($users);
```

#### Laravel Eloquent Collections - `Illuminate\Database\Eloquent\Collection`

```php
$invoices = Invoice::pending()->get();

return $this->respondWithSuccess($invoices);
```

#### Laravel API Resources - `Illuminate\Http\Resources\Json\JsonResource`

This package is intended to be used **alongside** Laravel's  [API resources](https://laravel.com/docs/8.x/eloquent-resources) and in no way replaces them.

```php
$resource = PostResource::make($post);

return $this->respondCreated($resource);
```

## Motivation

Ensure consistent JSON API responses throughout an application. The motivation was primarily based on a very old inherited Laravel project. The project contained a plethora of methods/structures used to return an error:

- `response()->json(['error' => $error], 400)`
- `response()->json(['data' => ['error' => $error], 400)`
- `response()->json(['message' => $error], Response::HTTP_BAD_REQUEST)`
- `response()->json([$error], 400)`
- etc.

I wanted to add a simple trait that kept this consistent, in this case:

`$this->respondError('Ouch')`

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

# Also Use Code Of Laravel API Helper

https://github.com/f9webltd/laravel-api-response-helpers

Code Same As Path
```
src/Traits/ApiResponseHelpers.php
```

## License

[MIT](LICENSE)


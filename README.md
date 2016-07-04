Symfony API Problem
===================

## Introduction

This library supplies a Symfony 3 compatible Response class, that accepts an ApiProblem object and returns a JSON object compilant with the [Problem Details for HTTP APIs](http://tools.ietf.org/html/draft-nottingham-http-problem-06) specification.

It is based on, and uses the ApiProblem class from, the [ZF Campus `zf-api-problem`](https://github.com/zfcampus/zf-api-problem) library for Zend Framework 2.

## Installation

Run the following command to install using `composer`:

```bash
$ composer require "diegograssato/sf-api-problem:~1.0"
```

Or add the following line to your `composer.json`:

```javascript
"require": {
    "diegograssato/sf-api-problem": "~1.0"
}
```

## Usage

```php
use DTUX\ApiProblem\ApiProblem;
use DTUX\ApiProblem\ApiProblemResponse;

class FakeController
{

    public function fetch($id)
    {
        $entity = $this->service->fetch($id);

        if (!$entity) {
            return new ApiProblemResponse(new ApiProblem(404, 'Entity not found'));
        }

        return $entity;
    }
}
```

Configure listener

```yaml

services:
    you_bundle.kernel.listener.api_exception:
        class: DTUX\ApiProblem\EventListener\ApiExceptionListener
        arguments:
          - '@logger'
        tags:
          - { name: kernel.event_listener, event: kernel.exception, method: onKernelException }
```

## License

This project is released under the BSD 3-Clause license, and is based on parts of the [ZF Campus `zf-api-problem`](https://github.com/zfcampus/zf-api-problem) library for Zend Framework 2.
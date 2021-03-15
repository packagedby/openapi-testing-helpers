# OpenAPI Testing Helpers

This library is a small trait which wraps around around [osteel/openapi-httpfoundation-testing](https://github.com/osteel/openapi-httpfoundation-testing).

## Usage

You can use the `OpenApiValidation` trait in an abstract class. 
This makes the `validateOpenApiSpec` method available to classes extending the base class. 

```php
<?php

namespace Tests\Feature;

use PackagedBy\OpenApiTestingHelpers\OpenApiValidation;
use Tests\TestCase;

abstract class AbstractFeatureTest extends TestCase
{
    use OpenApiValidation;

    protected string $openApiSpecPath;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->openApiSpecPath = base_path('/path_to_spec/openapi.yaml');
    }
}
```

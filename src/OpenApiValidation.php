<?php

namespace PackagedBy\OpenApiTestingHelpers;

use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse;
use Osteel\OpenApi\Testing\ResponseValidatorBuilder;

trait OpenApiValidation
{
    public function validateOpenApiSpec(string $method, string $uri, TestResponse $response)
    {
        $path = $this->openApiSpecPath;

        if (!file_exists($path)) {
            $this->markTestSkipped('No OpenAPI spec found');

            return;
        }

        $validator = ResponseValidatorBuilder::fromYaml(file_get_contents($path))->getValidator();

        $url = parse_url($uri);
        $result = $validator->validate(Arr::get($url, 'path'), $method, $response->baseResponse);

        $this->assertTrue($result);
    }
}

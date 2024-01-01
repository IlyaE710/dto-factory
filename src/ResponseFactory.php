<?php

namespace App;

use ReflectionClass;
use ReflectionParameter;

class ResponseFactory extends ArrayFactory
{
    public function create(
        string $className,
        array $data
    ): mixed {
        $args = $this->extractArguments($className, $data);

        return new $className(...$args);
    }

    private function extractArguments(
        string $className,
        array $data
    ): array {
        $reflectionClass = new ReflectionClass($className);
        $params = $reflectionClass->getConstructor()->getParameters();

        return array_map(function ($param) use ($reflectionClass, $data) {
            return $this->getArgumentValue($param, $reflectionClass, $data);
        }, $params);
    }

    private function getArgumentValue(
        ReflectionParameter $param,
        ReflectionClass $reflectionClass,
        array $data
    ): mixed {
        $paramName = $param->getName();
        $attributes = $reflectionClass->getProperty($paramName)->getAttributes(Map::class);

        if (!empty($attributes)) {
            $path = $attributes[0]->newInstance()->path;
            $paramType = $param->getType();

            if ($paramType !== null && !$paramType->isBuiltin()) {
                $nestedClassName = $paramType->getName();
                $nestedResponse = $data[$path] ?? null;

                return $this->create($nestedClassName, $nestedResponse);
            } else {
                return $data[$path] ?? null;
            }
        }

        return null;
    }
}

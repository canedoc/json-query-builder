<?php

namespace QueryJson\ConnectionQueryJson;

use Closure;

class SqlsrvConnectionQuery extends ConnectionQuery
{
    /**
     * @inheritDoc
     */
    protected function getWhereJsonValueCompiler(): Closure
    {
        return function(string $column, string $operator): string {
            return "json_value($column, ?) $operator ?";
        };
    }

    /**
     * @inheritDoc
     */
    protected function getWhereJsonExistsCompiler(): Closure
    {
        return function(string $column): string {
            return  "json_path_exists($column, ?)";
        };
    }

    /**
     * @inheritDoc
     */
    protected function getWhereJsonIsValidCompiler(): Closure
    {
        return function(string $column): string {
            return "isjson($column)";
        };
    }
}
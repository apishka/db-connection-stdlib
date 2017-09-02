<?php

namespace Apishka\DbConnection\StdLib;

use Apishka\DbQuery\StdLib\QueryAbstract;

/**
 * Executable interface
 */

interface ExecutableInterface
{
    /**
     * Execute
     *
     * @param QueryAbstract $query
     *
     * @return mixed
     */

    public function execute(QueryAbstract $query, $flags);
}

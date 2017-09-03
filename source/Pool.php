<?php

namespace Apishka\DbConnection\StdLib;

/**
 * Pool
 */

class Manager
{
    /**
     * Traits
     */

    use \Apishka\EasyExtend\Helper\ByClassNameTrait;
    use \Apishka\Singleton\SingletonTrait;

    /**
     * Get supported names
     *
     * @return array
     */

    public function getSupportedNames()
    {
        return array(
            'db_connection',
        );
    }

    /**
     * Executers
     *
     * @var array
     */

    private $_executers = array();

    /**
     * Add executer
     *
     * @param string              $name
     * @param ExecutableInterface $connection
     *
     * @return PoolAbstract
     */

    public function add($name, ExecutableInterface $connection)
    {
        if ($this->has($name))
            throw new \LogicException('Connection ' . var_export($name, true) . ' already registered');

        $this->_executers[$name] = $connection;
    }

    /**
     * Has
     *
     * @param string $name
     *
     * @return bool
     */

    public function has($name)
    {
        return array_key_exists($name, $this->_executers);
    }

    /**
     * Get
     *
     * @param string $name
     *
     * @return ExecutableInterface
     */

    public function get($name)
    {
        return $this->_executers[$name];
    }

    /**
     * Get
     *
     * @param string $name
     *
     * @return mixed
     */

    public function __get($name)
    {
        if (!$this->has($name))
            throw new \LogicException('Object with name ' . var_export($name, true) . ' not found');

        return $this->get($name);
    }
}

<?php

namespace App\Model\Config;

interface ConfigInterface
{
    /**
     * @param string $key
     *
     * @return string|null
     */
    public function get(string $key);
}
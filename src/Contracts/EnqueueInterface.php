<?php

namespace Brisko\Contracts;

interface EnqueueInterface
{
    /**
     * Initialize instance.
     */
    public function init();

    /**
     * Enqueue.
     */
    public function enqueue();

    /**
     * Register.
     */
    public function register();
}

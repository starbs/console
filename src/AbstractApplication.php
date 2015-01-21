<?php

/*
 * This file is part of Starbs Console.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Starbs\Console;

use Orno\Di\ContainerInterface;
use Symfony\Component\Console\Application;

abstract class AbstractApplication extends Application
{
    /**
     * The application name.
     *
     * This should be overwritten by the extending class.
     *
     * @var string
     */
    protected $appName;

    /**
     * The application version.
     *
     * This should be overwritten by the extending class.
     *
     * @var string
     */
    protected $appVersion;

    /**
     * The container instance.
     *
     * @var \Orno\Di\ContainerInterface
     */
    protected $container;

    /**
     * Create a new console application instance.
     *
     * @param \Orno\Di\ContainerInterface $container
     *
     * @return void
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct($this->appName, $this->appVersion);

        $this->setup();
    }

    /**
     * Setup the application.
     *
     * This is a good place to register commands, and should be overwritten by
     * the extending class.
     *
     * @return void
     */
    abstract protected function setup();
}

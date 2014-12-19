<?php

/*
 * This file is part of Starbs Console by Graham Campbell.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
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

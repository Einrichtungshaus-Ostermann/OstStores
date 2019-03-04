<?php declare(strict_types=1);

/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Stores
 *
 * @package   OstStores
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

namespace OstStores\Listeners\Controllers;

use Enlight_Controller_Action as Controller;
use Enlight_Event_EventArgs as EventArgs;

class Frontend
{
    /**
     * ...
     *
     * @var string
     */
    protected $viewDir;
    /**
     * ...
     *
     * @var array
     */
    private $configuration;

    /**
     * ...
     *
     * @param array  $configuration
     * @param string $viewDir
     */
    public function __construct(array $configuration, $viewDir)
    {
        // set params
        $this->configuration = $configuration;
        $this->viewDir = $viewDir;
    }

    /**
     * ...
     *
     * @param EventArgs $arguments
     */
    public function onPreDispatch(EventArgs $arguments)
    {
        // get the controller
        /* @var $controller Controller */
        $controller = $arguments->get('subject');

        // get parameters
        $request = $controller->Request();
        $view = $controller->View();

        // add template dir
        $view->addTemplateDir($this->viewDir);
    }
}

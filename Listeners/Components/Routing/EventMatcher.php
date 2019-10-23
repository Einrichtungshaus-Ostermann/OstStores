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

namespace OstStores\Listeners\Components\Routing;

use Enlight_Event_EventArgs as EventArgs;

class EventMatcher
{
    /**
     * ...
     *
     * @var array
     */
    protected $configuration;

    /**
     * ...
     *
     * @var array
     */
    protected $route = [
        'controller' => 'OstStores',
        'action'     => 'locator'
    ];

    /**
     * ...
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        // set params
        $this->configuration = $configuration;
    }

    /**
     * ...
     *
     * @param EventArgs $arguments
     *
     * @return mixed
     */
    public function changeRoute(EventArgs $arguments)
    {
        // get the current path
        $path = $arguments->get('request')->getPathInfo();

        // trim the slash
        $path = ltrim($path, '/');

        // try default configuration
        if ((!empty($this->configuration['seoLocatorUrl'])) && (strtolower($path) === strtolower($this->configuration['seoLocatorUrl']))) {
            // reroute to return
            return $this->route;
        }

        // try to get via store
        $query = '
            SELECT seoUrlRedirect
            FROM ost_stores
            WHERE seoUrl LIKE ?
        ';
        $urlRedirect = (string) Shopware()->Db()->fetchOne($query, strtolower($path));

        // did we find it?!
        if (!empty($urlRedirect)) {
            // get the response object
            $response = Shopware()->Container()->get('front')->Response();

            // and set redirect
            $response->setRedirect($urlRedirect, 301);
        }

        // nothing to do
        return null;
    }
}

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

namespace OstStores\Services;

class HolidayService
{
    /**
     * ...
     *
     * @var array
     */
    private $holidays = [];

    /**
     * ...
     */
    public function __construct()
    {
        // ...
        $query = '
            SELECT *
            FROM ost_stores_holidays
            ORDER BY id ASC
        ';
        $holidays = Shopware()->Db()->fetchAll($query);

        // loop them
        foreach ($holidays as $holiday) {
            // set to this
            $this->holidays[(integer) $holiday['id']] = array(
                'name' => (string) $holiday['name'],
                'active' => ((string) $holiday['active'] === '1')
            );
        }
    }

    /**
     * ...
     *
     * @param int $year
     *
     * @return array
     */
    public function getHolidays($year = null)
    {
        // default year
        if ($year === null) {
            // set this year
            $year = (integer) date('Y');
        }

        // get every calculated date
        $dates = $this->getCalculatedHolidayDates($year);

        // every finished holiday
        $holidays = [];

        // loop every available holiday
        foreach ($this->holidays as $key => $holiday) {
            // and add the actual date for the given year
            $holidays[$key] = array_merge($holiday, ['date' => $dates[$key]]);
        }

        // return them
        return $holidays;
    }

    /**
     * ...
     *
     * @param int $year
     *
     * @return array
     */
    private function getCalculatedHolidayDates($year = 2019)
    {
        // every holiday is here
        $holidays = [];

        // calculate every holiday
        $holidays[10] = $year . '-01-01';
        $holidays[20] = $year . '-01-06';
        $holidays[30] = $year . '-03-08';
        $holidays[50] = date('Y-m-d', easter_date($year) - (48 * 86400));
        $holidays[51] = date('Y-m-d', easter_date($year) - (46 * 86400));
        $holidays[52] = date('Y-m-d', easter_date($year) - (3 * 86400));
        $holidays[53] = date('Y-m-d', easter_date($year) - (2 * 86400));
        $holidays[54] = date('Y-m-d', easter_date($year));
        $holidays[54] = date('Y-m-d', easter_date($year) + (1 * 86400));
        $holidays[60] = $year . '-05-01';
        $holidays[70] = date('Y-m-d', easter_date($year) + (40 * 86400));
        $holidays[71] = date('Y-m-d', easter_date($year) + (49 * 86400));
        $holidays[72] = date('Y-m-d', easter_date($year) + (50 * 86400));
        $holidays[73] = date('Y-m-d', easter_date($year) + (60 * 86400));
        $holidays[80] = $year . '-08-15';
        $holidays[90] = $year . '-10-03';
        $holidays[100] = $year . '-10-31';
        $holidays[110] = $year . '-11-01';
        $holidays[120] = date('Y-m-d', mktime(0, 0, 0, 12, (24 - 32 - date('w', mktime(0, 0, 0, 12, 24, $year))), $year));
        $holidays[130] = $year . '-12-24';
        $holidays[131] = $year . '-12-25';
        $holidays[132] = $year . '-12-26';
        $holidays[140] = $year . '-12-31';
        $holidays[150] = ($year + 1) . '-01-01';

        // return them
        return $holidays;
    }
}

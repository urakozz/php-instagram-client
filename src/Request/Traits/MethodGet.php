<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   H24
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Request\Traits;


trait MethodGet
{
    /**
     * Get Request Method (GET)
     *
     * @return string
     */
    public function getMethod()
    {
        return "GET";
    }
}

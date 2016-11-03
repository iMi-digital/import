<?php

/**
 * TechDivision\Import\Utils\ProductTypes
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/wagnert/csv-import
 * @link      http://www.appserver.io
 */

namespace TechDivision\Import\Utils;

/**
 * Utility class containing the product types.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/wagnert/csv-import
 * @link      http://www.appserver.io
 */
class ProductTypes
{

    /**
     * This is a utility class, so protect it against direct
     * instantiation.
     */
    private function __construct()
    {
    }

    /**
     * This is a utility class, so protect it against cloning.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Name for the column 'simple'.
     *
     * @var string
     */
    const SIMPLE = 'simple';

    /**
     * Name for the column 'bundle'.
     *
     * @var string
     */
    const BUNDLE = 'bundle';

    /**
     * Name for the column 'configurable'.
     *
     * @var string
     */
    const CONFIGURABLE = 'configurable';

    /**
     * Name for the column 'configurable'.
     *
     * @var string
     */
    const VIRTUAL = 'virtual';

    /**
     * Name for the column 'downloadable'.
     *
     * @var string
     */
    const DOWNLOADABLE = 'downloadable';
}

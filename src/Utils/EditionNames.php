<?php

/**
 * TechDivision\Import\Utils\EditionNames
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Utils;

/**
 * Utility class containing the supported Magento edition names.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import
 * @link      http://www.techdivision.com
 */
class EditionNames extends \ArrayObject implements EditionNamesInterface
{
    /**
     * Construct a new edition names instance.
     *
     * @param array $editionNames The array with the additional edition names
     * @link http://www.php.net/manual/en/arrayobject.construct.php
     */
    public function __construct(array $editionNames = array())
    {

        // merge the edition names with the passed ones
        $mergedEditionNames = array_merge(
            array(
                EditionNamesInterface::CE,
                EditionNamesInterface::EE
            ),
            $editionNames
        );

        // initialize the parent class with the merged edition names
        parent::__construct($mergedEditionNames);
    }

    /**
     * Query whether or not the passed edition name is valid.
     *
     * @param string $editionName The edition name to query for
     *
     * @return boolean TRUE if the edition name is valid, else FALSE
     */
    public function isEditionName($editionName)
    {
        return in_array($editionName, (array) $this);
    }
}

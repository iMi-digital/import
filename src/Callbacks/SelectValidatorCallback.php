<?php

/**
 * TechDivision\Import\Callbacks\SelectValidatorCallback
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
 * @link      https://github.com/techdivision/import-product
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Callbacks;

/**
 * A callback implementation that validates the option values of EAV select attributes.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2019 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-product
 * @link      http://www.techdivision.com
 */
class SelectValidatorCallback extends IndexedArrayValidatorCallback
{

    /**
     * Will be invoked by the observer it has been registered for.
     *
     * @param string|null $attributeCode  The code of the attribute that has to be validated
     * @param string|null $attributeValue The attribute value to be validated
     *
     * @return mixed The modified value
     */
    public function handle($attributeCode = null, $attributeValue = null)
    {

        // explode the additional attributes
        if ($this->isNullable($attributeValue)) {
            return;
        }

        // load the validations for the attribute with the passed code
        $validations = $this->getValidations($attributeCode);

        // query whether or not the value is valid
        if (in_array($attributeValue, $validations)) {
            return;
        }

        // throw an exception if the value is NOT in the array
        throw new \InvalidArgumentException(
            sprintf('Found invalid option value "%s" for attribute with code "%s"', $attributeValue, $attributeCode)
        );
    }
}

<?php

/**
 * TechDivision\Import\Repositories\TaxClassRepository
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
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Repositories;

use TechDivision\Import\Utils\MemberNames;
use TechDivision\Import\Utils\SqlStatementKeys;
use TechDivision\Import\Dbal\Repositories\AbstractRepository;

/**
 * Repository implementation to load tax class data.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2016 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import
 * @link      http://www.techdivision.com
 */
class TaxClassRepository extends AbstractRepository implements TaxClassRepositoryInterface
{

    /**
     * Initializes the repository's prepared statements.
     *
     * @return void
     */
    public function init()
    {

        // initialize the prepared statements
        $this->taxClassesStmt =
            $this->getConnection()->prepare($this->loadStatement(SqlStatementKeys::TAX_CLASSES));
    }

    /**
     * Return's an array with the available tax classes and their
     * class names as keys.
     *
     * @return array The array with all available tax classes
     */
    public function findAll()
    {

        // initialize the array with the available tax classes
        $taxClasses = array();

        // execute the prepared statement
        $this->taxClassesStmt->execute();

        // load the available tax classes
        $availableTaxClasses = $this->taxClassesStmt->fetchAll();

        // fetch the tax classes and assemble them as array with the class name as key
        foreach ($availableTaxClasses as $taxClass) {
            $taxClasses[$taxClass[MemberNames::CLASS_NAME]] = $taxClass;
        }

        // return the array with the tax classes
        return $taxClasses;
    }
}

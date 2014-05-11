<?php
/**
 * EntityAwareTrait.php
 *
 * @date        8/05/13
 * @author      fde
 * @file        EntityAwareTrait.php
 * @copyright   Copyright (c) Foyer - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */

namespace Core\Form;

/**
 * Trait EntityAwareTrait
 *
 * @package     Application
 * @subpackage  Form
 * @author      fde
 * @copyright   Copyright (c) Foyer - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly
 *              prohibited, proprietary and confidential.
 */
trait EntityAwareTrait
{
    /**
     * @return string
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }
}

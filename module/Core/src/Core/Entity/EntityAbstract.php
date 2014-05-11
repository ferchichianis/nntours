<?php
/**
 * EntityAbstract.php
 *
 * @date        29/04/2014
 * @file        EntityAbstract.php
 */

namespace Core\Entity;

use Zend\Filter\StaticFilter;

/**
 * EntityAbstract
 */
abstract class EntityAbstract implements \ArrayAccess
{
    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        $value = null;
        $offset = StaticFilter::execute($offset, 'wordunderscoretocamelcase');
        if (\method_exists($this, 'get' . $offset)) {
            $value = $this->{'get' . $offset};
        }

        return $value !== null;
    }


    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetGet($offset)
    {
        $offset = StaticFilter::execute($offset, 'wordunderscoretocamelcase');
        if (\method_exists($this, 'get' . $offset)) {
            return $this->{'get' . $offset}();
        }

        return false;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return bool
     */
    public function offsetSet($offset, $value)
    {
        $offset = StaticFilter::execute($offset, 'wordunderscoretocamelcase');
        if (\method_exists($this, 'set' . $offset)) {
            return $this->{'set' . $offset}($value);
        }

        return false;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        $this->offsetSet($offset, null);
    }

}
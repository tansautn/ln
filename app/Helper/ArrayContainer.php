<?php
/*
         M""""""""`M            dP                     
         Mmmmmm   .M            88                     
         MMMMP  .MMM  dP    dP  88  .dP   .d8888b.     
         MMP  .MMMMM  88    88  88888"    88'  `88     
         M' .MMMMMMM  88.  .88  88  `8b.  88.  .88     
         M         M  `88888P'  dP   `YP  `88888P'     
         MMMMMMMMMMM    -*-  Created by Zuko  -*-      

         * * * * * * * * * * * * * * * * * * * * *     
         * -    - -     S.Y.M.L.I.E     - -    - *     
         * -  Copyright © 2016 (Z) Programing  - *     
         *    -  -  All Rights Reserved  -  -    *     
         * * * * * * * * * * * * * * * * * * * * *     
*/
/**
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 * @PROJECT    : X - Project [ Z-Dev ]
 * @AUTHOR     : Zuko
 * @COPYRIGHT  : © 2016 Z-Programing a.k.a Zuko
 * @LINK       : http://www.zuko.pw/
 * @FILE       : ArrayContainer.php
 * @CREATED    : 13:19 , 20/Nov/2016
 * @DETAIL     :
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 **/


namespace App\Helper;


use Illuminate\Contracts\Support\Arrayable;

/**
 * Class LoginInfoContainer
 *
 * @package App\Helper
 */
class ArrayContainer extends \ArrayObject implements Arrayable
{

    /**
     * ArrayContainer constructor.
     *
     * @param array|null  $input
     * @param int|null    $flags
     * @param string|null $iterator_class
     * @return ArrayContainer|array
     */
    public function __construct($input = [], $flags = 0, $iterator_class = 'ArrayIterator')
    {
        $this->setFlags(\ArrayObject::ARRAY_AS_PROPS);
        parent::__construct($input, $flags, $iterator_class);

        return $this;
    }

    /**
     * Allow call Array Functions with class instance
     *
     * @param $func
     * @param $argv
     * @return mixed
     * @link http://php.net/manual/en/class.arrayobject.php#107079
     */
    public function __call($func, $argv)
    {
        if (!is_callable($func) || substr($func, 0, 6) !== 'array_')
        {
            throw new \BadMethodCallException(__CLASS__.'->'.$func);
        }

        return call_user_func_array($func, array_merge([ $this->getArrayCopy() ], $argv));
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->getArrayCopy();
    }
}
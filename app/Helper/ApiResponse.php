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
 * @FILE       : ApiResponse.php
 * @CREATED    : 15:10 , 20/Nov/2016
 * @DETAIL     :
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 **/


namespace App\Helper;


/**
 * Class ApiResponse
 *
 * @package App\Helper
 */
class ApiResponse extends ArrayContainer
{
    /**
     * @var bool
     */
    public $success = true;
    /**
     * @var array|ArrayContainer|object
     */
    public $data = [];
    /**
     * @var bool|array|object
     */
    public $error = false;
    /**
     * @var mixed
     */
    public $extra;


    /**
     * ApiResponse constructor.
     *
     * @param bool  $success
     * @param array $data
     * @param bool  $error
     * @param null  $extra
     * @return ApiResponse
     */
    public function __construct($success = true, $data = [], $error = false, $extra = null)
    {
        $this->success = $success;
        $this->data = $data;
        $this->error = $error;
        $this->extra = $extra;
        parent::__construct($this);

        return $this;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     * @return ApiResponse
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return \App\Helper\ArrayContainer|array|object
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \App\Helper\ArrayContainer|array|object $data
     * @return ApiResponse
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array|bool|object
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param array|bool|object $error
     * @return ApiResponse
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $extra
     * @return ApiResponse
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

}
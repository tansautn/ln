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
 * @FILE       : SainsBurysController.php
 * @CREATED    : 12:56 , 20/Nov/2016
 * @DETAIL     :
 * --*--*--*--*--*--*--*--*--*--*--*--*--*--*--*--*-- *
 **/


namespace App\Http\Controllers\Account;


use App\Helper\ApiResponse;


/**
 * Class SainsBurysController
 *
 * @package App\Http\Controllers\Account
 */
class SainsBurysController extends AbstractAccountController
{

    public function doCheck()
    {
        $result = new ApiResponse();
        $result->setData([ 'name' => 'Zuko đẹp trai']);

        /** @noinspection PhpUndefinedMethodInspection */
        return $this->response->array($result);
    }
}
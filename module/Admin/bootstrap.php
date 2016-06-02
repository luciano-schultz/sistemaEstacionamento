<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _iniLayout()
    {
        Zend_Layout::startMvc(array(
            'layout' => 'default',
        'layoutPath' => '../application/views/scripts/layout'
        )
    );
    }
}

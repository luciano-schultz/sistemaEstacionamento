<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Entity\Repository;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Description of AbstractEntity
 *
 * @author Luciano
 */
class AbstractEntity 
{
    //put your code here
    
    public function __construct($options = null) 
    {
        if($options)
        {
            (new Hydrator\ClassMethods())->hydrate($options,$this);
        }
    }
    
}

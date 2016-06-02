<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class vaga extends Form{
   public function __construct($array1,$name=null,$options=[]) 
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post')
        ->setAttribute('class', '');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $status = new \Zend\Form\Element\Select('status');
        $status->setLabel('Status')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setValueOptions([
                    '0' => 'Livre','1' => 'Ocupado'
                    ])
                ->setAttribute('class', 'form-control ');
        $this->add($status);   
        
        $estacionamento = new \Zend\Form\Element\Select('estacionamento');
        $estacionamento->setLabel('Estacionamento')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ')
                ->setValueOptions($array1['estacionamento']);
        $this->add($estacionamento);
        
        
        $submit = new \Zend\Form\Element\Submit('my-submit');
        $submit->setValue('Salvar')
        ->setAttribute('class', 'btn btn-default btn-salvar');
        $this->add($submit);
     
    }
}

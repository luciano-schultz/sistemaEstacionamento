<?php

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class cargo extends Form{
    //put your code here
    public function __construct($name=null,$options=[]) 
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post')
        ->setAttribute('class', '');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $tipoCargo = new \Zend\Form\Element\Text('tipocargo');
        $tipoCargo->setLabel('Cargos')
                ->setLabelAttributes(['class' => 'col-md-12 label-text'])
                ->setAttribute('class', 'form-control ');
        $this->add($tipoCargo);  
        
        $submit = new \Zend\Form\Element\Submit('my-submit');
        $submit->setValue('Salvar')
        ->setAttribute('class', 'btn btn-default btn-salvar');
        $this->add($submit);
     
    }
}

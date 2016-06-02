<?php

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class login extends Form{
    //put your code here
    public function __construct($name=null,$options=[]) 
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post')
        ->setAttribute('class', '');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $nome = new \Zend\Form\Element\Text('nome');
        $nome->setLabel('Nome da Pessoa')
                ->setLabelAttributes(['class' => 'col-md-6 label-text'])
                ->setAttribute('class', 'form-control ');
        $this->add($nome);  
        
        $cpf = new \Zend\Form\Element\Text('email');
        $cpf->setLabel('Email')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cpf); 
        
        $cnh = new \Zend\Form\Element\Text('senha');
        $cnh->setLabel('Senha')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cnh); 
        
        $submit = new \Zend\Form\Element\Submit('my-submit');
        $submit->setValue('Salvar')
        ->setAttribute('class', 'btn btn-default btn-salvar');
        $this->add($submit);
     
    }
}

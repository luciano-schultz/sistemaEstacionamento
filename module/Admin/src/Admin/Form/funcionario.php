<?php

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class funcionario extends Form{
    //put your code here
    public function __construct($array1,$array2,$name=null,$options=[]) 
    {
        //print_r($array);
        //exit;
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
        
        $cpf = new \Zend\Form\Element\Text('cpf');
        $cpf->setLabel('Numero do CPF')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cpf); 
        
        $telefone = new \Zend\Form\Element\Text('telefone');
        $telefone->setLabel('Telefone')
                ->setLabelAttributes(['class' => 'col-md-3'])
                ->setAttribute('class', 'form-control ');
        $this->add($telefone); 
        
        $login = new \Zend\Form\Element\Select('login');
        $login->setLabel('Usuario')
                ->setLabelAttributes(['class' => 'col-md-3'])
                ->setAttribute('class', 'form-control ')
                ->setValueOptions($array2['login']);
        $this->add($login);
        
        $endereco = new \Zend\Form\Element\Text('endereco');
        $endereco->setLabel('Endereço')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($endereco);
        
        $cargo = new \Zend\Form\Element\Select('cargo');
        $cargo->setLabel('Cargo')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ')
                ->setValueOptions($array1['cargo']);
        $this->add($cargo); 
        
         
        
        $submit = new \Zend\Form\Element\Submit('my-submit');
        $submit->setValue('Salvar')
        ->setAttribute('class', 'btn btn-default btn-salvar');
        $this->add($submit);
     
    }
}

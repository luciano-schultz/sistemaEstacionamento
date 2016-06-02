<?php

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class carro extends Form{
    //put your code here
    public function __construct($array1,$name=null,$options=[]) 
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post')
        ->setAttribute('class', '');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);
        
        $placa = new \Zend\Form\Element\Text('placa');
        $placa->setLabel('Placa do veiculo')
                ->setLabelAttributes(['class' => 'col-md-6 '])
                ->setAttribute('class', 'form-control ');
        $this->add($placa);  
        
        $modelo = new \Zend\Form\Element\Text('modelo');
        $modelo->setLabel('Modelo do veiculo')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($modelo); 
        
        $cor = new \Zend\Form\Element\Text('cor');
        $cor->setLabel('Cor do veiculo')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cor); 
        
        $cliente = new \Zend\Form\Element\Select('cliente');
        $cliente->setLabel('Cliente')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ')
                ->setValueOptions($array1['cliente']);
        $this->add($cliente);
        
        $submit = new \Zend\Form\Element\Submit('my-submit');
        $submit->setValue('Salvar')
        ->setAttribute('class', 'btn btn-default btn-salvar');
        $this->add($submit);
     
    }
}

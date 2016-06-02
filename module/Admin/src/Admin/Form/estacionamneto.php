<?php

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class estacionamneto extends Form{
    //put your code here
    public function __construct($name=null,$options=[]) 
    {
        parent::__construct($name, $options);
        $this->setAttribute('method', 'post')
        ->setAttribute('class', '');
        
        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id); 
        
        $endereco = new \Zend\Form\Element\Text('endereco');
        $endereco->setLabel('Endereço')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($endereco);
        
        $bairro = new \Zend\Form\Element\Text('bairro');
        $bairro->setLabel('Bairro')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($bairro); 
        
        $cidade = new \Zend\Form\Element\Text('cidade');
        $cidade->setLabel('Cidade')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cidade); 
        
        $estado = new \Zend\Form\Element\Select('estado');
        $estado->setLabel('Estado')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setValueOptions([
                    '0' => 'Minas Gerais','1' => 'São Paulo','2' => 'Rio de Janeiro'
                    ])
                ->setAttribute('class', 'form-control ');
        $this->add($estado); 
        
        $submit = new \Zend\Form\Element\Submit('my-submit');
        $submit->setValue('Salvar')
        ->setAttribute('class', 'btn btn-default btn-salvar');
        $this->add($submit);
     
    }
}

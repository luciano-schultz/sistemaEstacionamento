<?php

namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class cliente extends Form{
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
        
        $cpf = new \Zend\Form\Element\Text('cpf');
        $cpf->setLabel('Numero do CPF')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cpf); 
        
        $cnh = new \Zend\Form\Element\Text('cnh');
        $cnh->setLabel('Numero da CNH')
                ->setLabelAttributes(['class' => 'col-md-6'])
                ->setAttribute('class', 'form-control ');
        $this->add($cnh); 
        
        $telefone = new \Zend\Form\Element\Text('telefone');
        $telefone->setLabel('Telefone')
                ->setLabelAttributes(['class' => 'col-md-3'])
                ->setAttribute('class', 'form-control ');
        $this->add($telefone); 
        
        $endereco = new \Zend\Form\Element\Text('endereco');
        $endereco->setLabel('Endereço')
                ->setLabelAttributes(['class' => 'col-md-5'])
                ->setAttribute('class', 'form-control ');
        $this->add($endereco);
        
        $bairro = new \Zend\Form\Element\Text('bairro');
        $bairro->setLabel('Bairro')
                ->setLabelAttributes(['class' => 'col-md-4'])
                ->setAttribute('class', 'form-control ');
        $this->add($bairro); 
        
        $cep = new \Zend\Form\Element\Text('cep');
        $cep->setLabel('CEP')
                ->setLabelAttributes(['class' => 'col-md-2'])
                ->setAttribute('class', 'form-control ');
        $this->add($cep); 
        
        $cidade = new \Zend\Form\Element\Text('cidade');
        $cidade->setLabel('Cidade')
                ->setLabelAttributes(['class' => 'col-md-5'])
                ->setAttribute('class', 'form-control ');
        $this->add($cidade); 
        
        $estado = new \Zend\Form\Element\Select('estado');
        $estado->setLabel('Estado')
                ->setLabelAttributes(['class' => 'col-md-5'])
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

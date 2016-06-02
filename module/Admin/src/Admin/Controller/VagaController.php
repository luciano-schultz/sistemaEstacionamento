<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\vaga as FormVaga;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;



class VagaController extends AbstractActionController
{

    public function indexAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Vaga');
        $req = $this->getRequest();
        
        $dados = $repo->findAll();
        
        // Numero da página a ser exibida
        $currentPage = $this->params()->fromQuery('pagina');
        // Quantidade de itens por págima
        $countPerPage = "2";
        $paginator = $repo->fetchAll($currentPage, $countPerPage,'Vaga');
        return new ViewModel(array('dados'=>$dados,'paginator' => $paginator));
    }
    
    public function inserirAction()
    {
        
        
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Vaga');
        $req = $this->getRequest();
        
        $param1['estacionamento']=$repo->getOptionSelect('Estacionamento','endereco','getEndereco');
        $formVaga = new FormVaga($param1);
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
        }else
        {
            if($id)
            {
                $vaga = $repo->find($id);
                $formVaga->setData($vaga->toArray());
            }
        }
        $dados = $repo->findAll();
        
        //$teste = new Select('vaga');
        //print("teste:".(int) $teste);
        
        
        exit;
        
        
        
        return new ViewModel(array('dados'=>$dados,'form'=>$formVaga));
    }
    
    public function editarAction()
    {
        
        
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Vaga');
        $req = $this->getRequest();
        
        $param1['estacionamento']=$repo->getOptionSelect('Estacionamento','endereco','getEndereco');
        $formVaga = new FormVaga($param1);
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            return $this->redirect()->toRoute('full-app',array('controller'=>'vaga'));
        }else
        {
            if($id)
            {
                $vaga = $repo->find($id);
                $formVaga->setData($vaga->toArray());
                
            }
        }
        $dados = $repo->findAll();
        return new ViewModel(array('dados'=>$dados,'form'=>$formVaga));
        
    }
    
    public function deleteAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Vaga');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
         
         if($repo->delete($id))
             
        return $this->redirect()->toRoute('full-app',array('controller'=>'vaga'));
    }
}

<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\cliente as FormCliente;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
 use Zend\Paginator\Paginator;


class ClienteController extends AbstractActionController
{

    public function indexAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cliente');
        $req = $this->getRequest();
        
        $dados = $repo->findAll();
        
        // Numero da página a ser exibida
        $currentPage = $this->params()->fromQuery('pagina');
        $msg = $this->params()->fromRoute('msg',false);
        // Quantidade de itens por págima
        $countPerPage = "2";
        $paginator = $repo->fetchAll($currentPage, $countPerPage,'Cliente');
        return new ViewModel(array('dados'=>$dados,'paginator' => $paginator, 'msg'=>$msg));
    }
    
    public function inserirAction()
    {
        
        $formCliente = new FormCliente();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cliente');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            
            try{
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            $dados = $repo->findAll();
            return new ViewModel(array('dados'=>$dados,'form'=>$formCliente,'msg'=>'1'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
         return new ViewModel(array('dados'=>$dados,'form'=>$formCliente,'msg'=>'4'));
         }
         
            
        }else
        {
            if($id)
            {
                $cliente = $repo->find($id);
                $formCliente->setData($cliente->toArray());
            }
        }
        $dados = $repo->findAll();
        
        
        
        
        return new ViewModel(array('dados'=>$dados,'form'=>$formCliente));
    }
    
    public function editarAction()
    {
        
        $formCliente = new FormCliente();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cliente');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            return $this->redirect()->toRoute('full-app',array('controller'=>'cliente'));
        }else
        {
            if($id)
            {
                $cliente = $repo->find($id);
                $formCliente->setData($cliente->toArray());
                
            }
        }
        $dados = $repo->findAll();
        return new ViewModel(array('dados'=>$dados,'form'=>$formCliente));
        
    }
    
    public function deleteAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cliente');
        $req = $this->getRequest();
         $id = $this->params()->fromRoute('id',false);
        
         try{
               $repo->delete($id);
               return $this->redirect()->toRoute('full-app',array('controller'=>'cliente','action'=>'index', 'msg'=>'3'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
//             echo $ex->getMessage();exit;
            return $this->redirect()->toRoute('full-app',array('controller'=>'cliente','action'=>'index', 'msg'=>'2'));
         }
       
             
        return $this->redirect()->toRoute('full-app',array('controller'=>'cliente'));
    }
}

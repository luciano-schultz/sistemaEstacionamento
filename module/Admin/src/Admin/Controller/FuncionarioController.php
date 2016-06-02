<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\funcionario as FormCliente;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
 use Zend\Paginator\Paginator;


class FuncionarioController extends AbstractActionController
{

    public function indexAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Funcionario');
        $req = $this->getRequest();
        
        $dados = $repo->findAll();
        $msg = $this->params()->fromRoute('msg',false);
        
        // Numero da página a ser exibida
        $currentPage = $this->params()->fromQuery('pagina');
        // Quantidade de itens por págima
        $countPerPage = "2";
        $paginator = $repo->fetchAll($currentPage, $countPerPage,'Funcionario');
        return new ViewModel(array('dados'=>$dados,'paginator' => $paginator, 'msg'=>$msg));
    }
    
    public function inserirAction()
    {
        
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Funcionario');
        $req = $this->getRequest();
        
        $param1['cargo']=$repo->getOptionSelect('Cargo','tipocargo','getTipocargo');
        $param2['login']=$repo->getOptionSelect('Login','nome','getNome');
        
        $formCliente = new FormCliente($param1,$param2);
        
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
                $funcionario = $repo->find($id);
                $formCliente->setData($funcionario->toArray());
            }
        }
        $dados = $repo->findAll();
        
        
        
        return new ViewModel(array('dados'=>$dados,'form'=>$formCliente));
    }
    
    public function editarAction()
    {
        
        
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Funcionario');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
         
         $param1['cargo']=$repo->getOptionSelect('Cargo','tipocargo','getTipocargo');
        $param2['login']=$repo->getOptionSelect('Login','nome','getNome');
        
        $formCliente = new FormCliente($param1,$param2);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            return $this->redirect()->toRoute('full-app',array('controller'=>'funcionario'));
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
        $repo = $em->getRepository('Admin\Entity\Funcionario');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
         
          try{
               $repo->delete($id);
               return $this->redirect()->toRoute('full-app',array('controller'=>'funcionario','action'=>'index', 'msg'=>'3'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
//             echo $ex->getMessage();exit;
            return $this->redirect()->toRoute('full-app',array('controller'=>'funcionario','action'=>'index', 'msg'=>'2'));
         }
             
        return $this->redirect()->toRoute('full-app',array('controller'=>'funcionario'));
    }
    
    
}

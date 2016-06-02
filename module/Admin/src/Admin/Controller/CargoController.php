<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\cargo as FormCargo;

class CargoController extends AbstractActionController
{
    public function indexAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cargo');
        $req = $this->getRequest();
        
        $dados = $repo->findAll();
        // Numero da página a ser exibida
        $msg = $this->params()->fromRoute('msg',false);
        $currentPage = $this->params()->fromQuery('pagina');
        // Quantidade de itens por págima
        $countPerPage = "2";
        $paginator = $repo->fetchAll($currentPage, $countPerPage,'Cargo');
        
        return new ViewModel(array('dados'=>$dados,'paginator' => $paginator, 'msg'=>$msg));
    }
    
    public function inserirAction()
    {
        
        $formCargo = new FormCargo();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cargo');
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
            return new ViewModel(array('dados'=>$dados,'form'=>$formCargo,'msg'=>'1'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
         return new ViewModel(array('dados'=>$dados,'form'=>$formCargo,'msg'=>'4'));
         }
        }else
        {
            if($id)
            {
                $cargo = $repo->find($id);
                $formCargo->setData($cargo->toArray());
            }
        }
        $dados = $repo->findAll();
        
        return new ViewModel(array('dados'=>$dados,'form'=>$formCargo));
    }
    
    public function editarAction()
    {
        
        $formCargo = new FormCargo();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cargo');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            return $this->redirect()->toRoute('full-app',array('controller'=>'cargo'));
        }else
        {
            if($id)
            {
                $cargo = $repo->find($id);
                $formCargo->setData($cargo->toArray());
                
            }
        }
        $dados = $repo->findAll();
        return new ViewModel(array('dados'=>$dados,'form'=>$formCargo));
        
    }
    
    public function deleteAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Cargo');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
         
         try{
               $repo->delete($id);
               return $this->redirect()->toRoute('full-app',array('controller'=>'cargo','action'=>'index', 'msg'=>'3'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
//             echo $ex->getMessage();exit;
            return $this->redirect()->toRoute('full-app',array('controller'=>'cargo','action'=>'index', 'msg'=>'2'));
         }
             
        return $this->redirect()->toRoute('full-app',array('controller'=>'cargo'));
    }
}

<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\login as FormLogin;

class LoginController extends AbstractActionController
{
    public function indexAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Login');
        $req = $this->getRequest();
        
        $dados = $repo->findAll();
        $msg = $this->params()->fromRoute('msg',false);
        $currentPage = $this->params()->fromQuery('pagina');
        // Quantidade de itens por págima
        $countPerPage = "2";
        $paginator = $repo->fetchAll($currentPage, $countPerPage,'Login');
        
        return new ViewModel(array('dados'=>$dados,'paginator' => $paginator, 'msg'=>$msg));
    }
    
    public function inserirAction()
    {
        
        $formLogin = new FormLogin();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Login');
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
            return new ViewModel(array('dados'=>$dados,'form'=>$formLogin,'msg'=>'1'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
         return new ViewModel(array('dados'=>$dados,'form'=>$formLogin,'msg'=>'4'));
         }
        }else
        {
            if($id)
            {
                $login = $repo->find($id);
                $formLogin->setData($login->toArray());
            }
        }
        $dados = $repo->findAll();
        
        return new ViewModel(array('dados'=>$dados,'form'=>$formLogin));
    }
    
    public function editarAction()
    {
        
        $formLogin = new FormLogin();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Login');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            return $this->redirect()->toRoute('full-app',array('controller'=>'login'));
        }else
        {
            if($id)
            {
                $login = $repo->find($id);
                $formLogin->setData($login->toArray());
                
            }
        }
        $dados = $repo->findAll();
        return new ViewModel(array('dados'=>$dados,'form'=>$formLogin));
        
    }
    
    public function deleteAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Login');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
         
          try{
               $repo->delete($id);
               return $this->redirect()->toRoute('full-app',array('controller'=>'login','action'=>'index', 'msg'=>'3'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
//             echo $ex->getMessage();exit;
            return $this->redirect()->toRoute('full-app',array('controller'=>'login','action'=>'index', 'msg'=>'2'));
         }
             
        return $this->redirect()->toRoute('full-app',array('controller'=>'login'));
    }
}

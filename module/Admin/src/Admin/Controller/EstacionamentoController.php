<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\estacionamneto as FormEstacionamento;

class EstacionamentoController extends AbstractActionController
{
    public function indexAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Estacionamento');
        $req = $this->getRequest();
        
        $msg = $this->params()->fromRoute('msg',false);
        
        $dados = $repo->findAll();
        // Numero da página a ser exibida
        $currentPage = $this->params()->fromQuery('pagina');
        // Quantidade de itens por págima
        $countPerPage = "2";
        $paginator = $repo->fetchAll($currentPage, $countPerPage,'Estacionamento');
        return new ViewModel(array('dados'=>$dados,'paginator' => $paginator,'msg'=>$msg));
    }
    
    public function inserirAction()
    {
        
        $formEstacionamento = new FormEstacionamento();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Estacionamento');
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
            return new ViewModel(array('dados'=>$dados,'form'=>$formEstacionamento,'msg'=>'1'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
         return new ViewModel(array('dados'=>$dados,'form'=>$formEstacionamento,'msg'=>'4'));
         }
        }else
        {
            if($id)
            {
                $estacionamento = $repo->find($id);
                $formEstacionamento->setData($estacionamento->toArray());
            }
        }
        $dados = $repo->findAll();
        
        return new ViewModel(array('dados'=>$dados,'form'=>$formEstacionamento));
    }
    
    public function editarAction()
    {
        
        $formEstacionamento = new FormEstacionamento();
        
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Estacionamento');
        $req = $this->getRequest();
       
         $id = $this->params()->fromRoute('id',false);
   
        
        if($req->isPost())
        {
            $post = $req->getPost()->toArray();
            //print_r("teste");
            //exit;
            $post['id'];
            $repo->salvar($post);
            return $this->redirect()->toRoute('full-app',array('controller'=>'estacionamento'));
        }else
        {
            if($id)
            {
                $estacionamento = $repo->find($id);
                $formEstacionamento->setData($estacionamento->toArray());
                
            }
        }
        $dados = $repo->findAll();
        return new ViewModel(array('dados'=>$dados,'form'=>$formEstacionamento));
        
    }
    
    public function deleteAction()
    {
        @$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Admin\Entity\Estacionamento');
        $req = $this->getRequest();
        $id = $this->params()->fromRoute('id',false);
       
         try{
               $repo->delete($id);
               return $this->redirect()->toRoute('full-app',array('controller'=>'estacionamento','action'=>'index', 'msg'=>'3'));
         } catch (\Doctrine\DBAL\DBALException $ex) {
             
//             echo $ex->getMessage();exit;
            return $this->redirect()->toRoute('full-app',array('controller'=>'estacionamento','action'=>'index', 'msg'=>'2'));
         }
             
        return $this->redirect()->toRoute('full-app',array('controller'=>'estacionamento'));
    }
}

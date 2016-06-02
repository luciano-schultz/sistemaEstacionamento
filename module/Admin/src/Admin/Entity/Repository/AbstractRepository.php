<?php

namespace Admin\Entity\Repository;
use Doctrine\ORM\EntityRepository;
use Zend\Stdlib\Hydrator;

use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;



class AbstractRepository extends EntityRepository
{
    
    public function fetchAll($currentPage = 1, $countPerPage = 2,$en) {
        @$em = $this->getEntityManager();
        $repo = $em->getRepository("Admin\Entity\\$en");

        $entityManager = $em;
        $repository = $repo;

        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('cliente')));
        $paginator = new Paginator($adapter);

        $paginator->setItemCountPerPage($countPerPage);

        $paginator->setCurrentPageNumber($currentPage);

        return $paginator;
    }


    public function insert(array $data)
    {
        $entityName = $this->getEntityName();
        $entity = new $entityName($data);
        (new Hydrator\ClassMethods())->hydrate($data,$entity);
        $this->setReferencias($data,$entity);
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }
    
    public function salvar(array $data)
    {
        
        if(isset($data['id']) && $data['id'] >0)
        {
            
            return $this->update($data);
        }else
        {
            return $this->insert($data);
        }
    }
    
    public function  delete($id)
    {
        $entity = $this->getEntityManager()->getReference($this->getEntityName(),$id);
        if($entity)
        {
            $this->getEntityManager()->remove($entity);
            $this->getEntityManager()->flush();
            return $entity;
        }else
        {
            return false;
        }
    }
    
    public function update(array $data)
    {
        $entity = $this->getEntityManager()->getReference($this->getEntityName(), $data['id']);
        (new Hydrator\ClassMethods())->hydrate($data,$entity);
        $this->setReferencias($data,$entity);
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }


    public function setReferencias(array $data,$entity)
    {
        $association = $this->getClassMetaData()->getAssociationMappings();
        foreach($association as $colunm => $arrayAssociation)
        {
            $association = $colunm;
            if(array_key_exists('joinColumns', $arrayAssociation) && isset($data[$association]))
            {
                $entityAssociationName = $arrayAssociation['targetEntity'];
                $referencia = $this->getEntityManager()->getReference($entityAssociationName, $data[$association]);
                $metodoSet = 'set' . ucfirst($association);
                $entity->$metodoSet($referencia);
            }
        }
    }
    
    //FUNÇÕES PARA AS SELECTS DO DB 
     public function getEntity($entity) { 
          @$em = $this->getServiceLocator()->get('Doctrine\orm\EntityManager'); 
          return $em->getRepository('Application\Entity\\'.$entity); 
     } 

    
    public function getOptionSelect($entity, $valor,$m)
    {
        //print_r($entity);
        //exit;
        @$em = $this->getEntityManager();
        $repo = $em->getRepository("Admin\Entity\\$entity");
        
        $ent = $repo->findBy([],[$valor=>'ASC']);
        $array['0']='---';
        if($m == 'getTipocargo'){
            foreach($ent as $dados):
            $array[$dados->getId()]=$dados->getTipocargo();
        endforeach;
        }
        if($m == 'getNome'){
            foreach($ent as $dados):
            $array[$dados->getId()]=$dados->getNome();
        endforeach;
        }
        if($m == 'getEndereco'){
            foreach($ent as $dados):
            $array[$dados->getId()]=$dados->getEndereco();
        endforeach;
        }
        return $array;
    }
}
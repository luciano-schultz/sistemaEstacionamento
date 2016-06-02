<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="cargo")
  * @ORM\Entity(repositoryClass="Admin\Entity\Repository\Cargo") 
 */
class Cargo extends Repository\AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoCargo", type="string", length=45, nullable=true)
     */
    private $tipocargo;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipocargo
     *
     * @param string $tipocargo
     *
     * @return Cargo
     */
    public function setTipocargo($tipocargo)
    {
        $this->tipocargo = $tipocargo;

        return $this;
    }

    /**
     * Get tipocargo
     *
     * @return string
     */
    public function getTipocargo()
    {
        return $this->tipocargo;
    }
    
    public function toArray()
    {
        return
        [
            'id'=>$this->getId(),
            'tipocargo'=>$this->getTipocargo()
        ];
    }
    
}

<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preco
 *
 * @ORM\Table(name="preco")
 * @ORM\Entity
 */
class Preco extends Repository\AbstractEntity
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
     * @var float
     *
     * @ORM\Column(name="mensal", type="float", precision=10, scale=0, nullable=false)
     */
    private $mensal;

    /**
     * @var float
     *
     * @ORM\Column(name="horista", type="float", precision=10, scale=0, nullable=false)
     */
    private $horista;



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
     * Set mensal
     *
     * @param float $mensal
     *
     * @return Preco
     */
    public function setMensal($mensal)
    {
        $this->mensal = $mensal;

        return $this;
    }

    /**
     * Get mensal
     *
     * @return float
     */
    public function getMensal()
    {
        return $this->mensal;
    }

    /**
     * Set horista
     *
     * @param float $horista
     *
     * @return Preco
     */
    public function setHorista($horista)
    {
        $this->horista = $horista;

        return $this;
    }

    /**
     * Get horista
     *
     * @return float
     */
    public function getHorista()
    {
        return $this->horista;
    }
}

<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carro
 *
 * @ORM\Table(name="carro", indexes={@ORM\Index(name="fk_carro_cliente_idx", columns={"cliente_id"})})
 * @ORM\Entity(repositoryClass="Admin\Entity\Repository\Carro") 
 */
class Carro extends Repository\AbstractEntity
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
     * @ORM\Column(name="placa", type="string", length=8, nullable=false)
     */
    private $placa;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=45, nullable=false)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=45, nullable=false)
     */
    private $cor;

    /**
     * @var \Admin\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     * })
     */
    private $cliente;



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
     * Set placa
     *
     * @param string $placa
     *
     * @return Carro
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa
     *
     * @return string
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Carro
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set cor
     *
     * @param string $cor
     *
     * @return Carro
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get cor
     *
     * @return string
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set cliente
     *
     * @param \Admin\Entity\Cliente $cliente
     *
     * @return Carro
     */
    public function setCliente($cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Admin\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }
    
    public function toArray()
    {
        return
        [
            'id'=>$this->getId(),
            'placa'=>$this->getPlaca(),
            'modelo'=>$this->getModelo(),
            'cor'=>$this->getCor(),
            'cliente'=>$this->getCliente()
        ];
    }
    
}

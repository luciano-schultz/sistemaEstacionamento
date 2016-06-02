<?php

namespace Admin\Entity;

/**
 * Carro
 */
class Carro
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $placa;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var string
     */
    private $cor;

    /**
     * @var \Admin\Entity\Cliente
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
    public function setCliente(\Admin\Entity\Cliente $cliente = null)
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
}

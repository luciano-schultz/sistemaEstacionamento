<?php

namespace Admin\Entity;

/**
 * Vaga
 */
class Vaga
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Admin\Entity\Status
     */
    private $status;

    /**
     * @var \Admin\Entity\Estacionamento
     */
    private $estacionamento;


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
     * Set status
     *
     * @param \Admin\Entity\Status $status
     *
     * @return Vaga
     */
    public function setStatus(\Admin\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Admin\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set estacionamento
     *
     * @param \Admin\Entity\Estacionamento $estacionamento
     *
     * @return Vaga
     */
    public function setEstacionamento(\Admin\Entity\Estacionamento $estacionamento = null)
    {
        $this->estacionamento = $estacionamento;

        return $this;
    }

    /**
     * Get estacionamento
     *
     * @return \Admin\Entity\Estacionamento
     */
    public function getEstacionamento()
    {
        return $this->estacionamento;
    }
}

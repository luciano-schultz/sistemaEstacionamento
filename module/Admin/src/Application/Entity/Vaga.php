<?php

namespace Application\Entity;

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
     * @var \Application\Entity\Status
     */
    private $status;

    /**
     * @var \Application\Entity\Estacionamento
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
     * @param \Application\Entity\Status $status
     *
     * @return Vaga
     */
    public function setStatus(\Application\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \Application\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set estacionamento
     *
     * @param \Application\Entity\Estacionamento $estacionamento
     *
     * @return Vaga
     */
    public function setEstacionamento(\Application\Entity\Estacionamento $estacionamento = null)
    {
        $this->estacionamento = $estacionamento;

        return $this;
    }

    /**
     * Get estacionamento
     *
     * @return \Application\Entity\Estacionamento
     */
    public function getEstacionamento()
    {
        return $this->estacionamento;
    }
}

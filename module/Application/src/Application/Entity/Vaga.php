<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vaga
 *
 * @ORM\Table(name="vaga", indexes={@ORM\Index(name="fk_vaga_status1_idx", columns={"status_id"}), @ORM\Index(name="fk_vaga_estacionamento1_idx", columns={"estacionamento_id"})})
 * @ORM\Entity
 */
class Vaga
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
     * @var \Application\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \Application\Entity\Estacionamento
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Estacionamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estacionamento_id", referencedColumnName="id")
     * })
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

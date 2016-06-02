<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vaga
 *
 * @ORM\Table(name="vaga", indexes={@ORM\Index(name="fk_vaga_status1_idx", columns={"status_id"}), @ORM\Index(name="fk_vaga_estacionamento1_idx", columns={"estacionamento_id"})})
 * @ORM\Entity(repositoryClass="Admin\Entity\Repository\Vaga")
 */
class Vaga extends Repository\AbstractEntity
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
     * @var \Admin\Entity\Estacionamento
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Estacionamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estacionamento_id", referencedColumnName="id")
     * })
     */
    private $estacionamento;

    /**
     * @var \Admin\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;



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
     * Set estacionamento
     *
     * @param \Admin\Entity\Estacionamento $estacionamento
     *
     * @return Vaga
     */
    public function setEstacionamento($estacionamento = null)
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

    /**
     * Set status
     *
     * @param \Admin\Entity\Status $status
     *
     * @return Vaga
     */
    public function setStatus($status = null)
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
}

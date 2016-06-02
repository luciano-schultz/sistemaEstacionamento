<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntradaSaida
 *
 * @ORM\Table(name="entrada_saida", indexes={@ORM\Index(name="fk_entrada_saida_carro1_idx", columns={"carro_id"}), @ORM\Index(name="fk_entrada_saida_vaga1_idx", columns={"vaga_id"}), @ORM\Index(name="fk_entrada_saida_estacionamento1_idx", columns={"estacionamento_id"}), @ORM\Index(name="fk_entrada_saida_funcionario1_idx", columns={"funcionario_id"})})
 * @ORM\Entity
 */
class EntradaSaida
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_hora_entrada", type="datetime", nullable=false)
     */
    private $dataHoraEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_hora_saida", type="datetime", nullable=true)
     */
    private $dataHoraSaida;

    /**
     * @var \Application\Entity\Carro
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Carro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carro_id", referencedColumnName="id")
     * })
     */
    private $carro;

    /**
     * @var \Application\Entity\Vaga
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Vaga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vaga_id", referencedColumnName="id")
     * })
     */
    private $vaga;

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
     * @var \Application\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_id", referencedColumnName="id")
     * })
     */
    private $funcionario;



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
     * Set dataHoraEntrada
     *
     * @param \DateTime $dataHoraEntrada
     *
     * @return EntradaSaida
     */
    public function setDataHoraEntrada($dataHoraEntrada)
    {
        $this->dataHoraEntrada = $dataHoraEntrada;

        return $this;
    }

    /**
     * Get dataHoraEntrada
     *
     * @return \DateTime
     */
    public function getDataHoraEntrada()
    {
        return $this->dataHoraEntrada;
    }

    /**
     * Set dataHoraSaida
     *
     * @param \DateTime $dataHoraSaida
     *
     * @return EntradaSaida
     */
    public function setDataHoraSaida($dataHoraSaida)
    {
        $this->dataHoraSaida = $dataHoraSaida;

        return $this;
    }

    /**
     * Get dataHoraSaida
     *
     * @return \DateTime
     */
    public function getDataHoraSaida()
    {
        return $this->dataHoraSaida;
    }

    /**
     * Set carro
     *
     * @param \Application\Entity\Carro $carro
     *
     * @return EntradaSaida
     */
    public function setCarro(\Application\Entity\Carro $carro = null)
    {
        $this->carro = $carro;

        return $this;
    }

    /**
     * Get carro
     *
     * @return \Application\Entity\Carro
     */
    public function getCarro()
    {
        return $this->carro;
    }

    /**
     * Set vaga
     *
     * @param \Application\Entity\Vaga $vaga
     *
     * @return EntradaSaida
     */
    public function setVaga(\Application\Entity\Vaga $vaga = null)
    {
        $this->vaga = $vaga;

        return $this;
    }

    /**
     * Get vaga
     *
     * @return \Application\Entity\Vaga
     */
    public function getVaga()
    {
        return $this->vaga;
    }

    /**
     * Set estacionamento
     *
     * @param \Application\Entity\Estacionamento $estacionamento
     *
     * @return EntradaSaida
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

    /**
     * Set funcionario
     *
     * @param \Application\Entity\Funcionario $funcionario
     *
     * @return EntradaSaida
     */
    public function setFuncionario(\Application\Entity\Funcionario $funcionario = null)
    {
        $this->funcionario = $funcionario;

        return $this;
    }

    /**
     * Get funcionario
     *
     * @return \Application\Entity\Funcionario
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }
}

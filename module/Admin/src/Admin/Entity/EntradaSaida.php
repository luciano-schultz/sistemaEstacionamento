<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntradaSaida
 *
 * @ORM\Table(name="entrada_saida", indexes={@ORM\Index(name="fk_entrada_saida_carro1_idx", columns={"carro_id"}), @ORM\Index(name="fk_entrada_saida_vaga1_idx", columns={"vaga_id"}), @ORM\Index(name="fk_entrada_saida_estacionamento1_idx", columns={"estacionamento_id"}), @ORM\Index(name="fk_entrada_saida_funcionario1_idx", columns={"funcionario_id"})})
 * @ORM\Entity
 */
class EntradaSaida extends Repository\AbstractEntity
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
     * @var \Admin\Entity\Carro
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Carro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carro_id", referencedColumnName="id")
     * })
     */
    private $carro;

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
     * @var \Admin\Entity\Funcionario
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Funcionario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="funcionario_id", referencedColumnName="id")
     * })
     */
    private $funcionario;

    /**
     * @var \Admin\Entity\Vaga
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Vaga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vaga_id", referencedColumnName="id")
     * })
     */
    private $vaga;



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
     * @param \Admin\Entity\Carro $carro
     *
     * @return EntradaSaida
     */
    public function setCarro(\Admin\Entity\Carro $carro = null)
    {
        $this->carro = $carro;

        return $this;
    }

    /**
     * Get carro
     *
     * @return \Admin\Entity\Carro
     */
    public function getCarro()
    {
        return $this->carro;
    }

    /**
     * Set estacionamento
     *
     * @param \Admin\Entity\Estacionamento $estacionamento
     *
     * @return EntradaSaida
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

    /**
     * Set funcionario
     *
     * @param \Admin\Entity\Funcionario $funcionario
     *
     * @return EntradaSaida
     */
    public function setFuncionario(\Admin\Entity\Funcionario $funcionario = null)
    {
        $this->funcionario = $funcionario;

        return $this;
    }

    /**
     * Get funcionario
     *
     * @return \Admin\Entity\Funcionario
     */
    public function getFuncionario()
    {
        return $this->funcionario;
    }

    /**
     * Set vaga
     *
     * @param \Admin\Entity\Vaga $vaga
     *
     * @return EntradaSaida
     */
    public function setVaga(\Admin\Entity\Vaga $vaga = null)
    {
        $this->vaga = $vaga;

        return $this;
    }

    /**
     * Get vaga
     *
     * @return \Admin\Entity\Vaga
     */
    public function getVaga()
    {
        return $this->vaga;
    }
}

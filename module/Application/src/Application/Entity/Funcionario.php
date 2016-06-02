<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario", indexes={@ORM\Index(name="fk_funcionario_cargo1_idx", columns={"cargo_id"}), @ORM\Index(name="fk_funcionario_login1_idx", columns={"login_id1"})})
 * @ORM\Entity
 */
class Funcionario
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
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=11, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=45, nullable=false)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=45, nullable=false)
     */
    private $endereco;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_id", type="integer", nullable=false)
     */
    private $loginId;

    /**
     * @var \Application\Entity\Cargo
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cargo_id", referencedColumnName="id")
     * })
     */
    private $cargo;

    /**
     * @var \Application\Entity\Login
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Login")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login_id1", referencedColumnName="id")
     * })
     */
    private $login1;



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
     * Set nome
     *
     * @param string $nome
     *
     * @return Funcionario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Funcionario
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Funcionario
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Funcionario
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set loginId
     *
     * @param integer $loginId
     *
     * @return Funcionario
     */
    public function setLoginId($loginId)
    {
        $this->loginId = $loginId;

        return $this;
    }

    /**
     * Get loginId
     *
     * @return integer
     */
    public function getLoginId()
    {
        return $this->loginId;
    }

    /**
     * Set cargo
     *
     * @param \Application\Entity\Cargo $cargo
     *
     * @return Funcionario
     */
    public function setCargo(\Application\Entity\Cargo $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \Application\Entity\Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set login1
     *
     * @param \Application\Entity\Login $login1
     *
     * @return Funcionario
     */
    public function setLogin1(\Application\Entity\Login $login1 = null)
    {
        $this->login1 = $login1;

        return $this;
    }

    /**
     * Get login1
     *
     * @return \Application\Entity\Login
     */
    public function getLogin1()
    {
        return $this->login1;
    }
}

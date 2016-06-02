<?php

namespace Admin\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcionario
 *
 * @ORM\Table(name="funcionario", indexes={@ORM\Index(name="fk_funcionario_cargo1_idx", columns={"cargo_id"}), @ORM\Index(name="fk_funcionario_login1_idx", columns={"login_id"})})
 * @ORM\Entity(repositoryClass="Admin\Entity\Repository\Funcionario")
 */
class Funcionario extends Repository\AbstractEntity
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
     * @var \Admin\Entity\Cargo
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cargo_id", referencedColumnName="id")
     * })
     */
    private $cargo;

    /**
     * @var \Admin\Entity\Login
     *
     * @ORM\ManyToOne(targetEntity="Admin\Entity\Login")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="login_id", referencedColumnName="id")
     * })
     */
    private $login;



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
     * Set cargo
     *
     * @param \Admin\Entity\Cargo $cargo
     *
     * @return Funcionario
     */
    public function setCargo( $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \Admin\Entity\Cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set login
     *
     * @param \Admin\Entity\Login $login
     *
     * @return Funcionario
     */
    public function setLogin($login = null)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return \Admin\Entity\Login
     */
    public function getLogin()
    {
        return $this->login;
    }
    /**
 * Transform to string
 * 
 * @return string
 */
public function __toString() {
        return (string) $this->getId();
    }

    public function toArray() {
        return
                [
                    'id' => $this->getId(),
                    'nome' => $this->getNome(),
                    'cpf' => $this->getCpf(),
                    'endereco' => $this->getEndereco(),
                    'cargo' => $this->getCargo(),
                    'login' => $this->getLogin(),
                    'telefone' => $this->getTelefone()
        ];
    }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $nome;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    private $preco;

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Produto
     */
    public function setDescricao(string $descricao): Produto
    {
        $this->descricao = $descricao;
        return $this;
    }


    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=2)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     *
     */
    private $descricao;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return Produto
     */
    public function setStatus(int $status): Produto
    {
        $this->status = $status;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Produto
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Produto
     */
    public function setNome(string $nome): Produto
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     * @return Produto
     */
    public function setPreco(float $preco): Produto
    {
        $this->preco = $preco;
        return $this;
    }


}

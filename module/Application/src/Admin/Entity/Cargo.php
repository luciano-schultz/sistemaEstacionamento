<?php

namespace Admin\Entity;

/**
 * Cargo
 */
class Cargo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipocargo;


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
     * Set tipocargo
     *
     * @param string $tipocargo
     *
     * @return Cargo
     */
    public function setTipocargo($tipocargo)
    {
        $this->tipocargo = $tipocargo;

        return $this;
    }

    /**
     * Get tipocargo
     *
     * @return string
     */
    public function getTipocargo()
    {
        return $this->tipocargo;
    }
}

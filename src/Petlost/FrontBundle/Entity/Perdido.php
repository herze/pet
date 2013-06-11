<?php
namespace Petlost\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Petlost\FrontBundle\Entity\PerdidoRepository")
 */
class Perdido {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @Assert\DateTime
     */
    protected $fecha_extravio;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $telefono;
    /**
     * @ORM\ManyToOne(targetEntity="Petlost\FrontBundle\Entity\Anuncio", cascade={"remove"})
    */
    protected $anuncio;
    

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
     * Set fecha_extravio
     *
     * @param \DateTime $fechaExtravio
     * @return Perdido
     */
    public function setFechaExtravio($fechaExtravio)
    {
        $this->fecha_extravio = $fechaExtravio;
    
        return $this;
    }

    /**
     * Get fecha_extravio
     *
     * @return \DateTime 
     */
    public function getFechaExtravio()
    {
        return $this->fecha_extravio;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Perdido
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set anuncio
     *
     * @param \Petlost\FrontBundle\Entity\Anuncio $anuncio
     * @return Perdido
     */
    public function setAnuncio(\Petlost\FrontBundle\Entity\Anuncio $anuncio = null)
    {
        $this->anuncio = $anuncio;
    
        return $this;
    }

    /**
     * Get anuncio
     *
     * @return \Petlost\FrontBundle\Entity\Anuncio 
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }
}
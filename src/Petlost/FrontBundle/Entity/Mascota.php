<?php
namespace Petlost\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Petlost\FrontBundle\Entity\MascotaRepository")
 */
class Mascota {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $nombre;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $categoria;
    /**
     * @ORM\Column(type="string")
     * @Assert\Choice({ "macho", "hembra" })
    */
    protected $sexo;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $raza;
     /**
     * @ORM\Column(type="string")
     * @Assert\Choice({ "ninguno", "collar", "tatuaje", "chip" })
    */
    protected $identificacion;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $enfermedad;
    /**
     * @ORM\OneToMany(targetEntity="Foto", mappedBy="mascota", cascade={"persist"})
     **/
    protected $fotos;
    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fotos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Mascota
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Mascota
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Mascota
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set raza
     *
     * @param string $raza
     * @return Mascota
     */
    public function setRaza($raza)
    {
        $this->raza = $raza;
    
        return $this;
    }

    /**
     * Get raza
     *
     * @return string 
     */
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set identificacion
     *
     * @param string $identificacion
     * @return Mascota
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    
        return $this;
    }

    /**
     * Get identificacion
     *
     * @return string 
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set enfermedad
     *
     * @param string $enfermedad
     * @return Mascota
     */
    public function setEnfermedad($enfermedad)
    {
        $this->enfermedad = $enfermedad;
    
        return $this;
    }

    /**
     * Get enfermedad
     *
     * @return string 
     */
    public function getEnfermedad()
    {
        return $this->enfermedad;
    }

    /**
     * Add fotos
     *
     * @param \Petlost\FrontBundle\Entity\Foto $fotos
     * @return Mascota
     */
    public function addFoto(\Petlost\FrontBundle\Entity\Foto $fotos)
    {
        $this->fotos[] = $fotos;
    
        return $this;
    }

    /**
     * Remove fotos
     *
     * @param \Petlost\FrontBundle\Entity\Foto $fotos
     */
    public function removeFoto(\Petlost\FrontBundle\Entity\Foto $fotos)
    {
        $this->fotos->removeElement($fotos);
    }

    /**
     * Get fotos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotos()
    {
        return $this->fotos;
    }
}
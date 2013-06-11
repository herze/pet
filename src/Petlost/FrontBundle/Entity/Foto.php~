<?php
namespace Petlost\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Petlost\FrontBundle\Entity\FotoRepository")
 */
class Foto {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @Assert\Image(maxSize = "500k")
    */
    protected $url;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
    */
    protected $nombre;
    /**
     * @ORM\ManyToOne(targetEntity="Petlost\FrontBundle\Entity\Mascota", cascade={"remove"})
    */
    protected $mascota;
    
        /**
     * Sube la foto de la mascota copiándola en el directorio que se indica y
     * guardando en la entidad la ruta hasta la foto
     *
     * @param string $directorioDestino Ruta completa del directorio al que se sube la foto
     */
    public function subirFoto($directorioDestino)
    {
        if (null === $this->url) {
            return;
        }
        
        $nombreArchivoFoto = uniqid('petlost-').'-1.'.$this->url->guessExtension();
        
        $this->url->move($directorioDestino, $nombreArchivoFoto);
        
        $this->setUrl($nombreArchivoFoto);
        
        
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
     * Set url
     *
     * @param string $url
     * @return Foto
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Foto
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
     * Set mascota
     *
     * @param \Petlost\FrontBundle\Entity\Mascota $mascota
     * @return Foto
     */
    public function setMascota(\Petlost\FrontBundle\Entity\Mascota $mascota = null)
    {
        $this->mascota = $mascota;
    
        return $this;
    }

    /**
     * Get mascota
     *
     * @return \Petlost\FrontBundle\Entity\Mascota 
     */
    public function getMascota()
    {
        return $this->mascota;
    }
}
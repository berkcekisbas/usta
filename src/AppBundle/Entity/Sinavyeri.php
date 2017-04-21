<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Sinavyeri
 *
 * @ORM\Table(name="sinavyeri")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SinavyeriRepository")
 */
class Sinavyeri
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="sinavyeri", type="string")
     */
    private $sinavyeri;



    /**
     * @var
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="ad", type="text")
     */
    private $adres;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="telefon", type="string")
     */
    private $telefon;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="yetkilikisi", type="string")
     */
    private $yetkilikisi;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Sinavyeri
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Sinavyeri
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set yetkilikisi
     *
     * @param string $yetkilikisi
     *
     * @return Sinavyeri
     */
    public function setYetkilikisi($yetkilikisi)
    {
        $this->yetkilikisi = $yetkilikisi;

        return $this;
    }

    /**
     * Get yetkilikisi
     *
     * @return string
     */
    public function getYetkilikisi()
    {
        return $this->yetkilikisi;
    }

    /**
     * Set sinavyeri
     *
     * @param string $sinavyeri
     *
     * @return Sinavyeri
     */
    public function setSinavyeri($sinavyeri)
    {
        $this->sinavyeri = $sinavyeri;

        return $this;
    }

    /**
     * Get sinavyeri
     *
     * @return string
     */
    public function getSinavyeri()
    {
        return $this->sinavyeri;
    }
}

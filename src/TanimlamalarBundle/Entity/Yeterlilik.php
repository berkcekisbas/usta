<?php

namespace TanimlamalarBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;


use Doctrine\ORM\Mapping as ORM;

/**
 * Yeterlilik
 *
 * @ORM\Table(name="yeterlilik")
 * @ORM\Entity(repositoryClass="TanimlamalarBundle\Repository\YeterlilikRepository")
 */
class Yeterlilik
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
     * @ORM\OneToMany(targetEntity="TanimlamalarBundle\Entity\Birim", mappedBy="yeterlilik")
     */
    private $birim;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="kod", type="string")
     */
    private $kod;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="ad", type="string")
     */
    private $ad;

    /**
     * @var string
     *
     * @ORM\Column(name="seviye", type="string")
     */
    private $seviye;

    /**
     * @var string
     *
     * @ORM\Column(name="sektor", type="string")
     */
    private $sektor;

    /**
     * @var string
     *
     * @ORM\Column(name="revizyon", type="string")
     */
    private $revizyon;

    /**
     * @var string
     *
     * @ORM\Column(name="onaytarihi", type="string")
     */
    private $onaytarihi;

    /**
     * @var string
     *
     * @ORM\Column(name="onaysayisi", type="string")
     */
    private $onaysayisi;

    /**
     * @var string
     *
     * @ORM\Column(name="t1sorusayisi", type="string")
     */
    private $t1sorusayisi;

    /**
     * @var string
     *
     * @ORM\Column(name="t2sorusayisi", type="string")
     */
    private $t2sorusayisi;

    /**
     * @var string
     *
     * @ORM\Column(name="t1gecmepuani", type="string")
     */
    private $t1gecmepuani;

    /**
     * @var string
     *
     * @ORM\Column(name="t2gecmepuani", type="string")
     */
    private $t2gecmepuani;

    /**
     * @var string
     *
     * @ORM\Column(name="belgegecerliliksuresi", type="string")
     */
    private $belgegecerliliksuresi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="aktif", type="boolean")
     */
    private $aktif;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->birim = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set kod
     *
     * @param string $kod
     *
     * @return Yeterlilik
     */
    public function setKod($kod)
    {
        $this->kod = $kod;

        return $this;
    }

    /**
     * Get kod
     *
     * @return string
     */
    public function getKod()
    {
        return $this->kod;
    }

    /**
     * Set ad
     *
     * @param string $ad
     *
     * @return Yeterlilik
     */
    public function setAd($ad)
    {
        $this->ad = $ad;

        return $this;
    }

    /**
     * Get ad
     *
     * @return string
     */
    public function getAd()
    {
        return $this->ad;
    }

    /**
     * Set seviye
     *
     * @param string $seviye
     *
     * @return Yeterlilik
     */
    public function setSeviye($seviye)
    {
        $this->seviye = $seviye;

        return $this;
    }

    /**
     * Get seviye
     *
     * @return string
     */
    public function getSeviye()
    {
        return $this->seviye;
    }

    /**
     * Set sektor
     *
     * @param string $sektor
     *
     * @return Yeterlilik
     */
    public function setSektor($sektor)
    {
        $this->sektor = $sektor;

        return $this;
    }

    /**
     * Get sektor
     *
     * @return string
     */
    public function getSektor()
    {
        return $this->sektor;
    }

    /**
     * Set revizyon
     *
     * @param string $revizyon
     *
     * @return Yeterlilik
     */
    public function setRevizyon($revizyon)
    {
        $this->revizyon = $revizyon;

        return $this;
    }

    /**
     * Get revizyon
     *
     * @return string
     */
    public function getRevizyon()
    {
        return $this->revizyon;
    }

    /**
     * Set onaytarihi
     *
     * @param string $onaytarihi
     *
     * @return Yeterlilik
     */
    public function setOnaytarihi($onaytarihi)
    {
        $this->onaytarihi = $onaytarihi;

        return $this;
    }

    /**
     * Get onaytarihi
     *
     * @return string
     */
    public function getOnaytarihi()
    {
        return $this->onaytarihi;
    }

    /**
     * Set onaysayisi
     *
     * @param string $onaysayisi
     *
     * @return Yeterlilik
     */
    public function setOnaysayisi($onaysayisi)
    {
        $this->onaysayisi = $onaysayisi;

        return $this;
    }

    /**
     * Get onaysayisi
     *
     * @return string
     */
    public function getOnaysayisi()
    {
        return $this->onaysayisi;
    }

    /**
     * Set t1sorusayisi
     *
     * @param string $t1sorusayisi
     *
     * @return Yeterlilik
     */
    public function setT1sorusayisi($t1sorusayisi)
    {
        $this->t1sorusayisi = $t1sorusayisi;

        return $this;
    }

    /**
     * Get t1sorusayisi
     *
     * @return string
     */
    public function getT1sorusayisi()
    {
        return $this->t1sorusayisi;
    }

    /**
     * Set t2sorusayisi
     *
     * @param string $t2sorusayisi
     *
     * @return Yeterlilik
     */
    public function setT2sorusayisi($t2sorusayisi)
    {
        $this->t2sorusayisi = $t2sorusayisi;

        return $this;
    }

    /**
     * Get t2sorusayisi
     *
     * @return string
     */
    public function getT2sorusayisi()
    {
        return $this->t2sorusayisi;
    }

    /**
     * Set t1gecmepuani
     *
     * @param string $t1gecmepuani
     *
     * @return Yeterlilik
     */
    public function setT1gecmepuani($t1gecmepuani)
    {
        $this->t1gecmepuani = $t1gecmepuani;

        return $this;
    }

    /**
     * Get t1gecmepuani
     *
     * @return string
     */
    public function getT1gecmepuani()
    {
        return $this->t1gecmepuani;
    }

    /**
     * Set t2gecmepuani
     *
     * @param string $t2gecmepuani
     *
     * @return Yeterlilik
     */
    public function setT2gecmepuani($t2gecmepuani)
    {
        $this->t2gecmepuani = $t2gecmepuani;

        return $this;
    }

    /**
     * Get t2gecmepuani
     *
     * @return string
     */
    public function getT2gecmepuani()
    {
        return $this->t2gecmepuani;
    }

    /**
     * Set belgegecerliliksuresi
     *
     * @param string $belgegecerliliksuresi
     *
     * @return Yeterlilik
     */
    public function setBelgegecerliliksuresi($belgegecerliliksuresi)
    {
        $this->belgegecerliliksuresi = $belgegecerliliksuresi;

        return $this;
    }

    /**
     * Get belgegecerliliksuresi
     *
     * @return string
     */
    public function getBelgegecerliliksuresi()
    {
        return $this->belgegecerliliksuresi;
    }

    /**
     * Set aktif
     *
     * @param boolean $aktif
     *
     * @return Yeterlilik
     */
    public function setAktif($aktif)
    {
        $this->aktif = $aktif;

        return $this;
    }

    /**
     * Get aktif
     *
     * @return boolean
     */
    public function getAktif()
    {
        return $this->aktif;
    }

    /**
     * Add birim
     *
     * @param \TanimlamalarBundle\Entity\Birim $birim
     *
     * @return Yeterlilik
     */
    public function addBirim(\TanimlamalarBundle\Entity\Birim $birim)
    {
        $this->birim[] = $birim;

        return $this;
    }

    /**
     * Remove birim
     *
     * @param \TanimlamalarBundle\Entity\Birim $birim
     */
    public function removeBirim(\TanimlamalarBundle\Entity\Birim $birim)
    {
        $this->birim->removeElement($birim);
    }

    /**
     * Get birim
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBirim()
    {
        return $this->birim;
    }
}

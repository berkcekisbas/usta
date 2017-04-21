<?php

namespace TanimlamalarBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use TanimlamalarBundle\Entity\Yeterlilik;

/**
 * Birim
 *
 * @ORM\Table(name="birim")
 * @ORM\Entity(repositoryClass="TanimlamalarBundle\Repository\BirimRepository")
 */
class Birim
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
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\ManyToOne(targetEntity="TanimlamalarBundle\Entity\Yeterlilik" , inversedBy="birim")
     * @ORM\JoinColumn(name="yeterlilik_id", referencedColumnName="id")
     */
    private $yeterlilik;

    /**
     * @ORM\OneToMany(targetEntity="SorubankasiBundle\Entity\TeorikSoru", mappedBy="birim")
     */
    private $teoriksoru;


    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="ad", type="string")
     */
    private $ad;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="kod", type="string")
     */
    private $kod;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="tip", type="string")
     */
    private $tip;

    /**
     * @var float
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="fiyat", type="float")
     */
    private $fiyat;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teoriksoru = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ad
     *
     * @param string $ad
     *
     * @return Birim
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
     * Set kod
     *
     * @param string $kod
     *
     * @return Birim
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
     * Set tip
     *
     * @param string $tip
     *
     * @return Birim
     */
    public function setTip($tip)
    {
        $this->tip = $tip;

        return $this;
    }

    /**
     * Get tip
     *
     * @return string
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * Set fiyat
     *
     * @param float $fiyat
     *
     * @return Birim
     */
    public function setFiyat($fiyat)
    {
        $this->fiyat = $fiyat;

        return $this;
    }

    /**
     * Get fiyat
     *
     * @return float
     */
    public function getFiyat()
    {
        return $this->fiyat;
    }

    /**
     * Set yeterlilik
     *
     * @param \TanimlamalarBundle\Entity\Yeterlilik $yeterlilik
     *
     * @return Birim
     */
    public function setYeterlilik(\TanimlamalarBundle\Entity\Yeterlilik $yeterlilik = null)
    {
        $this->yeterlilik = $yeterlilik;

        return $this;
    }

    /**
     * Get yeterlilik
     *
     * @return \TanimlamalarBundle\Entity\Yeterlilik
     */
    public function getYeterlilik()
    {
        return $this->yeterlilik;
    }

    /**
     * Add teoriksoru
     *
     * @param \SorubankasiBundle\Entity\TeorikSoru $teoriksoru
     *
     * @return Birim
     */
    public function addTeoriksoru(\SorubankasiBundle\Entity\TeorikSoru $teoriksoru)
    {
        $this->teoriksoru[] = $teoriksoru;

        return $this;
    }

    /**
     * Remove teoriksoru
     *
     * @param \SorubankasiBundle\Entity\TeorikSoru $teoriksoru
     */
    public function removeTeoriksoru(\SorubankasiBundle\Entity\TeorikSoru $teoriksoru)
    {
        $this->teoriksoru->removeElement($teoriksoru);
    }

    /**
     * Get teoriksoru
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeoriksoru()
    {
        return $this->teoriksoru;
    }
}

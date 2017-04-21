<?php

namespace SorubankasiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * TeorikSoru
 *
 * @ORM\Table(name="teorik_soru")
 * @ORM\Entity(repositoryClass="SorubankasiBundle\Repository\TeorikSoruRepository")
 */
class TeorikSoru
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
     * @ORM\ManyToOne(targetEntity="TanimlamalarBundle\Entity\Birim" , inversedBy="teoriksoru")
     * @ORM\JoinColumn(name="birim_id", referencedColumnName="id")
     */
    private $birim;

    /**
     * @var text
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="soru", type="text")
     */
    private $soru;

    /**
     * @var boolean
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="zorlukderecesi", type="boolean")
     */
    private $zorlukderecesi;

    /**
     * @var string
     * @ORM\Column(name="resim",type="string",nullable=true)
     * @Assert\File(
     *     maxSize = "20000",
     *     mimeTypes = {"image/jpg", "image/jpeg"},
     *     mimeTypesMessage = "Sadece JPG Dosyası Yükleyebilirsiniz",
     * )
     */
    private $resim;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="a", type="string")
     */
    private $a;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="b", type="string")
     */
    private $b;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="c", type="string")
     */
    private $c;

    /**
     * @var string
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @ORM\Column(name="d", type="string")
     */
    private $d;

    /**
     * @var string
     * @ORM\Column(name="e", type="string")
     */
    private $e;

    /**
     * @Assert\NotBlank(message = "Bu Alan Boş Geçilemez")
     * @var string
     * @ORM\Column(name="dogrucevap", type="string")
     */
    private $dogrucevap;


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
     * Set soru
     *
     * @param string $soru
     *
     * @return TeorikSoru
     */
    public function setSoru($soru)
    {
        $this->soru = $soru;

        return $this;
    }

    /**
     * Get soru
     *
     * @return string
     */
    public function getSoru()
    {
        return $this->soru;
    }

    /**
     * Set zorlukderecesi
     *
     * @param boolean $zorlukderecesi
     *
     * @return TeorikSoru
     */
    public function setZorlukderecesi($zorlukderecesi)
    {
        $this->zorlukderecesi = $zorlukderecesi;

        return $this;
    }

    /**
     * Get zorlukderecesi
     *
     * @return boolean
     */
    public function getZorlukderecesi()
    {
        return $this->zorlukderecesi;
    }

    /**
     * Set resim
     *
     * @param string $resim
     *
     * @return TeorikSoru
     */
    public function setResim($resim)
    {
        $this->resim = $resim;

        return $this;
    }

    /**
     * Get resim
     *
     * @return string
     */
    public function getResim()
    {
        return $this->resim;
    }

    /**
     * Set birim
     *
     * @param \TanimlamalarBundle\Entity\Birim $birim
     *
     * @return TeorikSoru
     */
    public function setBirim(\TanimlamalarBundle\Entity\Birim $birim = null)
    {
        $this->birim = $birim;

        return $this;
    }

    /**
     * Get birim
     *
     * @return \TanimlamalarBundle\Entity\Birim
     */
    public function getBirim()
    {
        return $this->birim;
    }

    /**
     * Set a
     *
     * @param string $a
     *
     * @return TeorikSoru
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return string
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Set b
     *
     * @param string $b
     *
     * @return TeorikSoru
     */
    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }

    /**
     * Get b
     *
     * @return string
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * Set c
     *
     * @param string $c
     *
     * @return TeorikSoru
     */
    public function setC($c)
    {
        $this->c = $c;

        return $this;
    }

    /**
     * Get c
     *
     * @return string
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * Set d
     *
     * @param string $d
     *
     * @return TeorikSoru
     */
    public function setD($d)
    {
        $this->d = $d;

        return $this;
    }

    /**
     * Get d
     *
     * @return string
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * Set e
     *
     * @param string $e
     *
     * @return TeorikSoru
     */
    public function setE($e)
    {
        $this->e = $e;

        return $this;
    }

    /**
     * Get e
     *
     * @return string
     */
    public function getE()
    {
        return $this->e;
    }

    /**
     * Set dogrucevap
     *
     * @param string $dogrucevap
     *
     * @return TeorikSoru
     */
    public function setDogrucevap($dogrucevap)
    {
        $this->dogrucevap = $dogrucevap;

        return $this;
    }

    /**
     * Get dogrucevap
     *
     * @return string
     */
    public function getDogrucevap()
    {
        return $this->dogrucevap;
    }
}

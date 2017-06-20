<?php

namespace RMGBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="RMGBundle\Repository\contactRepository")
 */
class contact
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
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\Length(
     *       min=2,
     *       max = 40,
     *       minMessage = "Votre nom est trop court, il doit être d'au moins {{ limit }} caractères",
     *       maxMessage = "Votre nom est trop long, il doit être au maximum de {{ limit }} caractères"
     * )
     *
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\Length(
     *       min= 2,
     *       max = 40,
     *       minMessage = "Votre prenom est trop court, il doit être d'au moins {{ limit }} caractères",
     *       maxMessage = "Votre prenom est trop long, il doit être au maximum de {{ limit }} caractères"
     * )
     */
    private $prenom;

    /**
     * @var string
     * @Assert\Length(
     *       min = 10,
     *       max = 150,
     *       minMessage = "Votre adresse est trop courte, elle doit être d'au moins {{ limit }} caractères",
     *       maxMessage = "Votre adresse est trop longue, elle doit être au maximum de {{ limit }} caractères"
     * )
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     * @Assert\Email(
     *     message = "L'Email '{{ value }}' est incorrecte",
     * )
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="text")
     * @Assert\Length(
     *       min = 10,
     *       max = 1000,
     *       minMessage = "Votre texte est trop court, il doit être d'au moins {{ limit }} caractères",
     *       maxMessage = "Votre texte est trop long, il doit être au maximum de {{ limit }} caractères"
     * )
     */
    private $sujet;

    /**
     * @var \DateTime
     * @ORM\Column(name="datecreation", type="date")
     */
    private $datecreation;

    public function __construct() {
      $this->datecreation = new \DateTime();
    }
    

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
     * Set nom
     *
     * @param string $nom
     *
     * @return contact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return contact
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return contact
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return contact
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return contact
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }
}

<?php
namespace Fabgg\JukeboxBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * JKAccessLog
 *
 * @ORM\Entity(repositoryClass="Fabgg\JukeboxBundle\Repository\JKAccessLogRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class JKAccessLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="what", type="string", length=18)
     */
    private $what;

    /**
     * @var string
     *
     * @ORM\Column(name="who", type="string", length=255)
     */
    private $who;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return JKAccessLog
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set what
     *
     * @param string $what
     *
     * @return JKAccessLog
     */
    public function setWhat($what)
    {
        $this->what = $what;

        return $this;
    }

    /**
     * Get what
     *
     * @return string
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Set who
     *
     * @param string $who
     *
     * @return JKAccessLog
     */
    public function setWho($who)
    {
        $this->who = $who;

        return $this;
    }

    /**
     * Get who
     *
     * @return string
     */
    public function getWho()
    {
        return $this->who;
    }
}


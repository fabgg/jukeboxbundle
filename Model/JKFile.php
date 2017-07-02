<?php
namespace Fabgg\JukeboxBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * JKFile
 *
 * @ORM\Entity(repositoryClass="Fabgg\JukeboxBundle\Repository\JKFileRepository")
 * @ORM\HasLifecycleCallbacks()
 */
abstract class JKFile
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="fileName", type="string", length=255)
     */
    protected $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="fileExtension", type="string", length=6, nullable=true)
     */
    protected $fileExtension;

    /**
     * @var string
     *
     * @ORM\Column(name="fileMine", type="string", length=128)
     */
    protected $fileMine;

    /**
     * @var int
     *
     * @ORM\Column(name="fileSize", type="integer")
     */
    protected $fileSize;

    /**
     * @var string
     *
     * @ORM\Column(name="filePath", type="string", length=255)
     */
    protected $filePath;

    /**
     * @var string
     *
     * @ORM\Column(name="fileSlug", type="string", length=255)
     */
    protected $fileSlug;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    protected $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean", options={"default" = 0})
     */
    protected $public;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=true)
     */
    protected $deleted;


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
     * Set fileName
     *
     * @param string $fileName
     *
     * @return JKFile
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }


    /**
     * Set fileMine
     *
     * @param string $fileMine
     *
     * @return JKFile
     */
    public function setFileMine($fileMine)
    {
        $this->fileMine = $fileMine;

        return $this;
    }

    /**
     * Get fileMine
     *
     * @return string
     */
    public function getFileMine()
    {
        return $this->fileMine;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     *
     * @return JKFile
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set filePath
     *
     * @param string $filePath
     *
     * @return JKFile
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return JKFile
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return JKFile
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \Datetime());

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime());
        }
    }


    /**
     * Set fileExtension
     *
     * @param string $fileExtension
     *
     * @return JKFile
     */
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Get fileExtension
     *
     * @return string
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * Set fileSlug
     *
     * @param string $fileSlug
     *
     * @return JKFile
     */
    public function setFileSlug($fileSlug)
    {
        $this->fileSlug = $fileSlug;

        return $this;
    }

    /**
     * Get fileSlug
     *
     * @return string
     */
    public function getFileSlug()
    {
        return $this->fileSlug;
    }


    /**
     * Set public
     *
     * @param boolean $public
     *
     * @return JKFile
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return boolean
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return JKFile
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

}

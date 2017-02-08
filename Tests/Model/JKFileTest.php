<?php

/**
 * Created Timothy BOURGAULT
 */

namespace Fabgg\JukeboxBundle\Tests\JukeboxBundle\Model;

use Fabgg\JukeboxBundle\Model\JKFile;

class JKFileTest extends JKFile
{
    public $id, $fileName, $fileExtension, $fileMime, $fileSize, $filePath, $fileSlug, $createdAt, $updateAt, $public, $deleted;

    public function __construct($id, $fileName, $fileExtension, $fileMine, $fileSize, $filePath, $fileSlug, $createdAt, $updateAt, $public, $deleted)
    {
        $this->id = $id;
        $this->fileName = $fileName;
        $this->fileExtension = $fileExtension;
        $this->fileMine = $fileMine;
        $this->fileSize = $fileSize;
        $this->filePath = $filePath;
        $this->fileSlug = $fileSlug;
        $this->createdAt = $createdAt;
        $this->updateAt = $updateAt;
        $this->public = $public;
        $this->deleted = $deleted;
    }


}

<?php
/**
 * Created by PhpStorm.
 * User: fabrice
 * Date: 10/12/2016
 * Time: 08:32
 */

namespace Fabgg\JukeboxBundle\Lib;

use Symfony\Component\Filesystem\Filesystem;
use Fabgg\JukeboxBundle\Exception\JKException;
use Fabgg\JukeboxBundle\Model\JKFile;


class JukeboxManager
{

    protected $fs;

    protected $jukeboxPath;
    protected $separator;

    public function __construct($path, $separator)
    {
        $this->fs = new Filesystem();

        if (!$path) throw new JKException('fabgg_jukebox.system.path is null', 100);
        elseif (!$this->fs->isAbsolutePath($path)) throw new JKException('tbl_jukebox.system.path is not an absolute path', 101);
        $this->jukeboxPath = $path;

        if (!$separator) throw new JKException('fabgg_jukebox.system.separator is null', 102);
        elseif ($separator != '/') {
            throw new JKException('fabgg_jukebox.system.separator is not ok it should be "/" or "\\" depending your OS', 103);
        }
        $this->separator = $separator;


    }


    /**
     * @return string  eg '0123','4567','8901','2345'
     */
    public function getNewRandPath()
    {
        $randPath = array();
        for ($i = 0; $i <= 4; $i++) {
            $randPath[] = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        }
        return implode(',', $randPath);
    }

    /**
     * @param JKFile $JKFile
     * @return mixed|string eg '/var/jukebox/0123/4567/8901/2345/'
     */
    public function getAbsolutePath(JKFile $JKFile)
    {
        $absolutePath = (substr($this->jukeboxPath, -1) != $this->separator) ? $this->jukeboxPath . $this->separator : $this->jukeboxPath;
        $randPath = explode(',', $JKFile->getFilePath());
        foreach ($randPath as $v) {
            $absolutePath .= $v . $this->separator;
        }
        return $absolutePath;
    }

    /**
     * @param JKFile $JKFile
     */
    public function remove(JKFile $JKFile){
        $this->fs->remove(
            $this->getAbsolutePath($JKFile).$JKFile->getFileName()
        );
    }

}
<?php
namespace Fabgg\JukeboxBundle\Lib;

use Symfony\Component\Filesystem\Filesystem;
use Fabgg\JukeboxBundle\Exception\JKException;
use Fabgg\JukeboxBundle\Model\JKFile;


class JukeboxManager
{

    protected $fs;

    protected $jukeboxPrivatePath;
    protected $jukeboxPublicPath;
    protected $publicUriPrefix;
    protected $separator;

    public function __construct( $separator,$privatePath , $publicPath = null, $publicUriPrefix = null)
    {
        $this->fs = new Filesystem();



        if (!$separator) throw new JKException('fabgg_jukebox.system.separator is null', 102);
        elseif ($separator != '/') {
            throw new JKException('fabgg_jukebox.system.separator is not ok it should be "/" or "\\" depending your OS', 103);
        }
        $this->separator = $separator;

        if (!$privatePath) throw new JKException('fabgg_jukebox.system.path.private is null', 100);
        elseif (!$this->fs->isAbsolutePath($privatePath)) throw new JKException('tbl_jukebox.system.path.private is not an absolute path', 101);
        $this->jukeboxPrivatePath = $privatePath;

        if (!$publicPath && !$this->fs->isAbsolutePath($publicPath)) throw new JKException('tbl_jukebox.system.path.public is not an absolute path', 104);
        $this->jukeboxPublicPath = $publicPath;

        if($publicPath && !$publicUriPrefix)  throw new JKException('tbl_jukebox.system.public_uri_prefix can\'t be null', 105);
        $this->publicUriPrefix = $publicUriPrefix;



    }


    /**
     * @return string  eg '123','456','789','012'
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
     * @return mixed|string eg '/var/jukebox/123/456/789/012/'
     */
    public function getAbsolutePath(JKFile $JKFile, $withFileName = false)
    {
        $path = ($JKFile->getPublic()) ? $this->jukeboxPublicPath : $this->jukeboxPrivatePath;
        $absolutePath = (substr($path, -1) != $this->separator) ? $path . $this->separator : $path;
        $absolutePath .= $this->getSuffixPath($JKFile);
        if($withFileName) $absolutePath .= $JKFile->getFileSlug();
        return $absolutePath;
    }

    /**
     * @param JKFile $JKFile
     * @return mixed|string eg '/uploads/_jk/0123/4567/8901/2345/'
     */
    public function getPublicAssetPath(JKFile $JKFile, $withFileName = false)
    {
        if(!$JKFile->getPublic() && $this->publicUriPrefix) throw new JKException('This document hasn\'t public url', 120);
        $web_uri = (substr($this->publicUriPrefix, -1) != $this->separator) ? $this->publicUriPrefix . $this->separator : $this->publicUriPrefix;
        $web_uri .= $this->getSuffixPath($JKFile);
        if($withFileName) $web_uri .= $JKFile->getFileSlug();
        return $web_uri;
    }

    private function getSuffixPath (JKFile $JKFile){
        $suffix = null;
        $randPath = explode(',', $JKFile->getFilePath());
        foreach ($randPath as $v) {
            $suffix .= $v . $this->separator;
        }
        return $suffix;
    }

    /**
     * @param JKFile $JKFile
     */
    public function remove(JKFile $JKFile){
        $this->fs->remove(
            $this->getAbsolutePath($JKFile,true)
        );
    }


    public function duplicate(JKFile $original,JKFile $destination){
        if(!$destination instanceof JKFile) throw new JKException('duplicate : destination must be a JKfile Object', 116);
        if($destination->getFilePath()) throw new JKException('duplicate > destination has already a file', 116);
        $destination->setFilePath($this->getNewRandPath());
        $destination->setFileName($original->getFileName());
        $this->fs->copy($this->getAbsolutePath($original).$original->getFileName(),$this->getAbsolutePath($destination).$destination->getFileName(),true);

        $destination->setFileMine($original->getFileMine());
        $destination->setFileSize($original->getFileSize());
        $destination->setFileSlug($original->getFileSlug());
        $destination->setFileExtension($original->getFileExtension());
        return $destination;
    }

    public function getBase64(JKFile $JKFile){
        return base64_encode(file_get_contents( $this->getAbsolutePath($JKFile,true)));
    }

}

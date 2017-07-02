<?php
namespace Fabgg\JukeboxBundle\Lib;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Fabgg\JukeboxBundle\Exception\JKException;
use Fabgg\JukeboxBundle\Model\JKFile;


class JukeboxIO
{
    protected $em;
    protected $session;

    protected $JKManager;

    public function __construct(EntityManager $entityManager, Session $session)
    {
        $this->em = $entityManager;
        $this->session = $session;
    }

    public function setManager(\Fabgg\JukeboxBundle\Lib\JukeboxManager $jukeboxManager){
        $this->JKManager= $jukeboxManager;
    }

    public function put($file, JKFile $JKFile){
        if($file instanceof UploadedFile){
            $originalFileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
        } elseif($file instanceof File){
            $originalFileName = $file->getFilename();
            $extension = $file->guessExtension();
        }
        $JKFile->setFilePath($this->JKManager->getNewRandPath());
        $JKFile->setFileExtension($extension);
        $JKFile->setFileMine($file->getMimeType());
        $JKFile->setFileName($originalFileName);
        $JKFile->setFileSize($file->getSize());
        $utils = new JukeboxUtils();
        $JKFile->setFileSlug($utils->slugify($originalFileName));
        $this->em->persist($JKFile);
        $this->em->flush();
        if($JKFile->getId()){
            $file->move(
                $this->JKManager->getAbsolutePath($JKFile), //Destination
                $JKFile->getFileSlug()
            );
            unset($file);
        } else {
            throw new JKException('Unable to save JKFile in db',104);
        }
        return $JKFile;
    }


    /**
     * @param JKFile $JKFile
     * @return $link
     */
    public function getLink(JKFile $JKFile, $route = null){

        if($JKFile->getPublic()){
            $link = $this->JKManager->getPublicAssetPath($JKFile);
            $link .= $JKFile->getFileSlug();
        }
        else {
            $token = 'jk_'.bin2hex(openssl_random_pseudo_bytes(8));
            $this->session->set($token,$JKFile->getId());
            // $link = 'private/'.$token.'/';
            $link = $route.'/?t='.$token;
        }
        return $link;
    }


    /**
     * @param $link
     * @return $JKFileId
     */
    public function getIdByToken($token){
        $JKFileId = $this->session->get($token);
        if($JKFileId) return $JKFileId;
        else throw new JKException('parseLink > the token in the link are not longer set',106);
    }

    /**
     * @param $link
     * @return $JKFileId
     */
    public function parseLink($link){
        $linkElements = explode('/',$link);
        if(count($linkElements)!=3) throw new JKException('parseLink > argument $link is not a jukebox link',105);
        if ($linkElements[0] == 'public') return $linkElements[1];
        elseif ($linkElements[0] == 'private'){
            $JKFileId = $this->session->get($linkElements[1]);
            if($JKFileId) return $JKFileId;
            else throw new JKException('parseLink > the token in the link are not longer set',106);
        } else throw new JKException('parseLink > unable to identify public or private link',107);

    }

    /**
     * @param JKFile $JKFile
     * @return BinaryFileResponse
     */
    public function getStream(JKFile $JKFile){
        $fullPath = $this->JKManager->getAbsolutePath($JKFile).$JKFile->getFileName();
        $response = new BinaryFileResponse($fullPath);
        $response->headers->set('Content-Type', $JKFile->getFileMine());
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $JKFile->getFileName()
        );
        return $response;
    }

    /**
     * @param JKFile $JKFile
     * @param bool|false $remove if true the file will hard deleted, else the file will be already in the application just deleted on entity set true
     */
    public function delete(JKFile $JKFile, $remove = false){
        if($remove){
            $this->JKManager->remove($JKFile);
            $this->em->remove($JKFile);
        } else{
            $JKFile->setDeleted(true);
            $this->em->merge($JKFile);
        }
        $this->em->flush($JKFile);
    }

}
<?php
namespace Fabgg\JukeboxBundle\Exception;

/**
 * Created by PhpStorm.
 * User: fabrice
 * Date: 07/12/2016
 * Time: 10:32
 *
 * code : 100 => fabgg_jukebox.system.path is null
 * code : 101 => fabgg_jukebox.system.path is not an absolute path
 * code : 102 => fabgg_jukebox.system.separator is null
 * code : 103 => fabgg_jukebox.system.separator is not ok it should be '/' or '\' depending your OS
 * code : 104 => 'Unable to save JKFile in db'
 */
class JKException extends \RuntimeException
{

    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
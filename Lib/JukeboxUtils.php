<?php
/**
 * Created by PhpStorm.
 * User: fabrice
 * Date: 10/12/2016
 * Time: 19:32
 */

namespace Fabgg\JukeboxBundle\Lib;


use Cocur\Slugify\Slugify;

class JukeboxUtils
{
    public function slugify($fileName){
        $regEx = '/\.([^.]*)$/';
        $baseName = preg_replace($regEx, null, $fileName);
        $cocurSlug = new Slugify();
        $slug = $cocurSlug->slugify($baseName);
        preg_match($regEx,$fileName,$m);
        if(count($m)>0)  $slug .= $m[0];
        return $slug;
    }

}
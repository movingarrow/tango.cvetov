<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 1/23/17
 * Time: 7:02 PM
 */

namespace AdminBundle\Service;


use AppBundle\Entity\Photo;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\DirectoryNamerInterface;

class DirectoryNamer implements DirectoryNamerInterface
{

    /**
     * Returns the name of a directory where files will be uploaded
     *
     * Directory name is formed based on event Name and media type
     *
     * @param Photo $photo
     * @param PropertyMapping $mapping
     *
     * @return string
     */
    public function directoryName($photo, PropertyMapping $mapping)
    {
        $eventName = str_replace(' ', '_', $photo->getEvent());
        $eventName = str_replace('\'', '', $eventName);

        return $eventName.'/';
    }
}
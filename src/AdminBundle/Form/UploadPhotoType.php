<?php

namespace AdminBundle\Form;

use AppBundle\Entity\Photo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UploadPhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder
//            // ...
//            ->add('name', FileType::class, array('label' => 'Photo (JPEG file)'))
//            // ...
//        ;

        $builder->add('imageFile', VichImageType::class, [
            'required' => false,
            'allow_delete' => true, // not mandatory, default is true
            'download_link' => true, // not mandatory, default is true
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Photo::class,
        ));
    }
}

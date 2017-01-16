<?php

namespace AdminBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('category', EntityType::class, [
                'class' => Category::class
            ])
            ->add('enabled')
//            ->add('imageFile', FileType::class)
            ->add('photo', CollectionType::class, array(
                'label' => false,
                'entry_type' => PhotoType::class,
                'allow_add'    => true,
                'by_reference' => false,
                'allow_delete' => true,

            ));

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class
        ]);
    }
}

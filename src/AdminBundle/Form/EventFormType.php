<?php

namespace AdminBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //        $builder
//            ->add('name')
//            ->add('subFamily', EntityType::class, [
//                'placeholder' => 'Choose a Sub Family',
//                'class' => SubFamily::class,
//                'query_builder' => function(SubFamilyRepository $repo){
//                    return $repo->createAlphabeticalQueryBuilder();
//                }
//            ])
//            ->add('speciesCount')
//            ->add('funFact')
//            ->add('isPublished', ChoiceType::class, [
//                'choices' => [
//                    'Yes' => true,
//                    'No' => false,
//                ]
//            ])
//            ->add('firstDiscoveredAt', DateType::class, [
//                'widget' => 'single_text',
//                'attr' => ['class' => 'js-datepicker'],
//                'html5' => false,
//            ])
//        ;
        $builder
            ->add('name')
            ->add('description')
            ->add('category', EntityType::class, [
                'class' => Category::class
            ])
            ->add('photo', CollectionType::class, array(
                'entry_type' => PhotoFormType::class,
                'allow_add' => true,
            ))
//            ->add('video')

            ->add('enabled')
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class
        ]);
    }
}

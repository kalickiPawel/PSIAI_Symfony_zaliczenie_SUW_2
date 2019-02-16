<?php

namespace AppBundle\Form;

use AppBundle\Entity\Lecture;
use AppBundle\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class LectureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name')
        ->add('course', EntityType::class, array(
            'class' => 'AppBundle:Course',
            'choice_label' => 'name',
            #'choices' => $group->getName(),
            #'choices_as_values' => true,
        ))
        ->add('lectureFile', FileType::class, array('label' => 'Lecture (PDF file)'))
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Lecture::class
            #'data_class' => 'AppBundle\Entity\Lecture'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_lecture';
    }


}

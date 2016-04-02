<?php

namespace AbleSpec\ExpertBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecentNewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('field')
            ->add('title')
            ->add('creationdate')
            ->add('content')
           // ->add('expert')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AbleSpec\ExpertBundle\Entity\RecentNews'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ablespec_expertbundle_recentnews';
    }
}

<?php

namespace AbleSpec\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExpertType extends AbstractType {

    // The password is set by AppBundle\Entity\User
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('useralias') 
                ->add('user', null, array('label' => "사용자 로그인ID"))
                ->add('address')
                ->add('email')
                ->add('phone')
                ->add('packages', 'entity', array(
                    'class' => 'AbleSpecAdminBundle:Package',  
                   // 'choices' => $this->getPackages(),
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => true,
                ))
                ->add('registrationNumber')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AbleSpec\AdminBundle\Entity\Expert'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'appbundle_expert';
    }

    private function getPackages() {
        // Get packages list
        $packages = array();
//        $em = $this->getDoctrine()->getManager();
//        $packs = $em->getRepository('AbleSpecAdminBundle:Package')->findAll();

        foreach ($packs as $key => $name) {
            array_push($packages, $name);
        }

        return $packages;
    }

}

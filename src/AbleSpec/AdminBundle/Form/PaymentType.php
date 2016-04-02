<?php

namespace AbleSpec\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('status')
                ->add('amount')
                ->add('expert')
                ->add('transactionCode')
                ->add('description')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AbleSpec\AdminBundle\Entity\Payment'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'appbundle_payment';
    }

}

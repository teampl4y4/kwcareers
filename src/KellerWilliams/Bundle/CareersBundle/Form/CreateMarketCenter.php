<?php

namespace KellerWilliams\Bundle\CareersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateMarketCenter extends AbstractType
{

    /**
     * Builds the AddUser form
     * @param  \Symfony\Component\Form\FormBuilder $builder
     * @param  array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //mc meta
        $builder->add('name');
        $builder->add('description');

        //mc addy
        $builder->add('address');
        $builder->add('zip');

        //mc op info
        $builder->add('principleFirstName');
        $builder->add('principleLastName');
        $builder->add('principleEmail');
    }

    /**
     * Returns the default options/class for this form.
     * @param array $options
     * @return array The default options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'KellerWilliams\Bundle\CareersBundle\Entity\MarketCenter'
        );
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     * @return string
     */
    public function getName()
    {
        return 'create_market_center';
    }

}
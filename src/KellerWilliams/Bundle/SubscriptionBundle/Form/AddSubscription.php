<?php

namespace KellerWilliams\Bundle\SubscriptionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AddSubscription extends AbstractType
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
//        $builder->add('billingFirstName');
//        $builder->add('billingLastName');
        $builder->add('creditcardNumber');
        $builder->add('expirationMonth');
        $builder->add('expirationYear');
//        $builder->add('cvvCode');
//        $builder->add('billingZip');
    }

    /**
     * Returns the default options/class for this form.
     * @param array $options
     * @return array The default options
     */
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'KellerWilliams\Bundle\SubscriptionBundle\Entity\Subscription'
        );
    }

    /**
     * Mandatory in Symfony2
     * Gets the unique name of this form.
     * @return string
     */
    public function getName()
    {
        return 'add_subscription';
    }

}
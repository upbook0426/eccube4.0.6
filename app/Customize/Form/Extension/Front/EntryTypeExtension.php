<?php

namespace Customize\Form\Extension\Front;

use Eccube\Form\Type\Front\EntryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class EntryTypeExtension extends AbstractTypeExtension
{
    public function getExtendedType()
    {
        return EntryType::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('registration_type',ChoiceType::class,[
                'required' => true,
                'choices' => [
                    trans('front.customer.corporation.label') => 0,
                    trans('front.customer.individual.label') => 1,
                ],
                'label' => false,
                'expanded' => true,
                'multiple' => false,
            ]);

        $builder
            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event){
                $form = $event->getForm()->get('company_name');
                /** @var Customer $data */
                $data = $event->getData();

                $registrationType = $data->getRegistrationType();
                if( $registrationType === 0){
                    if( $form->getData() === null ){
                        $form->addError(new FormError('登録方法が法人の場合は、必須となります。'));
                    }
                }
            });
    }
}

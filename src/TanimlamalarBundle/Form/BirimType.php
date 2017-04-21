<?php

namespace TanimlamalarBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BirimType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('yeterlilik', EntityType::class, array(
            'class' => 'TanimlamalarBundle\Entity\Yeterlilik',
            'choice_label' => 'ad',
            'choice_value' => 'id',
            'label' => 'Yeterlilik :',
            'required' => false,
            'placeholder' => 'Seçiniz'
        ))
            ->add('ad', TextType::class, array('label' => 'Birim Adı : ','required' => false))
            ->add('kod', TextType::class, array('label' => 'Birim Kodu : ','required' => false))

            ->add('tip', ChoiceType::class, array(
                'placeholder' => 'Seçiniz',
                'required' => false,

                'choices'  => array(
                    'Zorunlu' => 'zorunlu',
                    'Seçmeli' => 'secmeli'
                ),
            ))
            ->add('fiyat', TextType::class, array('label' => 'Fiyat : ','required' => false))



            ->add('save', SubmitType::class, array('label' => 'Kaydet'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tanimlamalar_bundle_birim_type';
    }
}

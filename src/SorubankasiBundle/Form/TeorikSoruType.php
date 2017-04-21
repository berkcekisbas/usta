<?php

namespace SorubankasiBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TeorikSoruType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('yeterlilik', TextType::class, array('data' => 'sdf','label' => 'Yeterlilik : ','required' => false,'disabled' => true))
            ->add('birim', TextareaType::class, array('label' => 'Birim : ','required' => false))

            ->add('soru', TextareaType::class, array('label' => 'Soru : ','required' => false,'property_path' => false,'mapped' => false,'multiple' => false))
            ->add('zorlukderecesi', ChoiceType::class, array('placeholder' => 'Seçiniz','required' => false,
                'choices'  => array(
                    '1' => "1",
                    '2' => "2",
                    '3' => "3",
                ),'label' => 'Zorluk Derecesi :'))

            ->add('save', SubmitType::class, array('label' => 'Kaydet'));

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'sorubankasi_bundle_teorik_soru_type';
    }
}

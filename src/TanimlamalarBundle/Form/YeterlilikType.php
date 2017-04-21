<?php

namespace TanimlamalarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class YeterlilikType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('kod', TextType::class, array('label' => 'Yeterlilik Kodu : ','required' => false))
            ->add('ad', TextType::class, array('label' => 'Yeterlilik Adı : ','required' => false))
            ->add('seviye', TextType::class, array('label' => 'Yeterlilik Seviye : ','required' => false))
            ->add('sektor', TextType::class, array('label' => 'Yeterlilik Sektör : ','required' => false))
            ->add('revizyon', TextType::class, array('label' => 'Revizyon Sayısı : ','required' => false))
            ->add('onaytarihi', TextType::class, array('label' => 'Onay Tarihi : ','required' => false))
            ->add('onaysayisi', TextType::class, array('label' => 'Onay Sayısı : ','required' => false))
            ->add('t1sorusayisi', TextType::class, array('label' => 'T1 Soru Sayısı : ','required' => false))
            ->add('t2sorusayisi', TextType::class, array('label' => 'T2 Soru Sayısı : ','required' => false))
            ->add('t1gecmepuani', TextType::class, array('label' => 'T1 Geçme Puanı : ','required' => false))
            ->add('t2gecmepuani', TextType::class, array('label' => 'T2 Geçme Puanı : ','required' => false))
            ->add('belgegecerliliksuresi', TextType::class, array('label' => 'Belge Geçerlilik Süresi : ','required' => false))

            ->add('aktif', ChoiceType::class, array(
                'choices'  => array(
                    'Evet' => true,
                    'Hayır' => false,
                )))

            ->add('save', SubmitType::class, array('label' => 'Kaydet'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'tanimlamalar_bundle_yeterlilik_type';
    }
}

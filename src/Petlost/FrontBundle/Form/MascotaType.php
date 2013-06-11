<?php
namespace Petlost\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class MascotaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nombre')
                ->add('categoria')
                ->add('sexo','choice',array('choices'=>
                    array(
                    "macho"=>"Macho","hembra"=>"Hembra"
                )))
                ->add('raza')
                ->add('identificacion','choice',array(
                    'choices'=>  array("ninguno"=>"Ninguno","collar"=>"Collar","tatuaje"=>"Tatuaje","chip"=>"Chip")
                ))
                ->add('enfermedad')
                ->add('fotos','collection',array(
                    'type'=>new FotoType(),
                    'allow_add'=>true,
                ))


        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Petlost\FrontBundle\Entity\Mascota'
        ));
    }

    public function getName() {
        return 'mascota';
    }

}
?>

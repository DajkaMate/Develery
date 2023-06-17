<?php

namespace App\Form;

use App\Entity\Develery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DeveleryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Neved',
                'attr' => ['placeholder' => 'Írd be a neved'],
                'required' => false])
            ->add('email', TextType::class, [
                'label'=>'E-mail címed',
                'attr' => ['placeholder' => 'Írd be az email címed'],
                'required' => false])
            ->add('text', TextareaType::class, [
                'label'=>'Üzenet szövege',
                'attr' => ['placeholder' => 'Írd ide az üzenetedet...','rows' => 6],
                'required' => false]); 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'constraints' => [],
        ]);
    }
}

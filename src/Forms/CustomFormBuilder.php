<?php
namespace App\Forms;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Required;

class CustomFormBuilder
{

    public function buildForm(FormBuilderInterface $builder): FormInterface
    {
        return $builder
            ->add('email', TextType::class, [
                'constraints' => [
                    new Required(),
                    new Email(),
                ]
            ])
            ->add('name', TextType::class, [
                'constraints' => [
                    new Required(),
                    new Length([
                        'min' => 5,
                        'max' => 50
                    ]),
                 ]
            ])
            ->add('nickname', TextType::class, [
                'constraints' => [
                    new Required(),
                    new Length([
                        'min' => 8,
                        'max' => 20
                    ]),
                ]
            ])
            ->getForm();
    }
}
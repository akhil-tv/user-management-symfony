<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr'=>[
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Please Enter Your Name',
                    'required' => true

                ]
            ])
            ->add('email',EmailType::class,[
                'attr'=>[
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Please Enter Your Email',
                    'required' => true


                ],
                'constraints' => [
                    new Length([
                        'min' => 3,
                        'max' => 100,
                        'minMessage' => 'Email should be at least {{ limit }} characters long',
                        'maxMessage' => 'Email should be less than {{ limit }} characters long',
                    ])
                ]
            ])
            ->add('phone',TelType::class,[
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Please Enter Your Phone Number',
                    'required' => true


                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\+?[1-9]\d/',
                        'match' => true,
                        'message' => 'Invalid characters'
                    ]),
                    new Length([
                        'min' => 10,
                        'max' => 13,
                        'minMessage' => 'Your contact number is too short',
                        'maxMessage' => 'Your contact number is too long',
                    ])
                ]
            ])
            ->add('city',TextType::class,[
                'attr'=>[
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Please Enter Your City',
                    'required' => true


                ]
            ])
            ->add('submit',SubmitType::class,[
                'attr' =>[
                    'class' => 'btn btn-primary btn-user btn-block'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
        ]);
    }
}
//<input type="email" class="form-control form-control-user" id="email"
//                                           placeholder="Email Address" name="email">

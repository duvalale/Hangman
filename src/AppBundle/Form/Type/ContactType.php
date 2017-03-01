<?php
/**
 * Created by PhpStorm.
 * User: alexandraduval
 * Date: 01/03/2017
 * Time: 11:32
 */

namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;


class ContactType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject')
            ->add('message', TextareaType::class)
            ->add('email', EmailType::class);
    }
}
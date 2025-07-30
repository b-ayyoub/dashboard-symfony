<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    // configure le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // ajoute un champ 'search', non lié à une entité (mapped: false)
        $builder
            ->add('search', TextType::class, [
                'label' => false,
                'mapped' => false,// important, car ce champ n'existe dans aucune entité
                'attr' => ['placeholder' => 'Rechercher un produit...'],
                'required' => false,// peut être vide
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'GET',// permet d’avoir l’URL avec ?search=...
            'csrf_protection' => false,// logique ici, car recherche non connectée à la sécurité
        ]);
    }
}

<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

//    /**
//     * @return Produit[] Returns an array of Produit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

// Cette méthode reçoit une chaîne (le mot-clé tapé par l’utilisateur) et retourne un tableau de produits correspondants.
public function findBySearch(string|array|null $searchText): array
{
    // Sécurisation : si jamais $searchText est un tableau, on le convertit
    if (is_array($searchText)) {
        $searchText = implode(' ', $searchText);
    }

    // Par défaut, on retourne tous les produits si aucun critère
    if (empty($searchText)) {
        return $this->findAll();
    }

    // Création du QueryBuilder sur l'entité Produit alias "p"
    $qb = $this->createQueryBuilder('p');

    // On construit la condition dynamique
    $qb->where('p.libelle LIKE :search')
       ->orWhere('p.reference LIKE :search')
       ->setParameter('search', $searchText);

    // Exécution de la requête
    return $qb->getQuery()->getResult();
}

}


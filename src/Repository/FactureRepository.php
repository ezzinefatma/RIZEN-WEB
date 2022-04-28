<?php

namespace App\Repository;
use App\Entity\Facture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @method Facture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facture[]    findAll()
 * @method Facture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class FactureRepository extends  ServiceEntityRepository
{

    public function __construct(ManagerRegistry  $registry)
    {
        parent::__construct($registry, Facture::class);
    }


    /**
     * Returns number of "Facture"
     * @return void
     */

    public function number0fFacture()
    {

        $query = $this->createQueryBuilder('a')
            ->select('COUNT(a) as countee');

        return $query->getQuery()->getResult();
    }
    /**
     * Returns number of "Promotion"
     * @return void
     */

    public function SUMprixfactur()
    {

        $query = $this->createQueryBuilder('a')
            ->select('SUM(a.prixtot) as suump');


        return $query->getQuery()->getResult();
    }

    /**
     * Returns number of "Promotion"
     * @return void
     */

    public function SUMquantitefacture()
    {

        $query = $this->createQueryBuilder('a')

            ->select('SUM(a.quantite) as su');

        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Categories[] Returns an array of Categories objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Categories
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
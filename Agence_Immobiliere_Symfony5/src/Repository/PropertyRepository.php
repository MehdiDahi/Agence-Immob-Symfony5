<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\PropertySearch;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository {

    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Property::class);
    }

    /**
     * @return Property[] Returns an array of Property objects
     */
    public function findAllVisibleQuery(PropertySearch $search) {
        $query =  $this->findVisibleQuery();
        
        if($search->getMaxPrice())
        {
            $query = $query->andWhere('p.price <= :maxPrice')
                            ->setParameter('maxPrice', $search->getMaxPrice());
        }
        
        if($search->getMinSurface())
        {
            $query = $query->andWhere('p.surface >= :minSurface')
                            ->setParameter('minSurface', $search->getMinSurface());
        }
        
        if($search->getOptions()->count() > 0)
        {
            $k = 0;
            foreach ($search->getOptions() as $option)
            {
                $k++;
                $query = $query->andWhere(":option$k MEMBER OF p.options")
                            ->setParameter("option$k", $option);
            }
            
        }
                       
        return $query->getQuery();
    }

    /**
     * @return Property[] Returns an array of Property objects
     */
    public function findLatest() {
        return $this->findVisibleQuery()
                        ->setMaxResults(4)
                        ->getQuery()
                        ->getResult();
    }

    private function findVisibleQuery() {
        return $this->createQueryBuilder('p')
                    ->Where('p.sold = false');
    }

    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
      public function findByExampleField($value)
      {
      return $this->createQueryBuilder('p')
      ->andWhere('p.exampleField = :val')
      ->setParameter('val', $value)
      ->orderBy('p.id', 'ASC')
      ->setMaxResults(10)
      ->getQuery()
      ->getResult()
      ;
      }
     */

    /*
      public function findOneBySomeField($value): ?Property
      {
      return $this->createQueryBuilder('p')
      ->andWhere('p.exampleField = :val')
      ->setParameter('val', $value)
      ->getQuery()
      ->getOneOrNullResult()
      ;
      }
     */
}

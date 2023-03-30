<?php

namespace App\Repository;

use App\Entity\RequesterContactInfos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RequesterContactInfos>
 *
 * @method RequesterContactInfos|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequesterContactInfos|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequesterContactInfos[]    findAll()
 * @method RequesterContactInfos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequesterContactInfosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RequesterContactInfos::class);
    }

    public function save(RequesterContactInfos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RequesterContactInfos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RequesterContactInfos[] Returns an array of RequesterContactInfos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RequesterContactInfos
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

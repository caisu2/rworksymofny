<?php

namespace App\Repository;

use App\Entity\RequesterContactInfos;
use App\Entity\Requesters;
use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Requesters>
 *
 * @method Requesters|null find($id, $lockMode = null, $lockVersion = null)
 * @method Requesters|null findOneBy(array $criteria, array $orderBy = null)
 * @method Requesters[]    findAll()
 * @method Requesters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequestersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Requesters::class);
    }

    public function remove(Requesters $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function save($data = []) 
    {
        foreach($data as $value) {
            $entity = $this->getEntityManager()->find(Requesters::class, $value['id']);
            $userEntity = $this->getEntityManager()->find(Users::class, $entity->getReqUserId());

            $userEntity->setActive($value['active']);
            $this->getEntityManager()->persist($userEntity);
            $this->getEntityManager()->flush();
        }

        return true;
    }

    public function softDelete($id)
    {
        $entity = $this->getEntityManager()->find(Requesters::class, $id );
        $entity->setReqDeleted(1);

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        return true;
    }

    public function denyRequester($id)
    {
        $entity = $this->getEntityManager()->find(Requesters::class, $id );
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();

        return true;
    }

    public function getRequesterList()
    {
        $entity = $this->getEntityManager();
        $queryBuilder = $entity->createQueryBuilder();

        $queryBuilder->addSelect('r.id');
        $queryBuilder->addSelect('r.req_first_name AS first_name');
        $queryBuilder->addSelect('r.req_last_name AS last_name');
        $queryBuilder->addSelect('r.req_is_approved AS is_approve');
        $queryBuilder->addSelect('rci_cphone.rci_value AS req_cellphone');
        $queryBuilder->addSelect('rci_ophone.rci_value AS req_officephone');
        $queryBuilder->addSelect('rci_oxphone.rci_value AS req_officephone_ext');

        $queryBuilder->addSelect('u.is_from_ldap AS ldap');
        $queryBuilder->addSelect('u.active AS active');


        $queryBuilder->from(Requesters::class, 'r');
        $queryBuilder->innerJoin(Users::class, 'u', 'WITH', 'u.id = r.req_user_id');
        $queryBuilder->leftJoin(RequesterContactInfos::class, 'rci_cphone', 'WITH', 'rci_cphone.rci_requester_id = r.id AND rci_cphone.rci_contact_type_id = 10');
        $queryBuilder->leftJoin(RequesterContactInfos::class, 'rci_ophone', 'WITH', 'rci_ophone.rci_requester_id = r.id AND rci_ophone.rci_contact_type_id = 8');
        $queryBuilder->leftJoin(RequesterContactInfos::class, 'rci_oxphone', 'WITH', 'rci_oxphone.rci_requester_id = r.id AND rci_oxphone.rci_contact_type_id = 9');
        
        $queryBuilder->andWhere('r.req_deleted = 0');
        $queryBuilder->orderBy('r.req_last_name, r.req_first_name');

        $result = $queryBuilder->getQuery()->execute();

        return $result;
    }

//    /**
//     * @return Requesters[] Returns an array of Requesters objects
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

//    public function findOneBySomeField($value): ?Requesters
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

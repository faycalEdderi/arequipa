<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\ExerciceDone;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<ExerciceDone>
 *
 * @method ExerciceDone|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExerciceDone|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExerciceDone[]    findAll()
 * @method ExerciceDone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExerciceDoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExerciceDone::class);
    }

    public function save(ExerciceDone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ExerciceDone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return ExerciceDone[] Returns an array of ExerciceDone objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    public function findProgramByUser(User $user): ?array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
}

<?php

namespace App\Repository;

use App\Entity\Pedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pedido>
 *
 * @method Pedido|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pedido|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pedido[]    findAll()
 * @method Pedido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pedido::class);
    }

//    /**
//     * @return Pedido[] Returns an array of Pedido objects
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

    public function findAllByUser(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p.id FROM App\Entity\Pedido p WHERE p.usuario=:id'
        )->setParameter('id', $id);

        $arrayOf =  $query->getResult();

        $fullArray = [];

        for ($i = 0; $i < count($arrayOf); $i++) {
            foreach ($arrayOf[$i] as $id => $idPedido) {

                $productosEnForeach = $entityManager->getRepository(Pedido::class)->find($arrayOf[$i]['id']);

                $fullArray[] = $productosEnForeach;
            }
        }

        return $fullArray;


    }
}

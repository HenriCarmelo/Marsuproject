<?php
namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
       public function listeAmis($idUtilisateur) {
        return $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('u,a')
                        ->from('AppBundle:User','u')
                        ->leftJoin('u.amis', 'a')
                        ->where('u.id = :idUtilisateur')
                        ->setParameter('idUtilisateur', $idUtilisateur)
                        ->getQuery()
                        ->getOneOrNullResult(Query::HYDRATE_ARRAY);
    } 
         public function liste() {
        return $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('u')
                        ->from('AppBundle:User','u')
                        ->getQuery()
                        ->getResult(Query::HYDRATE_ARRAY);
    }      
}
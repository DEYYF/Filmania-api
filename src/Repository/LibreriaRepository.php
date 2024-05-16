<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository as ORMEntityRepository;

class LibreriaRepository extends ORMEntityRepository
{
    public function findContenidoLibreria($id_libreria)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.Titulo, M.Imagen
        FROM Media M
        join Libreria_Media P on M.id = P.id_media
        join Libreria L on P.id_libreria = L.id  
        where L.id = :id_libreria;" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id_libreria', $id_libreria);
        $results = $stmt->executeQuery()->fetchAllAssociative();

        return $results;
    }
 
}
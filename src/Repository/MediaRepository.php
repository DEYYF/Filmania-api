<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository as ORMEntityRepository;

class MediaRepository extends ORMEntityRepository
{
    public function findSerieGenero($id_g, $id_g2, $id_g3)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, D.Temporadas, D.Ano, D.Trailer, D.Valoracion
        from Media M
        join Detalle_Serie D on m.id = D.id_serie
        join Genero_Media G on m.id = G.id_media
        where M.Tipo = 2 and (G.id_genero = :id_g or G.id_genero = :id_g2 or G.id_genero = :id_g3)" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id_g', $id_g);
        $stmt->bindValue('id_g2', $id_g2);
        $stmt->bindValue('id_g3', $id_g3);
        $results = $stmt->executeQuery()->fetchAllAssociative();

        return $results;
    }


    public function findPeliculaGenero($id_g, $id_g2, $id_g3)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, D.Duracion, D.Ano, D.Trailer, D.Valoracion
        from Media M
        join Detalle_Pelicula D on m.id = D.id_pelicula
        join Genero_Media G on m.id = G.id_media
        where M.Tipo = 1 and (G.id_genero = :id_g or G.id_genero = :id_g2 or G.id_genero = :id_g3);" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id_g', $id_g);
        $stmt->bindValue('id_g2', $id_g2);
        $stmt->bindValue('id_g3', $id_g3);
        $results = $stmt->executeQuery()->fetchAllAssociative();

        return $results;
    }

    public function findNoticiaGenero($id_g, $id_g2, $id_g3)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, M.Tipo
        from Media M
        join Genero_Media G on m.id = G.id_media
        where M.Tipo = 3 and (G.id_genero = :id_g or G.id_genero = :id_g2 or G.id_genero = :id_g3);" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id_g', $id_g);
        $stmt->bindValue('id_g2', $id_g2);
        $stmt->bindValue('id_g3', $id_g3);
        $results = $stmt->executeQuery()->fetchAllAssociative();
        

        return $results;
    }


    public function findBusquedaGenero($id_g)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = " SELECT M.id, M.Titulo, M.Descripcion, M.Imagen
        from Media M
        join Genero_Media G on M.id = G.id_media
        where (M.Tipo = 1 or M.Tipo = 2) and G.id_genero = :id_g; " ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id_g', $id_g);
        $results = $stmt->executeQuery()->fetchAllAssociative();

        return $results;
    }


    public function findBusquedaYear($year)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, S.Valoracion
		from Media M
        join Detalle_Serie S on M.id = S.id_serie
        where (M.Tipo = 1 or M.Tipo = 2) and S.Ano = :ano
        UNION ALL
        SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, P.Valoracion
		from Media M
        join Detalle_Pelicula P on M.id = P.id_pelicula
        where (M.Tipo = 1 or M.Tipo = 2) and P.Ano = :ano ;";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('ano', $year);
        $results = $stmt->executeQuery()->fetchAllAssociative();
        

        return $results;
    }

    public function findBusquedaYearGenero($year, $id_g)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, S.Valoracion
		from Media M
        join Genero_Media G on M.id = G.id_media
        join Detalle_Serie S on M.id = S.id_serie
        where (M.Tipo = 1 or M.Tipo = 2) and S.Ano = :ano and G.id_genero = :id_g
        UNION ALL
        SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, P.Valoracion
		from Media M
        join Genero_Media G on M.id = G.id_media
        join Detalle_Pelicula P on M.id = P.id_pelicula
        where (M.Tipo = 1 or M.Tipo = 2) and P.Ano = :ano and G.id_genero = :id_g  ;";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('ano', $year);
        $stmt->bindValue('id_g', $id_g);
        $results = $stmt->executeQuery()->fetchAllAssociative();
        

        return $results;
    }










}
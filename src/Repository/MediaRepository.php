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
        join Detalle_Serie D on M.id = D.id_serie
        join Genero_Media G on M.id = G.id_media
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
        join Detalle_Pelicula D on M.id = D.id_pelicula
        join Genero_Media G on M.id = G.id_media
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
        join Genero_Media G on M.id = G.id_media
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
    
        $sql = " SELECT 
        M.id, 
        M.Titulo,  
        M.Imagen, 
        S.Valoracion,
        CASE 
            WHEN M.Tipo = 2 THEN 'Serie' 
            ELSE 'Desconocido' 
        END AS Tipo
    FROM 
        Media M
    JOIN 
        Detalle_Serie S ON M.id = S.id_serie
    JOIN 
        Genero_Media G ON M.id = G.id_media
    JOIN 
        Genero t ON G.id_genero = t.id
    WHERE 
        M.Tipo = 2 
        AND t.Nombre = :id_g
    
    UNION ALL
    
    SELECT 
        M.id, 
        M.Titulo, 
        M.Imagen, 
        P.Valoracion,
        CASE 
            WHEN M.Tipo = 1 THEN 'Película' 
            ELSE 'Desconocido' 
        END AS Tipo
    FROM 
        Media M
    JOIN 
        Detalle_Pelicula P ON M.id = P.id_pelicula
    JOIN 
        Genero_Media G ON M.id = G.id_media
    JOIN 
        Genero t ON G.id_genero = t.id
    WHERE 
        M.Tipo = 1 
        AND t.Nombre = :id_g;";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_g', $id_g);
        $results = $stmt->executeQuery()->fetchAllAssociative();
    
        return $results;
    }
    


    public function findBusquedaYear($year)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT 
        M.id, 
        M.Titulo, 
        M.Imagen, 
        S.Valoracion,
        CASE 
            WHEN M.Tipo = 2 THEN 'Serie' 
            WHEN M.Tipo = 1 THEN 'Película' 
            ELSE 'Desconocido' 
        END AS Tipo
    FROM 
        Media M
    JOIN 
        Detalle_Serie S ON M.id = S.id_serie
    WHERE 
        (M.Tipo = 1 OR M.Tipo = 2) 
        AND S.Ano = :ano
    
    UNION ALL
    
    SELECT 
        M.id, 
        M.Titulo, 
        M.Imagen, 
        P.Valoracion,
        CASE 
            WHEN M.Tipo = 2 THEN 'Serie' 
            WHEN M.Tipo = 1 THEN 'Película' 
            ELSE 'Desconocido' 
        END AS Tipo
    FROM 
        Media M
    JOIN 
        Detalle_Pelicula P ON M.id = P.id_pelicula
    WHERE 
        (M.Tipo = 1 OR M.Tipo = 2) 
        AND P.Ano = :ano;
    ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('ano', $year);
        $results = $stmt->executeQuery()->fetchAllAssociative();
        

        return $results;
    }

    public function findBusquedaYearGenero($year, $id_g)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT 
        M.id, 
        M.Titulo, 
        M.Imagen, 
        COALESCE(S.Valoracion, P.Valoracion) AS Valoracion,
        CASE 
            WHEN M.Tipo = 2 THEN 'Serie' 
            WHEN M.Tipo = 1 THEN 'Película' 
            ELSE 'Desconocido' 
        END AS Tipo
    FROM 
        Media M
    JOIN 
        Genero_Media G ON M.id = G.id_media
    LEFT JOIN 
        Detalle_Serie S ON M.id = S.id_serie AND M.Tipo = 2 AND S.Ano = :ano
    LEFT JOIN 
        Detalle_Pelicula P ON M.id = P.id_pelicula AND M.Tipo = 1 AND P.Ano = :ano
    JOIN 
        Genero t ON G.id_genero = t.id
    WHERE 
        (M.Tipo = 1 OR M.Tipo = 2) 
        AND t.Nombre = :id_g
        AND (S.Ano = :ano OR P.Ano = :ano);
    ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('ano', $year);
        $stmt->bindValue('id_g', $id_g);
        $results = $stmt->executeQuery()->fetchAllAssociative();
        

        return $results;
    }


    public function findVistoAnteriormente($id_user)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT M.id, M.Titulo, M.Descripcion, M.Imagen, M.Tipo
        from Media M
        join Visto_Anteriormente V on M.id = V.id_media
        where V.id_user = :id_user;" ;

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id_user', $id_user);
        $results = $stmt->executeQuery()->fetchAllAssociative();

        return $results;
    }

}
<?php

namespace App\Controller;

use App\Entity\DetallePelicula;
use App\Entity\Media;
use App\Entity\Tipo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class PeliculaController extends AbstractController
{
   public function Peliculas(Request $request, SerializerInterface $serializer)
   {
        if ($request->isMethod('GET')) 
        {
            $Pelicula = [];
            
            $tipo = $this->getDoctrine()
                ->getRepository(Tipo::class)
                ->findOneBy( ['id' => 1]);

            $medias = $this->getDoctrine()->getRepository(Media::class)
                ->findBy(['tipo' => $tipo]);
            
            
            foreach ($medias as $media) {
                $detalle = $this->getDoctrine()->getRepository(DetallePelicula::class)
                    ->findoneBy(['idPelicula' => $media]);

                $Pelicula  = [
                    'id' => $media->getId(),
                    'Titulo' => $media->getTitulo(),
                    'Descripcion' => $media->getDescripcion(),
                    'Imagen' => $media->getImagen(),
                    'Duracion' => $detalle->getDuracion(),
                    'Trailer' => $detalle->getTrailer(),
                    'Ano' => $detalle->getAno(),
                    'Valoracion' => $detalle->getValoracion(),
                ];
            }

            return new Response($serializer->serialize($Pelicula, 'json'));
            
            
        }
        
   }

   public function pelicula_id(Request $request, SerializerInterface $serializer)
   {
        if ($request->isMethod('GET')) 
        {
            $id = $_GET['id'];


            $media = $this->getDoctrine()->getRepository(Media::class)
            ->findOneBy(['id' => $id]);

            $detalle = $this->getDoctrine()->getRepository(DetallePelicula::class)
            ->findOneBy(['idPelicula' => $media]);

            $Pelicula = [
                'id' => $media->getId(),
                'Titulo' => $media->getTitulo(),
                'Descripcion' => $media->getDescripcion(),
                'Imagen' => $media->getImagen(),
                'Duracion' => $detalle->getDuracion(),
                'Trailer' => $detalle->getTrailer(),
                'Ano' => $detalle->getAno(),
                'Valoracion' => $detalle->getValoracion(),
            ];

            return new Response($serializer->serialize($Pelicula, 'json'));
        }
        
   }


   public function Pelicula_genero(Request $request, SerializerInterface $serializer)
   {

        if ($request->isMethod('GET')) 
        {
            $id_g = $_GET['id_g'];
            $id_g2 = $_GET['id_g2'];
            $id_g3 = $_GET['id_g3'];

            $medias = $this->getDoctrine()->getRepository(Media::class)->findPeliculaGenero($id_g, $id_g2, $id_g3);
            
            return new Response($serializer->serialize($medias, 'json'));
        }
    }
    
}

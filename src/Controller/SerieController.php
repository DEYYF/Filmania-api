<?php

namespace App\Controller;

use App\Entity\DetalleSerie;
use App\Entity\Media;
use App\Entity\Tipo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class SerieController extends AbstractController
{
   public function series(Request $request, SerializerInterface $serializer)
   {
        if ($request->isMethod('GET')) 
        {
            $tipo = $this->getDoctrine()
                ->getRepository(Tipo::class)
                ->findOneBy( ['id' => 2]);

            $medias = $this->getDoctrine()->getRepository(Media::class)
                ->findBy(['tipo' => $tipo]);
            
            
            foreach ($medias as $media) {
                $detalle = $this->getDoctrine()->getRepository(DetalleSerie::class)
                    ->findoneBy(['idSerie' => $media]);

                $Serie [] = [
                    'id' => $media->getId(),
                    'Titulo' => $media->getTitulo(),
                    'Descripcion' => $media->getDescripcion(),
                    'Imagen' => $media->getImagen(),
                    'Temporadas' => $detalle->getTemporadas(),
                    'Trailer' => $detalle->getTrailer(),
                    'Ano' => $detalle->getAno(),
                    'Valoracion' => $detalle->getValoracion(),
                ];
            }

            return new Response($serializer->serialize($Serie, 'json'));
            
            
        }
        
   }

   public function serie_id(Request $request, SerializerInterface $serializer)
   {
        if ($request->isMethod('GET')) 
        {
            $id = $_GET['id'];


            $media = $this->getDoctrine()->getRepository(Media::class)
            ->findOneBy(['id' => $id]);

            $detalle = $this->getDoctrine()->getRepository(DetalleSerie::class)
            ->findOneBy(['idSerie' => $media]);

            $Serie = [
                'id' => $media->getId(),
                'Titulo' => $media->getTitulo(),
                'Descripcion' => $media->getDescripcion(),
                'Imagen' => $media->getImagen(),
                'Temporadas' => $detalle->getTemporadas(),
                'Trailer' => $detalle->getTrailer(),
                'Ano' => $detalle->getAno(),
                'Valoracion' => $detalle->getValoracion(),
            ];

            return new Response($serializer->serialize($Serie, 'json'));
        }
        
   }

   
   public function serie_genero(Request $request, SerializerInterface $serializer)
   {

        if ($request->isMethod('GET')) 
        {
            $id_g = $_GET['id_g'];
            $id_g2 = $_GET['id_g2'];
            $id_g3 = $_GET['id_g3'];

            $medias = $this->getDoctrine()->getRepository(Media::class)->findSerieGenero($id_g, $id_g2, $id_g3);
            
            return new Response($serializer->serialize($medias, 'json'));
        }
    }
    
}

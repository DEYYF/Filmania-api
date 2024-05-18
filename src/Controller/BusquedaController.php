<?php

namespace App\Controller;

use App\Entity\GeneroMedia;
use App\Entity\Media;
use App\Entity\Tipo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class BusquedaController extends AbstractController
{
    public function busquedaAll(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $tipo_peli = $this->getDoctrine()
                ->getRepository(Tipo::class)
                ->findOneBy(['id' => 1]);

            $tipo_serie = $this->getDoctrine()->getRepository(Tipo::class)
                ->findOneBy(['id' => 2]);


            $busqueda1 = $this->getDoctrine()->getRepository(Media::class)
                ->findBy(['tipo' => $tipo_peli]);
            
            $busqueda2 = $this->getDoctrine()->getRepository(Media::class)->findBy(['tipo' => $tipo_serie]);

            $busqueda = array_merge($busqueda2, $busqueda1);

            return new Response($serializer->serialize($busqueda, 'json', ['groups' => 'media']));
        }
    }

    public function busqueda_genero(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id_g = $request->query->get('genero');
            
            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBusquedaGenero($id_g);
            
            return new Response($serializer->serialize($busqueda, 'json', ['groups' => 'media']));
        }
    }

    public function busqueda_year(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $year = $request->query->get('year');
            
            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBusquedaYear($year);
            
            return new Response($serializer->serialize($busqueda, 'json', ['groups' => 'media']));
        }
    }

    public function busqueda_genero_year(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $year = $request->query->get('year');
            $id_g = $request->query->get('genero');

            
            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBusquedaYearGenero($year, $id_g);
            
            return new Response($serializer->serialize($busqueda, 'json', ['groups' => 'media']));
        }
    }
    

}

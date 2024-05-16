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


            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBy(['tipo' => $tipo_peli, 'tipo' => $tipo_serie]);

            return new Response($serializer->serialize($busqueda, 'json'));
        }
    }

    public function busqueda_genero(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id_g = $_GET['genero'];
            
            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBusquedaGenero($id_g);
            
            return new Response($serializer->serialize($busqueda, 'json'));
        }
    }

    public function busqueda_year(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $year = $_GET['year'];
            
            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBusquedaYear($year);
            
            return new Response($serializer->serialize($busqueda, 'json'));
        }
    }

    public function busqueda_genero_year(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $year = $_GET['year'];
            $id_g = $_GET['genero'];
            
            $busqueda = $this->getDoctrine()->getRepository(Media::class)
                ->findBusquedaYearGenero($year, $id_g);
            
            return new Response($serializer->serialize($busqueda, 'json'));
        }
    }
    

}

<?php

namespace App\Controller;

use App\Entity\Libreria;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class UsuarioController extends AbstractController
{
    public function log(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $bodydata = $request->getContent();
                $usuario_new = $serializer->deserialize(
                    $bodydata, 
                    Usuario::class, 
                    'json');
            
            if ($usuario_new != null){
                $usuario = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['usuarios' => $usuario_new->getUsuarios(), 'password' => $usuario_new->getPassword()]);
                if ($usuario != null) {
                    // quiero mostrar solo el id del usuario en el json
                    $id = $usuario->getId();
                    return new Response(json_encode(['id' => $id]));
                }
                } else {
                    return new Response('{"error":', Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json']);
                }
            } else {
                return new Response('{"error":', Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json']);
            }   
        }   

    


    public function new_user(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $bodydata = $request->getContent();
            $usuario_new = $serializer->deserialize(
                $bodydata, 
                Usuario::class, 
                'json');

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario_new);

            

            
            $libreria = new Libreria();
            $libreria->setIdUsuario($usuario_new);
            $libreria->setTitulo('ver mas tarde');
            $libreria->setImagen('https://cdn.pixabay.com/photo/2019/07/03/09/43/clock-4314041_960_720.jpg');

            $entityManager->persist($libreria);

            $libreria2 = new Libreria();
            $libreria2->setIdUsuario($usuario_new);
            $libreria2->setTitulo('Favoritos');
            $libreria2->setImagen('https://t3.ftcdn.net/jpg/01/21/64/88/360_F_121648819_ZQ0tZ6tjLzxim1SG7CQ86raBw4sglCzB.jpg');

            $entityManager->persist($libreria2);
            $entityManager->flush();

            return new Response($serializer->serialize($usuario_new, 'json', ['groups' => 'usuario']));

        }
    }

    public function user_id(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('GET')) 
        {
            $id = $request->query->get('id');
            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id]);
            
            return new Response($serializer->serialize($usuario, 'json', ['groups' => 'usuario']));
        }

        if ($request->isMethod('DELETE')) {
           
            $id = $request->query->get('id');
            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id]);
            
            $usuario_delete = clone $usuario;
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($usuario);
            $entityManager->flush();

            return new Response($serializer->serialize($usuario_delete, 'json', ['groups' => 'usuario']));
        }

    }

    public function user_config(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) 
        {
            $bodydata = $request->getContent();
            $usuario_new = $serializer->deserialize(
                $bodydata, 
                Usuario::class, 
                'json');

            $id = $request->get('id_usuario');
            $usuario = $this->getDoctrine()
                ->getRepository(Usuario::class)
                ->findOneBy(['id' => $id]);

            $usuario->setUsuarios($usuario_new->getUsuarios());
            $usuario->setEmail($usuario_new->getEmail());
            $usuario->setPais($usuario_new->getPais());
            $usuario->setGenero($usuario_new->getGenero());
            $usuario->setPassword($usuario_new->getPassword());
            $usuario->setImagen($usuario_new->getImagen());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuario);
            $entityManager->flush();

            return new Response($serializer->serialize($usuario, 'json', ['groups' => 'usuario']));
        }
    }



}

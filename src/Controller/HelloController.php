<?php

namespace App\Controller;


use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends Controller
{
    /**
     * @return Response
     * @Route("hello_world")
     */
    public function world()
    {
        return new Response(
            "<html><body><h1>Hello World Controller!</h1></body></html>"
        );
    }

    /**
     * @return Response
     * @Route("mostrar-mensagem")
     */
    public function mensagem()
    {
        return $this->render("hello/mensagem.html.twig", [
            'mensagem' => 'Olá School of net!'
        ]);
    }

    /**
     * @return Response
     *
     * @Route("cadastrar-produto")
     */
    public function produto()
    {
        $em = $this->getDoctrine()->getManager();

        $produto = new Produto();
        $produto->setNome('Teclado')
            ->setPreco(50.00);


        $em->persist($produto);
        $em->flush();

        return new Response("O Produto ". $produto->getId(). " foi criado!");
    }
}
<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProdutoController extends Controller
{
    /**
     * @Route("/produto", name="listar_produto")
     * @Template("produto/index.html.twig")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $produtos = $em->getRepository(Produto::class)->findAll();

        return [
            'produtos' => $produtos
        ];
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @Route("/produto/cadastrar", name="cadastrar_produto")
     * @Template("produto/create.html.twig")
    */
    public function create(Request $request)
    {
        $produto = new Produto();

        $form = $this->createForm(ProdutoType::class, $produto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($produto);
            $em->flush();

            $this->addFlash('success', 'Produto foi salvo com sucesso');
            return $this->redirectToRoute('listar_produto');

        }

        return [
            'form' => $form->createView()
        ];

    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("produto/editar/{id}", name="editar_produto")
     * @Template("produto/update.html.twig")
     */
    public function update(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $produto = $em->getRepository(Produto::class)->find($id);

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($produto);
            $em->flush();

            $this->addFlash('success', 'O Produto '. $produto->getNome(). ' foi alterado com sucesso!');

            return $this->redirectToRoute('listar_produto');
        }

        return [
            'produto' => $produto,
            'form' => $form->createView()
        ];

    }

    /**
     * @param Request $request
     * @param $id
     * @Route("produto/visualizar/{id}", name="visualizar_produto")
     * @Template("produto/view.html.twig")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function view(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $produto = $em->getRepository(Produto::class)->find($id);

        return [
            'produto' => $produto
        ];
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("produto/apagar/{id}", name="apagar_produto")
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $produto = $em->getRepository(Produto::class)->find($id);

        if( !$produto ) {
            $mensagem = "Produto não foi encontrado!";
            $tipo = "warning";
        }

        if( $produto ) {

            $mensagem = "Produto ".$produto->getNome() . " foi excluído com sucesso!";
            $tipo = "success";

            $em->remove($produto);
            $em->flush();
        }

        $this->addFlash($tipo, $mensagem);

        return $this->redirectToRoute('listar_produto');
    }
}

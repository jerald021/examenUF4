<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Articulo;
use Symfony\Component\HttpFoundation\Request;


class ArticuloController extends Controller
{
    /**
     * @Route ("/articulo", name="articulo")
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:Articulo');

        $articulos = $repository->findAll();

        return $this->render('Articulo/index.html.twig', ['articulos' => $articulos]);
    }

    /**
     * @Route ("/articulos", name="articulos")
     */
    public function  articulosAction()
    {
        $m = $this->getDoctrine()->getManager();
        $articuloRepo = $m->getRepository('AppBundle:Articulo');
        $clienteRepo = $m->getRepository('AppBundle:Cliente');
        $pedidoRepo = $m->getRepository('AppBundle:Pedido');

        $articulo = $articuloRepo->totalArticulosById(1);
        return $this->render('Articulo/querys.html.twig', ['articulos' => $articulo]);

    }
}

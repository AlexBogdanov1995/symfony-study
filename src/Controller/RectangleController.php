<?php

namespace App\Controller;

use App\Entity\Rectangle;
use App\Form\RectangleType;
use App\Repository\RectangleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rectangle")
 */
class RectangleController extends Controller
{
    /**
     * @Route("/", name="rectangle_index", methods="GET")
     */
    public function index(RectangleRepository $rectangleRepository): Response
    {
        return $this->render('rectangle/index.html.twig', ['rectangles' => $rectangleRepository->findAll()]);
    }

    /**
     * @Route("/new", name="rectangle_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $rectangle = new Rectangle();
        $form = $this->createForm(RectangleType::class, $rectangle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rectangle);
            $em->flush();

            return $this->redirectToRoute('rectangle_index');
        }

        return $this->render('rectangle/new.html.twig', [
            'rectangle' => $rectangle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rectangle_show", methods="GET")
     */
    public function show(Rectangle $rectangle): Response
    {
        return $this->render('rectangle/show.html.twig', ['rectangle' => $rectangle]);
    }

    /**
     * @Route("/{id}/edit", name="rectangle_edit", methods="GET|POST")
     */
    public function edit(Request $request, Rectangle $rectangle): Response
    {
        $form = $this->createForm(RectangleType::class, $rectangle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rectangle_edit', ['id' => $rectangle->getId()]);
        }

        return $this->render('rectangle/edit.html.twig', [
            'rectangle' => $rectangle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rectangle_delete", methods="DELETE")
     */
    public function delete(Request $request, Rectangle $rectangle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rectangle->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rectangle);
            $em->flush();
        }

        return $this->redirectToRoute('rectangle_index');
    }
}

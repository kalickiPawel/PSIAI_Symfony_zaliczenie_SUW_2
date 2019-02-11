<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use AppBundle\Entity\Lecture;
use AppBundle\Entity\User;
use AppBundle\Form\LectureType;


/**
 * Lecture controller.
 *
 */
class LectureController extends Controller
{
    /**
     * Lists all lecture entities.
     *
     */
    public function indexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $lectures = $em->getRepository('AppBundle:Lecture')->findAll();

        return $this->render('lecture/index.html.twig', array(
            'lectures' => $lectures,
            'profile' => $user,
        ));
    }

    /**
     * Creates a new lecture entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $lecture = new Lecture();
        #$form = $this->createForm('AppBundle\Form\LectureType', $lecture);
        $form = $this->createForm(LectureType::class, $lecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lecture);
            $em->flush();

            return $this->redirectToRoute('lecture_show', array('id' => $lecture->getId()));
        }

        return $this->render('lecture/new.html.twig', array(
            'profile' => $user,
            'lecture' => $lecture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lecture entity.
     *
     */
    public function showAction(Lecture $lecture)
    {
        $deleteForm = $this->createDeleteForm($lecture);

        return $this->render('lecture/show.html.twig', array(
            'lecture' => $lecture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lecture entity.
     *
     */
    public function editAction(Request $request, Lecture $lecture)
    {
        $deleteForm = $this->createDeleteForm($lecture);
        $editForm = $this->createForm('AppBundle\Form\LectureType', $lecture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lecture_edit', array('id' => $lecture->getId()));
        }

        return $this->render('lecture/edit.html.twig', array(
            'lecture' => $lecture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lecture entity.
     *
     */
    public function deleteAction(Request $request, Lecture $lecture)
    {
        $form = $this->createDeleteForm($lecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lecture);
            $em->flush();
        }

        return $this->redirectToRoute('lecture_index');
    }

    /**
     * Creates a form to delete a lecture entity.
     *
     * @param Lecture $lecture The lecture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lecture $lecture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lecture_delete', array('id' => $lecture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

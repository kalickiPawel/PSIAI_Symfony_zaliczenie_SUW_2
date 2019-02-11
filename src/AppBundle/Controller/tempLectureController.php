<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Lecture;
use AppBundle\Form\LectureType;
use Symfony\Component\HttpFoundation\File\File;

class LectureController extends Controller
{
    public function newAction(Request $request)
    {
        $lecture = new Lecture();
        $form = $this->createForm(LectureType::class, $lecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $lecture->getLectureFile();

            $fileName = $this->get('app.lecture_uploader')->upload($file);

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $lecture->setLectureFile($fileName);

            // ... persist the $product variable or any other work

            #return $this->redirect($this->generateUrl('app_lecture_list'));
            return $this->redirect($this->generateUrl('app_lecture_new'));
        }

        return $this->render('lecture/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
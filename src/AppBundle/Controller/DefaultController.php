<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $downloads = array(
            "years" => $this->getDoctrine()->getRepository('AppBundle:Stats')->countYearDownloads(),
            "months" => $this->getDoctrine()->getRepository('AppBundle:Stats')->countMonthDownloads(),
            "days" => $this->getDoctrine()->getRepository('AppBundle:Stats')->countDayDownloads(),
        );
        return $this->render('default/index.html.twig', array(
            'downloads' => $downloads,
        ));
    }
}

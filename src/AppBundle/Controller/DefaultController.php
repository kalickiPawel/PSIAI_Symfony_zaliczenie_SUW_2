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
            "years" => 0,
            "months" => 0,
            "days" => 0,
        );
        return $this->render('default/index.html.twig', array(
            'downloads' => $downloads,
        ));
    }
}

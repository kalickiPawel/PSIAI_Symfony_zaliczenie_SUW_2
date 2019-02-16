<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\Stats;


class StatsController extends Controller
{
    public function indexAction(Request $request)
    {
        $profile = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $logs = $em->getRepository('AppBundle:Stats')->findAll();
        
        return $this->render('stats/index.html.twig', array(
            'logs' => $logs,
            'profile' => $profile
        ));
    }
}

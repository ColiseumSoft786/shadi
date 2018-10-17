<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Ocupation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class OcupationController extends Controller
{
    /**
     * @Route("/Ocupation", name="admin_ocupations")
     */
    public function OcupationsAction()
    {
        $ocu = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
        return $this->render('AdminBundle:Admin/Ocupation:ocupation.html.twig', array(
            'Ocupation' => $ocu
        ));
    }

    /**
     * @Route("/Ocupation/Insert", name="admin_ocupation_insert")
     */
    public function AddOcupationAction(Request $request)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $country = new Ocupation();
            $country->setName($request->get('name'));
            $em->persist($country);
            $em->flush();
            return $this->redirectToRoute('admin_ocupations');
        }
        return $this->render('AdminBundle:Admin/Ocupation:addocupation.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/Ocupation/Update/{id}", name="admin_ocupation_update")
     */
    public function UpdateOcupationAction(Request $request, $id)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $ocu = $em->getRepository(Ocupation::class)->find($id);
            $ocu->setName($request->get('name'));
            $em->flush();
            return $this->redirectToRoute('admin_ocupations');
        }
        $ocup = $this->getDoctrine()->getRepository(Ocupation::class)->find($id);
        return $this->render('AdminBundle:Admin/Ocupation:updateocupation.html.twig', array(
            'Ocupation' => $ocup
        ));
    }

}

<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Caste;
use App\HomeBundle\Entity\Religion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CasteController extends Controller
{
    /**
     * @Route("/Caste/{id}", name="admin_castes")
     */
    public function CastesAction($id)
    {
        $caste = $this->getDoctrine()->getRepository(Caste::class)->findBy(
            array(
                'religion' => $id
            ));
        return $this->render('AdminBundle:Admin/Caste:packages.html.twig', array(
            'Caste' => $caste
        ));
    }

    /**
     * @Route("/Caste/Insert/New", name="admin_caste_insert")
     */
    public function AddCasteAction(Request $request)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $caste = new Caste();
            $caste->setName($request->get('name'));
            $relId = $this->getDoctrine()->getRepository(Religion::class)->find($request->get('religion'));
            $caste->setReligion($relId);
            $em->persist($caste);
            $em->flush();
            return $this->redirectToRoute('admin_castes',
                array(
                    'id' => $caste->getReligion()->getId()
                ));
        }
        $religion = $this->getDoctrine()->getRepository(Religion::class)->findAll();
        return $this->render('AdminBundle:Admin/Caste:addpackages.html.twig', array(
            'Religion' => $religion
        ));
    }

    /**
     * @Route("/Caste/Update/{id}", name="admin_caste_update")
     */
    public function UpdateCasteAction(Request $request, $id)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $caste = $em->getRepository(Caste::class)->find($id);
            $caste->setName($request->get('name'));
            $relId = $this->getDoctrine()->getRepository(Religion::class)->find($request->get('religion'));
            $caste->setReligion($relId);
            $em->flush();
            return $this->redirectToRoute('admin_castes',
                array(
                    'id' => $caste->getReligion()->getId()
                ));
        }
        $religion = $this->getDoctrine()->getRepository(Religion::class)->findAll();
        $caste1 = $this->getDoctrine()->getRepository(Caste::class)->find($id);
        return $this->render('AdminBundle:Admin/Caste:updatepackages.html.twig', array(
            'Caste' => $caste1,
            'Religion' => $religion
        ));
    }


}

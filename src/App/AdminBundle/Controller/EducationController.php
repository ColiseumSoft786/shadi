<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Education;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class EducationController extends Controller
{
//    /**
//     * @Route("/Education", name="admin_education")
//     */
//    public function EducationsAction()
//    {
//        return $this->render('AdminBundle:Admin/Education:education.html.twig', array(
//            // ...
//        ));
//    }

    /**
     * @Route("/Education", name="admin_education")
     */
    public function EducationsAction()
    {
        $edu = $this->getDoctrine()->getRepository(Education::class)->findAll();
        return $this->render('AdminBundle:Admin/Education:education.html.twig', array(
            'Education' => $edu
        ));
    }

    /**
     * @Route("/Education/Insert", name="admin_education_insert")
     */
    public function AddEducationAction(Request $request)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $edu = new Education();
            $edu->setName($request->get('name'));
            $em->persist($edu);
            $em->flush();
            return $this->redirectToRoute('admin_education');
        }
        return $this->render('AdminBundle:Admin/Education:addeducation.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/Education/Update/{id}", name="admin_education_update")
     */
    public function UpdateEducationAction(Request $request, $id)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $edu = $em->getRepository(Education::class)->find($id);
            $edu->setName($request->get('name'));
            $em->flush();
            return $this->redirectToRoute('admin_education');
        }
        $education = $this->getDoctrine()->getRepository(Education::class)->find($id);
        return $this->render('AdminBundle:Admin/Education:updateeducation.html.twig', array(
            'Education' => $education
        ));
    }


}

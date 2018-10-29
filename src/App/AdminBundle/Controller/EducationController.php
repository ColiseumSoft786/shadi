<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Education;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class EducationController extends Controller
{



    public $adminloggedin = false;
    public $admin = null;

    public function __construct()
    {
        if (isset($_SESSION['admin'])){
            $this->admin = $_SESSION['admin'];
            $this->adminloggedin = true;
        }
    }

    /**
     * @Route("/Education", name="admin_education")
     */
    public function EducationsAction()
    {
        if ($this->adminloggedin == true){
            $edu = $this->getDoctrine()->getRepository(Education::class)->findAll();
            return $this->render('AdminBundle:Admin/Education:education.html.twig', array(
                'Education' => $edu
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Education/Insert", name="admin_education_insert")
     */
    public function AddEducationAction(Request $request)
    {
        if ($this->adminloggedin == true){
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
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Education/Update/{id}", name="admin_education_update")
     */
    public function UpdateEducationAction(Request $request, $id)
    {
        if ($this->adminloggedin == true){
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
        return $this->redirectToRoute('workplace_login');
    }


}

<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Religion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ReligionController extends Controller
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
     * @Route("/Religion", name="admin_religions")
     */
    public function ReligionAction()
    {
        if ($this->adminloggedin == true){
            $religion = $this->getDoctrine()->getRepository(Religion::class)->findAll();
            return $this->render('AdminBundle:Admin/Religion:religion.html.twig', array(
                'Religion' => $religion
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }


    /**
     * @Route("/Religion/Insert", name="admin_religion_insert")
     */
    public function AddReligionAction(Request $request)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $country = new Religion();
                $country->setName($request->get('name'));
                $em->persist($country);
                $em->flush();
                return $this->redirectToRoute('admin_religions');
            }
            return $this->render('AdminBundle:Admin/Religion:addreligion.html.twig', array(
                // ...
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Religion/Update/{id}", name="admin_religion_update")
     */
    public function UpdateReligionAction(Request $request, $id)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $rel = $em->getRepository(Religion::class)->find($id);
                $rel->setName($request->get('name'));
                $em->flush();
                return $this->redirectToRoute('admin_religions');
            }
            $religion = $this->getDoctrine()->getRepository(Religion::class)->find($id);
            return $this->render('AdminBundle:Admin/Religion:updatereligion.html.twig', array(
                'Religion' => $religion
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

}

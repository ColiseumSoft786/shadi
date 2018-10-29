<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Subadmin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SubadminController extends Controller
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
     * @Route("/SubAdmins", name="admin_subadmins")
     */
    public function SubAdminAction()
    {
        if ($this->adminloggedin == true){
//            echo $_SESSION['subadmin'];
            $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findAll();
            return $this->render('AdminBundle:Admin/Subadmin:subadmin.html.twig', array(
                'SubAdmin' => $sadmin
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/SubAdmin/Insert", name="admin_subadmin_insert")
     */
    public function AddSubAdminAction(Request $request)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $sadmin = new Subadmin();
                $sadmin->setName($request->get('name'));
                $sadmin->setPhone($request->get('phone'));
                $sadmin->setPassword($request->get('password'));
                $sadmin->setBlock(0);
                $em->persist($sadmin);
                $em->flush();
                return $this->redirectToRoute('admin_subadmins');
            }
            return $this->render('AdminBundle:Admin/Subadmin:addsubadmin.html.twig', array(
                // ...
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/SubAdmin/Update/{id}", name="admin_subadmin_update")
     */
    public function UpdateSubAdminAction(Request $request, $id)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $sadmin = $em->getRepository(Subadmin::class)->find($id);
                $sadmin->setName($request->get('name'));
                $sadmin->setPhone($request->get('phone'));
                $sadmin->setPassword($request->get('password'));
                $sadmin->setBlock(0);
                $em->flush();
                return $this->redirectToRoute('admin_subadmins');
            }
            $subadmin = $this->getDoctrine()->getRepository(Subadmin::class)->find($id);
            return $this->render('AdminBundle:Admin/Subadmin:updatesubadmin.html.twig', array(
                'SubAdmin' => $subadmin
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/SubAdmin/Delete/{id}", name="admin_subadmin_delete")
     */
    public function DeleteSubAdminAction($id)
    {
        if ($this->adminloggedin == true){
            $em = $this->getDoctrine()->getManager();
            $sadmin = $em->getRepository(Subadmin::class)->find($id);
            $em->remove($sadmin);
            $em->flush();
            return $this->redirectToRoute('admin_subadmins');
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/SubAdmin/Block/{id}", name="admin_subadmin_block")
     */
    public function BlockSubAdminAction(Request $request,$id)
    {
        if ($this->adminloggedin == true){
            $em = $this->getDoctrine()->getManager();
            $sadmin = $em->getRepository(Subadmin::class)->find($id);
            if ($sadmin->getBlock() == 1){
            $sadmin->setBlock(0);
            }else{
                $sadmin->setBlock(1);
            }
            $em->flush();
        return $this->redirectToRoute('admin_subadmins');
        }
        return $this->redirectToRoute('workplace_login');
    }



}

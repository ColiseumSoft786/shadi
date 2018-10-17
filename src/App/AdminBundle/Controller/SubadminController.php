<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Subadmin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SubadminController extends Controller
{

    public $loggedin = false;
    public $subadmin = null;

    public function __construct()
    {
        if (isset($_SESSION['subadmin'])){
            $this->subadmin = $_SESSION['subadmin'];
            $this->loggedin = true;
        }
    }



//    /**
//     * @Route("/Subadmin/login", name="subadmins_login_rout")
//     */
//    public function loginAction(Request $request){
//        if ($request->getMethod() == "POST"){
//            $phone = $request->get('phone');
//            $password = $request->get('password');
//            $user = $this->getDoctrine()->getRepository(Subadmin::class)->findOneBy(
//                array(
//                    'phone' => $phone,
//                    'password' => $password
//                ));
//            if ($user != null){
//                if ($user->getBlock() == 0){
//                    if (session_status() == PHP_SESSION_NONE){
//                        session_start();
//                    }
//                }else{
//                    return $this->redirect($this->generateUrl('subadmins_login_rout'));
//                }
//                $_SESSION['subadmin'] = $phone;
//                return $this->redirect($this->generateUrl('admin_subadmin_insert'));
//            }else{
//                return $this->redirect($this->generateUrl('subadmins_login_rout'));
//            }
//        }
//        return $this->render('AdminBundle:Admin/Subadmin:login.html.twig');
//    }

    /**
     * @Route("/SubAdmins", name="admin_subadmins")
     */
    public function SubAdminAction()
    {
        if ($this->loggedin == true){
            $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findAll();
            return $this->render('AdminBundle:Admin/Subadmin:subadmin.html.twig', array(
                'SubAdmin' => $sadmin
            ));
        }
        $error = '<script>alert("You Are Blocked Temporary!")</script>';
        echo $error;
        return $this->redirectToRoute('subadmins_login');
    }

    /**
     * @Route("/SubAdmin/Insert", name="admin_subadmin_insert")
     */
    public function AddSubAdminAction(Request $request)
    {
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

    /**
     * @Route("/SubAdmin/Update/{id}", name="admin_subadmin_update")
     */
    public function UpdateSubAdminAction(Request $request, $id)
    {
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

    /**
     * @Route("/SubAdmin/Delete/{id}", name="admin_subadmin_delete")
     */
    public function DeleteSubAdminAction($id)
    {
            $em = $this->getDoctrine()->getManager();
            $sadmin = $em->getRepository(Subadmin::class)->find($id);
            $em->remove($sadmin);
            $em->flush();
            return $this->redirectToRoute('admin_subadmins');
    }

    /**
     * @Route("/SubAdmin/Block/{id}", name="admin_subadmin_block")
     */
    public function BlockSubAdminAction(Request $request,$id)
    {
        if ($request->getMethod() == "GET"){
            $em = $this->getDoctrine()->getManager();
            $sadmin = $em->getRepository(Subadmin::class)->find($id);
            if ($sadmin->getBlock() == 1){
            $sadmin->setBlock(0);
            }else{
                $sadmin->setBlock(1);
            }
            $em->flush();
        }
        return $this->redirectToRoute('admin_subadmins');
    }



}

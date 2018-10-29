<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
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
     * @Route("/", name="admin_index")
     */
    public function indexAction()
    {
        if ($this->adminloggedin == True){
            return $this->render('AdminBundle:Default:index.html.twig', array(
                // ...
            ));
        }
        return $this->redirect($this->generateUrl('workplace_login'));
    }


    /**
     * @Route("/WorkPlace/Login", name="workplace_login")
     */
    public function loginAction(Request $request){
        $notmatch = '';
        if ($request->getMethod() == "POST"){
            $username = $request->get('username');
            $password = $request->get('password');
            $user = $this->getDoctrine()->getRepository(Admin::class)->findOneBy(
                array(
                    'username' => $username,
                    'password' => $password
                ));
            if ($user != null){

                if ($user->getUsername() == 'admin'){
                    if (session_status() == PHP_SESSION_NONE){
                        session_start();
                    }
                }else{
                    return $this->render('AdminBundle:Default:SAdminLogin.html.twig',
                        array(
                            'NotMatch' => $notmatch
                        ));
                }
                $_SESSION['admin'] = $username;
                return $this->redirect($this->generateUrl('admin_index'));
            }else{
                $notmatch = "Username Or Password Is Incorrect!";
                return $this->render('AdminBundle:Default:SAdminLogin.html.twig',
                    array(
                        'NotMatch' => $notmatch
                    ));
            }
        }

        return $this->render('AdminBundle:Default:SAdminLogin.html.twig',
            array(
                'NotMatch' => $notmatch
            ));
    }


    /**
     * @Route("/admin/logout", name="admins_logout")
     */
    public function AdminLogOutAction(){
        session_destroy();
        return $this->redirectToRoute('workplace_login');
    }

}

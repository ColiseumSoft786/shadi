<?php

namespace App\SubadminBundle\Controller;

use App\HomeBundle\Entity\Subadmin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
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



    /**
     * @Route("/Subadmin/login", name="sub_admins_login")
     */
    public function loginAction(Request $request){
        $error = '';
        $notmatch = '';
        if ($request->getMethod() == "POST"){
            $phone = $request->get('phone');
            $password = $request->get('password');
            $user = $this->getDoctrine()->getRepository(Subadmin::class)->findOneBy(
                array(
                    'phone' => $phone,
                    'password' => $password
                ));
            if ($user != null){

                if ($user->getBlock() == 0){
                    if (session_status() == PHP_SESSION_NONE){
                        session_start();
                    }
                }else{
                    $error = "You Are Temporary Blocked!";
                    return $this->render('SubAdminBundle:Default:index.html.twig',
                        array(
                            'Block' => $error,
                            'NotMatch' => $notmatch
                        ));
                }
                $_SESSION['subadmin'] = $user;
                return $this->redirect($this->generateUrl('sub_admins_users'));
            }else{
                $notmatch = "Phone Or Password Is Incorrect!";
                return $this->render('SubAdminBundle:Default:index.html.twig',
                    array(
                        'NotMatch' => $notmatch,
                        'Block' => $error
                    ));
            }
        }

        return $this->render('SubAdminBundle:Default:index.html.twig',
            array(
                'Block' => $error,
                'NotMatch' => $notmatch
            ));
    }


    /**
     * @Route("/Subadmin/logout", name="sub_admins_logout")
     */
    public function SubAdminLogOutAction(){
        session_destroy();
        return $this->redirectToRoute('sub_admins_login');
    }



}

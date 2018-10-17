<?php

namespace App\SubadminBundle\Controller;

use App\HomeBundle\Entity\Subadmin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
//    /**
//     * @Route("/login")
//     */
//    public function indexAction()
//    {
//        return $this->render('SubAdminBundle:Default:index.html.twig');
//    }


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
     * @Route("/Subadmin/login", name="subadmins_login")
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
                    $error = "You Are Blocked Temporary!";
                    return $this->render('SubAdminBundle:Default:index.html.twig',
                        array(
                            'Block' => $error
                        ));
                }
                $_SESSION['subadmin'] = $phone;
                return $this->redirect($this->generateUrl('admin_subadmins'));
            }else{
                $notmatch = "Phone Or Password Is Incorrect!";
                return $this->render('SubAdminBundle:Default:index.html.twig',
                    array(
                        'NotMatch' => $notmatch
                    ));
            }
        }

        return $this->render('SubAdminBundle:Default:index.html.twig',
            array(
                'Block' => $error,
                'NotMatch' => $notmatch
            ));
    }


}

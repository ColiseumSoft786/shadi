<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Expire;
use App\HomeBundle\Entity\Package;
use App\HomeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MembershipController extends Controller
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
     * @Route("/User/Membership/{id}", name="admin_user_membership")
     */
    public function MembershipAction(Request $request,$id)
    {
        if ($this->adminloggedin == true){
            $date = date("m/d/Y");
            $user = $this->getDoctrine()->getRepository(User::class)->find($id);
            $pkg = $this->getDoctrine()->getRepository(Package::class)->findAll();
            return $this->render('AdminBundle:Admin/Membership:Membership.html.twig',[
                'Packages' => $pkg,
                'userid' => $user->getId()
            ]);

//            $expire = $this->getDoctrine()->getRepository(Expire::class)->findOneBy([
//                'user' => $user->getId(),
//                'status' => 0
//            ]);
//            if(empty($expire)){
//                $pkg = $this->getDoctrine()->getRepository(Package::class)->findAll();
//                return $this->render('AdminBundle:Admin/Membership:Membership.html.twig',[
//                    'Packages' => $pkg,
//                    'userid' => $user->getId()
//                ]);
//            }
//            else{
//                $error = 'Already have Package!';
//                if($date <= $expire->getExpiredate()){
//                    $error = 'Already one package active';
//                }
//                else{
//                    $error = 'Already have Package!';
//                    $em = $this->getDoctrine()->getManager();
//                    $expire->setStatus(1);
//                    $em->flush();
//                }
//                /*echo '<script>alert("'. $error .'")</script>';
//                return $this->redirectToRoute('all_members');*/
//            }
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Subscribe/Membership/{userid}/{pkgid}", name="admin_subscribe_membership")
     */
    public function SubscribeAction(Request $request,$userid,$pkgid)
    {
        if ($this->adminloggedin == true){
            $expire = $this->getDoctrine()->getRepository(Expire::class)->findOneBy([
                'user' => $userid,
                'status' => 0
            ]);
            if(empty($expire)){
            }
            else{
                    $em = $this->getDoctrine()->getManager();
                    $expire->setStatus(1);
                    $em->flush();

                /*echo '<script>alert("'. $error .'")</script>';
                return $this->redirectToRoute('all_members');*/
            }
            $em = $this->getDoctrine()->getManager();
            $date = date("m/d/Y");
            $expire = New Expire();
            $expire->setExpiredate($date);
            $user = $this->getDoctrine()->getRepository(User::class)->find($userid);
            $expire->setUser($user);
            $package = $this->getDoctrine()->getRepository(Package::class)->find($pkgid);
            $expire->setPackage($package);
            $expire->setStatus(0);
            $expire->setInterest($package->getInterest());
            $em->persist($expire);
            $em->flush();
            return $this->redirectToRoute('all_members');
        }
        return $this->redirectToRoute('workplace_login');
    }




}

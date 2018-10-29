<?php

namespace App\SubadminBundle\Controller;

use App\HomeBundle\Entity\Caste;
use App\HomeBundle\Entity\City;
use App\HomeBundle\Entity\Country;
use App\HomeBundle\Entity\Education;
use App\HomeBundle\Entity\Interest;
use App\HomeBundle\Entity\Ocupation;
use App\HomeBundle\Entity\Religion;
use App\HomeBundle\Entity\State;
use App\HomeBundle\Entity\Subadmin;
use App\HomeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Count;

class InterestController extends Controller
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
     * @Route("/User/Interest/{id}", name="sub_admins_users_interest")
     */
    public function InterestAction(Request $request, $id){
        if ($this->loggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $interest = new Interest();

                $sender = $this->getDoctrine()->getRepository(User::class)->find($id);
                $interest->setSendby($sender);
                $receiver = $this->getDoctrine()->getRepository(User::class)->find($request->get('receiver'));
                $interest->setSendto($receiver);

                $interest->setDate($date = date("m/d/Y"));
                $interest->setAccept(0);
                $em->persist($interest);
                $em->flush();
                return $this->redirectToRoute('sub_admins_my_members');
            }
            $sadminid = $_SESSION['subadmin'];
            $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findBy(
                ['phone' => $sadminid]
            );
            $users = $this->getDoctrine()->getRepository(User::class)->findBy(
                ['subadmin' => $sadmin]
            );

            return $this->render('SubAdminBundle:Interest:Interest.html.twig',
                ['Users' => array_reverse($users)]
                );
        }
        return $this->redirectToRoute('sub_admins_login');
    }

    /**
     * @Route("/User/Notification/{id}", name="users_notification")
     */
    public function NotificationAction($id){
        if ($this->loggedin == true){
            $sendto = $this->getDoctrine()->getRepository(Interest::class)->findBy(
                ['sendto' => $id]
            );
            $sendby = $this->getDoctrine()->getRepository(Interest::class)->findBy(
                ['sendby' => $id]
            );

            return $this->render('SubAdminBundle:Interest:Notification.html.twig',
                ['Sendto' => $sendto, 'Sendby' => $sendby]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }



    /**
     * @Route("/User/Interest/Accept/{id}/{action}", name="users_interest_accept")
     */
    public function AcceptRejectInterestAction($id,$action){

                $em = $this->getDoctrine()->getManager();
                $status = $em->getRepository(Interest::class)->find($id);
                if ($action == 'accept'){
                    $status->setAccept(1);
                }elseif($action == 'reject'){
                    $status->setAccept(2);
                }
                $em->flush();
                return $this->redirectToRoute('users_notification',
                    ['id' => $status->getSendby()->getId()]
                );
    }



    /**
     * @Route("/User/Interest/Profile/{id}", name="single_users_interest_profile")
     */
    public function SingleUserProfileInterestAction($id){
                $em = $this->getDoctrine()->getManager();
//                $interestUserProfile = $em->getRepository(User::class)->find($id);
                $interestid = $this->getDoctrine()->getRepository(Interest::class)->find($id);
                return $this->render('SubAdminBundle:Interest:ProfileInterest.html.twig',
                    ['Interest' => $interestid]
                );
    }





}

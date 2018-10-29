<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Caste;
use App\HomeBundle\Entity\City;
use App\HomeBundle\Entity\Country;
use App\HomeBundle\Entity\Education;
use App\HomeBundle\Entity\Ocupation;
use App\HomeBundle\Entity\Religion;
use App\HomeBundle\Entity\State;
use App\HomeBundle\Entity\Expire;
use App\HomeBundle\Entity\Package;
use App\HomeBundle\Entity\Subadmin;
use App\HomeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class SidebarController extends Controller
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
     * @Route("/Admin/User/Update/{id}", name="Admin_sub_admins_users_update")
     */
    public function AdminUserUpdateAction(Request $request,$id){
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository(User::class)->find($id);

                $subadminid = $_SESSION['subadmin'];
                $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findOneBy(
                    ['phone' => $subadminid]
                );
                $user->setSubadmin($sadmin);
                if ($_FILES['img']['name'] != null){
                    $info = pathinfo($_FILES['img']['name']);
                    $ext = $info['extension'];
                    $date = date('mdYhisms', time());
                    $newname = $date . '.' . $ext;
                    $target = 'bundles/assets/profiles/'.$newname;
                    unlink("./". $user->getUpic());
                    move_uploaded_file( $_FILES['img']['tmp_name'], "./".$target);
                    $user->setUpic($target);
                }

                $user->setApprove(1);
                $user->setUname($request->get('name'));
                $user->setUphone($request->get('phone'));
                $user->setPassword($request->get('password'));
                $user->setUgender($request->get('gender'));
                $user->setUmartialstatus($request->get('mstatus'));
                $user->setColor($request->get('color'));
                $user->setUage($request->get('age'));
                $user->setUheight($request->get('height'));
                $ocupation = $this->getDoctrine()->getRepository(Ocupation::class)->find($request->get('ocupation'));
                $user->setOcupation($ocupation);
                $education = $this->getDoctrine()->getRepository(Education::class)->find($request->get('education'));
                $user->setEducation($education);
                $user->setUjobbusinesstitle($request->get('jobtitle'));
                $user->setUjobbusiness($request->get('job'));
                $user->setUincome($request->get('income'));

                $religion = $this->getDoctrine()->getRepository(Religion::class)->find($request->get('religion'));
                $user->setReligion($religion);
                $caste = $this->getDoctrine()->getRepository(Caste::class)->find($request->get('caste'));
                $user->setCaste($caste);
                $user->setUbodytype($request->get('body'));
                $user->setUride($request->get('ride'));
                $user->setBearhijab($request->get('hijab'));

//              Family Detail
                $focupation = $this->getDoctrine()->getRepository(Ocupation::class)->find($request->get('focupation'));
                $user->setUfatherocupation($focupation);
                $mocupation = $this->getDoctrine()->getRepository(Ocupation::class)->find($request->get('mocupation'));
                $user->setUmotherocupation($mocupation);
                $user->setUmothertongue($request->get('mtongue'));
                $user->setUbrothers($request->get('brothers'));
                $user->setUsisters($request->get('sisters'));
                $user->setUmarriedbrothers($request->get('mbrothers'));
                $user->setUmarriedsisters($request->get('msisters'));

//              Residance start
                $user->setUaccommodation($request->get('raccomodation'));
                $user->setUaccommodationstatus($request->get('raccomodationstatus'));
                $user->setUhousesize($request->get('rhousesize'));
                $rcountry = $this->getDoctrine()->getRepository(Country::class)->find($request->get('rcountry'));
                $user->setCountry($rcountry);
                $rstate = $this->getDoctrine()->getRepository(State::class)->find($request->get('rstate'));
                $user->setState($rstate);
                $rcity = $this->getDoctrine()->getRepository(City::class)->find($request->get('rcity'));
                $user->setCity($rcity);
                $user->setLpminage($request->get('lpminage'));
                $user->setLpmaxage($request->get('lpmaxage'));
                $user->setLpheight($request->get('lpheight'));

//              Life Partner Requirements
                $lpcountry = $this->getDoctrine()->getRepository(Country::class)->find($request->get('lpcountry'));
                $user->setLpCountry($lpcountry);
                $lpstate = $this->getDoctrine()->getRepository(State::class)->find($request->get('lpstate'));
                $user->setLpState($lpstate);
                $lpcity = $this->getDoctrine()->getRepository(City::class)->find($request->get('lpcity'));
                $user->setLpCity($lpcity);
                $lpreligion = $this->getDoctrine()->getRepository(Religion::class)->find($request->get('lpreligion'));
                $user->setLpReligion($lpreligion);
                $lpcaste = $this->getDoctrine()->getRepository(Caste::class)->find($request->get('lpcaste'));
                $user->setLpCaste($lpcaste);
                $user->setLpmessage($request->get('message'));
                $user->setVerifykey(0);
//              $user->setUserid();
//                $user->setBlock(1);
                $em->persist($user);
                $em->flush();
                return $this->redirectToRoute('all_members');
            }
            $qualification = $this->getDoctrine()->getRepository(Education::class)->findAll();
            $ocupation = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
            $religions = $this->getDoctrine()->getRepository(Religion::class)->findAll();
            $rcountry = $this->getDoctrine()->getRepository(Country::class)->findAll();
            $rfocupation = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
            $rmocupation = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
            $lpcountry = $this->getDoctrine()->getRepository(Country::class)->findAll();
            $lpreligions = $this->getDoctrine()->getRepository(Religion::class)->findAll();
            $fetch = $this->getDoctrine()->getRepository(User::class)->find($id);

            return $this->render('AdminBundle:Admin/Sidebar:UpdateUser.html.twig',
                [
                    'UserData' => $fetch,
                    'Religion' => $religions,
                    'Ocupation' => $ocupation,
                    'RCountry' => $rcountry,
                    'LPReligion' => $lpreligions,
                    'LPCountry' => $lpcountry,
                    'FOcupation' => $rfocupation,
                    'MOcupation' => $rmocupation,
                    'UEducation'=> $qualification
                ]
            );
        }
        return $this->redirectToRoute('workplace_login');
    }





    /**
     * @Route("/User/Profile/Aprove/{id}", name="sub_admin_user_profile_approve")
     */
    public function ProfileApproveAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        if ($user->getApprove() == 1){
            $user->setApprove(0);
        }
        else{
            $user->setApprove(1);
        }
        $em->flush();
        return $this->redirectToRoute('all_members');

    }

    /**
     * @Route("/Admin/User/Block/{id}", name="admin_sub_admin_user_block")
     */
    public function AdminBlockUserAction(Request $request,$id)
    {
        if ($this->adminloggedin == true){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(User::class)->find($id);
            if ($user->getBlock() == 0){
                $user->setBlock(1);
            }
            else{
                $user->setBlock(0);
            }
            $em->flush();
            return $this->redirectToRoute('all_members');
        }
        return $this->redirectToRoute('workplace_login');
    }


    /**
     * @Route("/Admin/User/Delete/{id}", name="admin_sub_admin_user_delete")
     */
    public function AdminDeleteUserAction(Request $request,$id)
    {
        if ($this->adminloggedin == true){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(User::class)->find($id);
            $user->setBlock(2);
            $em->flush();
            return $this->redirectToRoute('all_members');
        }
        return $this->redirectToRoute('workplace_login');
    }


    /**
     * @Route("/All/Members", name="all_members")
     */
    public function AllMembersAction()
    {
        if ($this->adminloggedin == true){
            $allmembers = $this->getDoctrine()->getRepository(User::class)->findAll();
            return $this->render('AdminBundle:Admin/Sidebar:AllMembers.html.twig',
                array(
                    'Users' => $allmembers
                ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/SubAdmin/Members", name="subadmin_members")
     */
    public function SubAdminMembersAction()
    {
        if ($this->adminloggedin == true){
            $samembers = $this->getDoctrine()->getRepository(User::class)->findAll();
            return $this->render('AdminBundle:Admin/Sidebar:SubAdminMembers.html.twig',
                array(
                    'SAdminUsers' => $samembers
                ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Without/SubAdmin/Members", name="without_subadmin_members")
     */
    public function WithoutSubAdminMembersAction()
    {
        if ($this->adminloggedin == true){
            $wsamembers = $this->getDoctrine()->getRepository(User::class)->findAll();
            return $this->render('AdminBundle:Admin/Sidebar:WithoutSubAdminMembers.html.twig',
                array(
                    'WSAdminUsers' => $wsamembers
                ));
        }
        return $this->redirectToRoute('workplace_login');
    }




    /**
     * @Route("/Admin/Single/User/Profile/{id}", name="admins_single_users_profile")
     */
    public function UserProfileAction($id){
        if ($this->adminloggedin == true){
            $users = $this->getDoctrine()->getRepository(User::class)->find($id);
            return $this->render('AdminBundle:Admin/Sidebar:Profile.html.twig',
                ['Users' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }


    /**
     * @Route("/Admin/User/Package/Partial/{id}", name="admin_user_package_partial")
     */
    public function AdminUserPackagePartialViewAction($id)
    {
        if ($this->adminloggedin == true){
            $expire = $this->getDoctrine()->getRepository(Expire::class)->findBy(
                ['user' => $id]
            );
            return $this->render('AdminBundle:Admin/Sidebar:PackagePartial.html.twig',
                array(
                    'Expire' => $expire
                ));
        }
        return $this->redirectToRoute('workplace_login');
    }


}

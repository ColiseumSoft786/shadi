<?php

namespace App\SubadminBundle\Controller;

use App\HomeBundle\Entity\Caste;
use App\HomeBundle\Entity\City;
use App\HomeBundle\Entity\Country;
use App\HomeBundle\Entity\Education;
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

class UsersController extends Controller
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
     * @Route("/SubAdmin/Workplace", name="sub_admins_users")
     */
    public function UsersAction(){
        if ($this->loggedin == true){
            $subadminid = $_SESSION['subadmin'];
            $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findOneBy(
                ['phone' => $subadminid]);
            $users = $this->getDoctrine()->getRepository(User::class)->findBy(
                ['subadmin' => $sadmin]
            );
            return $this->render('SubAdminBundle:Users:Users.html.twig',
                ['Users' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }


    /**
     * @Route("/User/Profile/{id}", name="sub_admins_users_profile")
     */
    public function UserProfileAction($id){
        if ($this->loggedin == true){
            $users = $this->getDoctrine()->getRepository(User::class)->find($id);
            return $this->render('SubAdminBundle:Users:Profile.html.twig',
                ['Users' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }


    /**
     * @Route("/User/Profile/For/Others/{id}", name="sub_admins_users_profile_for_others")
     */
    public function UserProfileOthersAction($id){
        if ($this->loggedin == true){
            $users = $this->getDoctrine()->getRepository(User::class)->find($id);
            return $this->render('SubAdminBundle:Users:Profileothers.html.twig',
                ['Users' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }

    /**
     * @Route("/SubAdmin/All/Members", name="sub_admins_all_members")
     */
    public function SubAdminAllMembersAction(){
        if ($this->loggedin == true){
            $users = $this->getDoctrine()->getRepository(User::class)->findAll();
            return $this->render('SubAdminBundle:Users:SAdminAllMembers.html.twig',
                ['SAdminAllMembers' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }

    /**
     * @Route("/SubAdmin/Other/Members", name="sub_admins_other_members")
     */
    public function SubAdminOtherMembersAction(){
        if ($this->loggedin == true){
            $users = $this->getDoctrine()->getRepository(User::class)->findAll();
            return $this->render('SubAdminBundle:Users:OtherSAdminMembers.html.twig',
                ['SAdminAllMembers' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }

    /**
     * @Route("/SubAdmin/My/Members", name="sub_admins_my_members")
     */
    public function SubAdminMyMembersAction(){
        if ($this->loggedin == true){
            $sadminid = $_SESSION['subadmin'];
            $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findBy(
                ['phone' => $sadminid]
            );
            $users = $this->getDoctrine()->getRepository(User::class)->findBy(
                ['subadmin' => $sadmin]
            );
            return $this->render('SubAdminBundle:Users:SAdminMyMembers.html.twig',
                ['SAdminMyMembers' => $users]
            );
        }
        return $this->redirectToRoute('sub_admins_login');
    }


    /**
     * @Route("/User/Insert", name="subadmins_users_insert")
     */
    public function UserInsertAction(Request $request){
        if ($this->loggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $user = new User();

                $subadminid = $_SESSION['subadmin'];
                $sadmin = $this->getDoctrine()->getRepository(Subadmin::class)->findOneBy(
                    ['phone' => $subadminid]
                );
                $user->setSubadmin($sadmin);
                $info = pathinfo($_FILES['img']['name']);
                $ext = $info['extension'];
                $date = date('mdYhisms', time());
                $newname = $date . '.' . $ext;
                $target = 'bundles/assets/profiles/'.$newname;
                move_uploaded_file( $_FILES['img']['tmp_name'], "./".$target);
                $user->setUpic($target);
                $user->setApprove(1);
                $user->setPrivacy($request->get('privacy'));
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
                $user->setBlock(0);
                $user->setStartdate($date = date("m/d/Y"));
                $em->persist($user);
                $em->flush();
                function randomPassword()
                {
                    $alphabet = "0123456789";
                    $pass = array(); //remember to declare $pass as an array
                    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                    for ($i = 0; $i < 4; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[] = $alphabet[$n];
                    }
                    return implode($pass); //turn the array into a string
                }
                $verify_key = randomPassword();
                $userid = $user->getId().'-usr-'.$verify_key;
//                $random = random_int(1, 5000);
                $user->setUserid($userid);
                $em->flush();
                return $this->redirectToRoute('sub_admins_users');
            }
            $qualification = $this->getDoctrine()->getRepository(Education::class)->findAll();
            $ocupation = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
            $religions = $this->getDoctrine()->getRepository(Religion::class)->findAll();
            $rcountry = $this->getDoctrine()->getRepository(Country::class)->findAll();
            $rfocupation = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
            $rmocupation = $this->getDoctrine()->getRepository(Ocupation::class)->findAll();
            $lpcountry = $this->getDoctrine()->getRepository(Country::class)->findAll();
            $lpreligions = $this->getDoctrine()->getRepository(Religion::class)->findAll();

            return $this->render('SubAdminBundle:Users:AddUser.html.twig',
                [
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
        return $this->redirectToRoute('sub_admins_login');
    }





//    Partial Views Start
    /**
     * @Route("/User/Castes", name="sub_admins_users_castes")
     */
    public function CastesAction(Request $request){
        $id = $request->get('id');
        $castes = $this->getDoctrine()->getRepository(Caste::class)->findBy(
            ['religion' => $id]
        );
//        var_dump($castes);
        return $this->render('SubAdminBundle:Partials:caste.html.twig',
            ['Caste' => $castes]
        );
    }



    /**
     * @Route("/User/RState", name="subadmins_users_rstate")
     */
    public function RStateAction(Request $request){
        $id = $request->get('id');
        $rstate = $this->getDoctrine()->getRepository(State::class)->findBy(
            ['country' => $id]
        );
        return $this->render('SubAdminBundle:Partials:rstate.html.twig',
            ['RState' => $rstate]
        );
    }



    /**
     * @Route("/User/RCity", name="subadmins_users_rcity")
     */
    public function RCityAction(Request $request){
        $id = $request->get('id');
        $rcity = $this->getDoctrine()->getRepository(City::class)->findBy(
            ['state' => $id]
        );
        return $this->render('SubAdminBundle:Partials:rcity.html.twig',
            ['RCity' => $rcity]
        );
    }




    /**
     * @Route("/Sidebar/LP_State", name="users_lp_states")
     */
    public function LPStateAction(Request $request){
        $id = $request->get('id');
        $lpstate = $this->getDoctrine()->getRepository(State::class)->findBy(
            ['country' => $id]
        );
        return $this->render('SubAdminBundle:Partials:lpstate.html.twig',
            ['LPState' => $lpstate]
        );
    }

    /**
     * @Route("/User/LPCity", name="subadmins_users_lpcity")
     */
    public function LPCityAction(Request $request){
        $id = $request->get('id');
        $lpcity = $this->getDoctrine()->getRepository(City::class)->findBy(
            ['state' => $id]
        );
        return $this->render('SubAdminBundle:Partials:lpcity.html.twig',
            ['LPCity' => $lpcity]
        );
    }


    /**
     * @Route("/User/LP/Castes", name="subadmins_users_lpcastes")
     */
    public function LPCastesAction(Request $request){
        $id = $request->get('id');
        $lpcastes = $this->getDoctrine()->getRepository(Caste::class)->findBy(
            ['religion' => $id]
        );
        return $this->render('SubAdminBundle:Partials:lpcaste.html.twig',
            ['LPCaste' => $lpcastes]
        );
    }

//    Partial Views End




    /**
     * @Route("/User/Update/{id}", name="sub_admins_users_update")
     */
    public function UserUpdateAction(Request $request,$id){
        if ($this->loggedin == true){
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
                $user->setPrivacy($request->get('privacy'));
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
                return $this->redirectToRoute('sub_admins_users');
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

            return $this->render('SubAdminBundle:Users:UpdateUser.html.twig',
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
        return $this->redirectToRoute('sub_admins_login');
    }


    /**
     * @Route("/User/Block/{id}", name="sub_admin_user_block")
     */
    public function BlockUserAction(Request $request,$id)
    {
        if ($this->loggedin == true){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(User::class)->find($id);
            if ($user->getBlock() == 0){
                $user->setBlock(1);
            }
            else{
                $user->setBlock(0);
            }
            $em->flush();
            return $this->redirectToRoute('sub_admins_my_members');
        }
        return $this->redirectToRoute('sub_admins_login');
    }

    /**
     * @Route("/Users/Blocks/{id}", name="sub_admin_user_block_users")
     */
    public function UserBlockAction(Request $request,$id)
    {
        if ($this->loggedin == true){
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(User::class)->find($id);
            if ($user->getBlock() == 0){
                $user->setBlock(1);
            }
            else{
                $user->setBlock(0);
            }
            $em->flush();
            return $this->redirectToRoute('sub_admins_users');
        }
        return $this->redirectToRoute('sub_admins_login');
    }




    /**
     * @Route("/User/Delete/{id}", name="sub_admin_user_delete")
     */
    public function DeleteUserAction(Request $request,$id)
    {
        if ($this->loggedin == true){
            if ($request->getMethod() == "GET"){
                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository(User::class)->find($id);
                $user->setBlock(2);
                $em->flush();
            }
            return $this->redirectToRoute('sub_admins_my_members');
        }
        return $this->redirectToRoute('sub_admins_login');

    }


    /**
     * @Route("/Main/User/Delete/{id}", name="main_sub_admin_user_delete")
     */
    public function DeleteUsersAction(Request $request,$id)
    {
        if ($this->loggedin == true){
            if ($request->getMethod() == "GET"){
                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository(User::class)->find($id);
                $user->setBlock(2);
                $em->flush();
            }
            return $this->redirectToRoute('sub_admins_users');
        }
        return $this->redirectToRoute('sub_admins_login');

    }



}

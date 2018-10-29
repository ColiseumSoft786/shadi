<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CountryController extends Controller
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
     * @Route("/Countries", name="admin_countries")
     */
    public function CountriesAction()
    {
        if ($this->adminloggedin == true){
            $country = $this->getDoctrine()->getRepository(Country::class)->findAll();
            return $this->render('AdminBundle:Admin/Country:country.html.twig', array(
                'Countries' => $country
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Country/Insert", name="admin_countries_insert")
     */
    public function AddCountryAction(Request $request)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $country = new Country();
                $country->setName($request->get('name'));
                $em->persist($country);
                $em->flush();
                return $this->redirectToRoute('admin_countries');
            }
            return $this->render('AdminBundle:Admin/Country:addcountry.html.twig', array(
                // ...
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Country/Update/{id}", name="admin_country_update")
     */
    public function UpdateCountryAction(Request $request, $id)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $country = $em->getRepository(Country::class)->find($id);
                $country->setName($request->get('name'));
                $em->flush();
                return $this->redirectToRoute('admin_countries');
            }
            $ctry = $this->getDoctrine()->getRepository(Country::class)->find($id);
            return $this->render('AdminBundle:Admin/Country:updatecountry.html.twig', array(
                'Country' => $ctry
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Country/Delete/{id}", name="admin_country_delete")
     */
    public function DeleteCountryAction($id)
    {
        if ($this->adminloggedin == true){
            $em = $this->getDoctrine()->getManager();
            $country = $em->getRepository(Country::class)->find($id);
            $em->remove($country);
            $em->flush();
            return $this->redirectToRoute('admin_countries');
        }
        return $this->redirectToRoute('workplace_login');
    }

}

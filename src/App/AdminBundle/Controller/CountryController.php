<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CountryController extends Controller
{
    /**
     * @Route("/Countries", name="admin_countries")
     */
    public function CountriesAction()
    {
        $country = $this->getDoctrine()->getRepository(Country::class)->findAll();
        return $this->render('AdminBundle:Admin/Country:subadmin.html.twig', array(
            'Countries' => $country
        ));
    }

    /**
     * @Route("/Country/Insert", name="admin_countries_insert")
     */
    public function AddCountryAction(Request $request)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $country = new Country();
            $country->setName($request->get('name'));
            $em->persist($country);
            $em->flush();
            return $this->redirectToRoute('admin_countries');
        }
        return $this->render('AdminBundle:Admin/Country:addsubadmin.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/Country/Update/{id}", name="admin_country_update")
     */
    public function UpdateCountryAction(Request $request, $id)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $country = $em->getRepository(Country::class)->find($id);
            $country->setName($request->get('name'));
            $em->flush();
            return $this->redirectToRoute('admin_countries');
        }
        $ctry = $this->getDoctrine()->getRepository(Country::class)->find($id);
        return $this->render('AdminBundle:Admin/Country:updatesubadmin.html.twig', array(
            'Country' => $ctry
        ));
    }

}

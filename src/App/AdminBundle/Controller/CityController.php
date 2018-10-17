<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\City;
use App\HomeBundle\Entity\State;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{
    /**
     * @Route("/Cities/{id}", name="admin_cities")
     */
    public function CitiesAction($id)
    {
        $city = $this->getDoctrine()->getRepository(City::class)->findBy(
            array(
                'state' => $id
            ));
        return $this->render('AdminBundle:Admin/City:city.html.twig', array(
            'Cities' => $city
        ));
    }

    /**
     * @Route("/City/Insert/New", name="admin_city_insert")
     */
    public function AddCityAction(Request $request)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $city = new City();
            $city->setName($request->get('name'));
            $stId = $this->getDoctrine()->getRepository(State::class)->find($request->get('state'));
            $city->setState($stId);
            $em->persist($city);
            $em->flush();
            return $this->redirectToRoute('admin_cities',
                array(
                    'id' => $city->getState()->getId()
                ));
        }
        $states = $this->getDoctrine()->getRepository(State::class)->findAll();
        return $this->render('AdminBundle:Admin/City:addcity.html.twig', array(
            'State' => $states
        ));
    }

    /**
     * @Route("/City/Update/{id}", name="admin_city_update")
     */
    public function UpdateCityAction(Request $request, $id)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $city = $em->getRepository(City::class)->find($id);
            $city->setName($request->get('name'));
            $stId = $this->getDoctrine()->getRepository(State::class)->find($request->get('state'));
            $city->setState($stId);
            $em->flush();
            return $this->redirectToRoute('admin_cities',
                array(
                    'id' => $city->getState()->getId()
                ));
        }
        $states = $this->getDoctrine()->getRepository(State::class)->findAll();
        $city1 = $this->getDoctrine()->getRepository(City::class)->find($id);
        return $this->render('AdminBundle:Admin/City:updatecity.html.twig', array(
            'City' => $city1,
            'State' => $states
        ));
    }

}

<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Country;
use App\HomeBundle\Entity\State;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class StateController extends Controller
{
    /**
     * @Route("/State/{id}", name="admin_states")
     */
    public function StateAction($id)
    {
        $state = $this->getDoctrine()->getRepository(State::class)->findBy(
            array(
                'country' => $id
            ));
        return $this->render('AdminBundle:Admin/State:state.html.twig', array(
            'States' => $state
        ));
    }


    /**
     * @Route("/State/Insert/New", name="admin_state_insert")
     */
    public function AddStateAction(Request $request)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $state = new State();
            $state->setName($request->get('name'));
            $conId = $this->getDoctrine()->getRepository(Country::class)->find($request->get('country'));
            $state->setCountry($conId);
            $em->persist($state);
            $em->flush();
            return $this->redirectToRoute('admin_states',
                array(
                    'id' => $state->getCountry()->getId()
                ));
        }
        $country = $this->getDoctrine()->getRepository(Country::class)->findAll();
        return $this->render('AdminBundle:Admin/State:addstate.html.twig', array(
            'Countries' => $country
        ));
    }

    /**
     * @Route("/State/Update/{id}", name="admin_state_update")
     */
    public function UpdateStateAction(Request $request, $id)
    {
        if ($request->getMethod() == "POST"){
            $em = $this->getDoctrine()->getManager();
            $state = $em->getRepository(State::class)->find($id);
            $state->setName($request->get('name'));
            $conId = $this->getDoctrine()->getRepository(Country::class)->find($request->get('country'));
            $state->setCountry($conId);
            $em->flush();
            return $this->redirectToRoute('admin_states',
                array(
                    'id' => $state->getCountry()->getId()
                ));
        }
        $country = $this->getDoctrine()->getRepository(Country::class)->findAll();
        $state1 = $this->getDoctrine()->getRepository(State::class)->find($id);
        return $this->render('AdminBundle:Admin/State:updatestate.html.twig', array(
            'State' => $state1,
            'Countries' => $country
        ));
    }

}

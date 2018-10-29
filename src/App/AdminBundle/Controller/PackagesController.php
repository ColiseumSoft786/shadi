<?php

namespace App\AdminBundle\Controller;

use App\HomeBundle\Entity\Package;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PackagesController extends Controller
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
     * @Route("/Packages", name="admin_packages")
     */
    public function PackagesAction()
    {
        if ($this->adminloggedin == true){
            $package = $this->getDoctrine()->getRepository(Package::class)->findAll();
            return $this->render('AdminBundle:Admin/Packages:packages.html.twig', array(
                'Packages' => $package
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
 * @Route("/Package/Insert/New", name="admin_package_insert")
 */
    public function AddPackagesAction(Request $request)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pkg = new Package();
                $pkg->setName($request->get('name'));
                $pkg->setPrice($request->get('price'));
                $pkg->setMonth($request->get('month'));
                $pkg->setInterest($request->get('interest'));
                $em->persist($pkg);
                $em->flush();
                return $this->redirectToRoute('admin_packages');
            }
            return $this->render('AdminBundle:Admin/Packages:addpackages.html.twig');
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Package/Update/{id}", name="admin_packages_update")
     */
    public function UpdatePackagesAction(Request $request, $id)
    {
        if ($this->adminloggedin == true){
            if ($request->getMethod() == "POST"){
                $em = $this->getDoctrine()->getManager();
                $pkg = $em->getRepository(Package::class)->find($id);
                $pkg->setName($request->get('name'));
                $pkg->setPrice($request->get('price'));
                $pkg->setMonth($request->get('month'));
                $pkg->setInterest($request->get('interest'));
                $em->flush();
                return $this->redirectToRoute('admin_packages');
            }
            $pkg1 = $this->getDoctrine()->getRepository(Package::class)->find($id);
            return $this->render('AdminBundle:Admin/Packages:updatepackages.html.twig', array(
                'Package' => $pkg1
            ));
        }
        return $this->redirectToRoute('workplace_login');
    }

    /**
     * @Route("/Package/Del/{id}", name="admin_packages_delete")
     */
    public function DeletePackagesAction($id)
    {
        if ($this->adminloggedin == true){
            $em = $this->getDoctrine()->getManager();
            $pkg = $em->getRepository(Package::class)->find($id);
            $em->remove($pkg);
            $em->flush();
            return $this->redirectToRoute('admin_packages');
        }
        return $this->redirectToRoute('workplace_login');
    }


}

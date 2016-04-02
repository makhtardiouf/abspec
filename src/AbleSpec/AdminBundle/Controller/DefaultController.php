<?php
/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: DefaultController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */

namespace AbleSpec\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller {

    /**
     * @Route("/", name="adminhome")
     * @Template()
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction(Request $request) {
        $session = $request->getSession();

        // Needed for CRUD mapping ...etc
        if ($this->getUser()) {
            $session->set('expertid', $this->getUser()->getId());
        }
        // TODO avoid the redirection
        return $this->redirectToRoute("expert_list");
    }

}

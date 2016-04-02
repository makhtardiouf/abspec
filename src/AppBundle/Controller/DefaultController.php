<?php

/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: DefaultController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use AbleSpec\ExpertBundle\Controller\PageController;

class DefaultController extends \AbleSpec\ExpertBundle\Controller\PageController {
//Controller {

    /**
     * @Route("/", name="home")
     * // name="experthome"
     * Home page default entry point, and login error display
     */
    public function indexAction(Request $request, $expert = '', $id = 0) {

       // $adminObj = new PageController();        
        $news = $this->getLatestNews(array('id' => null));
        //var_dump($news);exit();
        // app/Resources/views/default
        return $this->render('default/index.html.twig', array(
                    // 'last_username' => $lastUsername,
                    'error' => '',
                    'csrf_token' => $this->getCsrf(),
                    'latestNews' => $news,
            'pagefooter' => array()
        ));
    }

    /**
     * @Route("/_login", name="login")
     * Home page for login; generates CSRF token if necessary
     * See vendor/friendsofsymfony/user-bundle/Controller/SecurityController.php
     */
    public function loginAction(Request $request) {
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();
        //var_dump($request);exit();

        if (class_exists('\Symfony\Component\Security\Core\Security')) {
            $authErrorKey = Security::AUTHENTICATION_ERROR;
            $lastUsernameKey = Security::LAST_USERNAME;
        } else {
            // BC for SF < 2.6
            $authErrorKey = SecurityContextInterface::AUTHENTICATION_ERROR;
            $lastUsernameKey = SecurityContextInterface::LAST_USERNAME;
        }

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }
        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // $meth = $request->getMethod();
        if ($error) {
            // app/Resources/views/default
            return $this->render('default/index.html.twig', array(
                        // 'last_username' => $lastUsername,
                        'error' => $error,
                        'csrf_token' => $this->getCsrf(),
            ));
        } else if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('adminhome');
        } else {
            return $this->redirectToRoute("userhome");
        }
    }

    private function getCsrf() {
        $csrfToken = '';
        if ($this->has('security.csrf.token_manager')) {
            $csrfToken = $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
        } else {
            // BC for SF < 2.4
            $csrfToken = $this->has('form.csrf_provider') ? $this->get('form.csrf_provider')->generateCsrfToken('authenticate') : null;
        }
        return $csrfToken;
    }

    /**
     * @Route("/_home", name="userhome")
     * 
     * Define a dynamic route to each expertID e.g. /{expertid} with default page "expert"
     */
    public function showhomeAction(Request $request, $expertid = "expert") {

        $expertPage = "AbleSpecExpertBundle::Default/index.html.twig";

        // Mind the case when admin want to see a user's home       
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('adminhome');
        } else if ($this->isGranted('ROLE_USER')) {
        
            return $this->redirectToRoute('experthome');
        }

        return $this->render($expertPage, array('latestNews' => null, 'pagefooter' => null, ));
    }

}

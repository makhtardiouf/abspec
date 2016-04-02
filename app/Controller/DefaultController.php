<?php
// watch out the namespace
/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: DefaultController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AbleSpec\ExpertBundle\Controller\PageController;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template()
     * WATCH OUT there seems to be no hits here
     */
    public function indexAction()
    {
    
        return $this->render('default/index.html.twig'); //,  array('latestNews' => $news));
    }

    /**
     * @Route("/_testmail", name="testmail")
     * @Template()
     */
    public function testmailAction()
    {
        $message = \Swift_Message::newInstance()
                ->setSubject('Test abspecialist')
                ->setFrom('makhtar@localhost')
                ->setTo('elmakdi@gmail.com')
                ->setBody(
                $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                        'default/index.html.twig'
                        //, array('name' => $name)
                ), 'text/html'
        );

        $this->get('mailer')->send($message);

        return $this->redirectToRoute('experthome');
    }
}

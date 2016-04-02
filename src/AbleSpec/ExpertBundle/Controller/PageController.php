<?php

/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: PageController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */

namespace AbleSpec\ExpertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller {

    private $contentLength = 200; // number of characters

    /**
     * @Route("{expert}{id}", name="experthome")
     * @Template()
     */

    public function indexAction(Request $request, $expert, $id = 0) {
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        $uri = $_SERVER['REQUEST_URI'];
        $tmp = explode("/", $uri);
        $useridTmp  = $tmp[count($tmp) - 1];
        //$tmp = explode(".", $uri);
        //$expertId = $tmp[0];
        //var_dump($expertId);exit();

        if (empty($useridTmp)) {
            $useridTmp = $request->get("userid");
            //var_dump($expertId);exit();
        }
             
        $userId = str_replace("expert", "", $useridTmp);        
        //var_dump($userId);exit();
        
        if (empty($userId)) {
            $user = $this->getUser();
            if ($user !== null) {
                $userId = $user->getId();
            } else {
                 $userId = 0;
            }
        } 
        // User Object points to the webusers table
                $latestNews = $this->getLatestNews(array('user' => $userId));
                $footer = $this->getFooter($userId);
                return $this->render("AbleSpecExpertBundle::Default/index.html.twig", 
                        array('latestNews' => $latestNews, 'pagefooter' => $footer,));
//            }
//        }
//        $session->set('expertId', $expertId);
//        // Default expert page. Point to the expert table
//        $latestNews = $this->getLatestNews(array('id' => $expertId));
//        $footer = $this->getFooter($expertId);
        //var_dump($footer);exit();
//        return $this->render("AbleSpecExpertBundle::Default/index.html.twig", 
//                            array('latestNews' => $latestNews, 'pagefooter' => $footer,));
    }

    // Get expertpage footer from Expert2 bundle
    private function getFooter($userid = null) {
        $footer = array();
        $em = $this->getDoctrine()->getManager();
        if (empty($userid)) {
            return $footer;
        }
        $member = $em->getRepository('AbleSpecExpertBundle:TMember')->find($userid);
        if (!empty($member)) {
            $footer['contact'] = "  핸드폰:" . $member->getHandphone() . " | 이메일: " . $member->getEmail();
            $footer['contact'] .= "<br>등록번호: " . $member->getRegNumber() . "  | 주소: " . $member->getAddr1() . " " . $member->getAddr2();
        }
        return $footer;
    }

    // Will also be accessed by the login page to display news from Admin

    public function getLatestNews($options = array()) {
        $latestNews = array();
        try {
            $em = $this->getDoctrine()->getManager();
            $expert = $em->getRepository('AbleSpecAdminBundle:Expert')->findOneBy($options);
            // var_dump($options);exit();
            // TODO: if null, should get all for admin
            if (!empty($expert)) {
                $latestNews['lastNotice'] = $this->getLastNotice($em, array('expert' => $expert));

                $latestNews['lastCase'] = $this->getLastCase($em, array('expert' => $expert));
            } else if ($this->isGranted("ROLE_ADMIN")) {
                // TODO: let also anonymous see news from the login page
                $latestNews['lastNotice'] = $this->getLastNotice($em, array('expert' => null));

                $latestNews['lastCase'] = $this->getLastCase($em, array('expert' => null));
            }
        } catch (\Exception $ex) {
            return null;
        }
        return $latestNews;
    }

    private function getLastNotice($em, $options = array()) {
        $lastNotice = $em->getRepository('AbleSpecExpertBundle:Notice')->findOneBy(
                $options, array('id' => 'DESC'));

        if (!empty($lastNotice)) {
            $content = sprintf("%s %s", $lastNotice->getCreationdate()->format("Y.m.d"), $lastNotice->getContent());
            // var_dump($content);exit();
            return substr($content, 0, $this->contentLength) . "...";
        }
        return "공지사항이 없다"; //null;
    }

    private function getLastCase($em, $options = array()) {
        $lastCase = $em->getRepository('AbleSpecExpertBundle:RecentCases')->findOneBy(
                $options, array('id' => 'DESC'));

        if (!empty($lastCase)) {
            $content = sprintf("%s %s", $lastCase->getCreationdate()->format("Y.m.d"), $lastCase->getContent());
            // var_dump($content);exit();
            return substr($content, 0, $this->contentLength) . "...";
        }

        return "최근사례이 없다"; //null;
    }

    /* AppBundle Defines a dynamic route to each expertID e.g. /{expertid} with default page "expert" */
}

<?php

/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: RecentNewsController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */

namespace AbleSpec\ExpertBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AbleSpec\ExpertBundle\Entity\RecentNews;
use AbleSpec\ExpertBundle\Form\RecentNewsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * RecentNews controller.
 *
 * @Route("/recentnews")
 */
class RecentNewsController extends Controller {

    // should register this as service
    public function getExpert($expertId = '') {
        $em = $this->getDoctrine()->getManager();
        if (is_numeric($expertId)) {
            return $em->getRepository('AbleSpecAdminBundle:Expert')->find($expertId);
        }

        $userId = $this->getUser()->getId();
        $expert = $em->getRepository('AbleSpecAdminBundle:Expert')->findOneBy(array('user' => "$userId"));
        if (!empty($expert)) {
            return $expert;
        }
        return null;
    }

    /**
     * Lists all RecentNews entities.
     *
     * @Route("/", name="recentnews")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        // ODO: Admin should also get only News of the expert on which he clicked
        if ($this->isGranted("ROLE_ADMIN")) {
            $entities = $em->getRepository('AbleSpecExpertBundle:RecentNews')->findAll();
        } elseif ($this->isGranted("ROLE_USER")) {
            $expert = $this->getExpert();
            // var_dump($expert);exit();
            $entities = $em->getRepository('AbleSpecExpertBundle:RecentNews')->findBy(array('expert' => $expert));
        } else {
            // Annonymous user read-only view of a particuler expert, will need ?id= query string
            $expertId = $request->get('id');
           // var_dump($expertId);exit();
            if (!is_numeric($expertId)) {
                // Target the news written by admin
                $expertId = 0;
            }
            $entities = $em->getRepository('AbleSpecExpertBundle:RecentNews')->findBy(array('expert' => $this->getExpert($expertId)));
        }
        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new RecentNews entity.
     *
     * @Route("/", name="recentnews_create")
     * @Method("POST")
     * @Template("AbleSpecExpertBundle:RecentNews:new.html.twig")
     * @Security("has_role('ROLE_USER')")
     */
    public function createAction(Request $request) {
        $entity = new RecentNews();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $userId = $this->getUser()->getId();

            if (is_numeric($userId)) {
                // For admin will return null
                $expert = $em->getRepository('AbleSpecAdminBundle:Expert')->findOneBy(array('user' => "$userId"));
                //var_dump($expert);exit();
                $entity->setExpert($expert);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('recentnews_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a RecentNews entity.
     *
     * @param RecentNews $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RecentNews $entity) {
        $form = $this->createForm(new RecentNewsType(), $entity, array(
            'action' => $this->generateUrl('recentnews_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RecentNews entity.
     *
     * @Route("/new", name="recentnews_new")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction() {
        $entity = new RecentNews();
        $entity->setCreationdate(new \DateTime("now"));
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a RecentNews entity.
     *
     * @Route("/{id}", name="recentnews_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecExpertBundle:RecentNews')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecentNews entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RecentNews entity.
     *
     * @Route("/{id}/edit", name="recentnews_edit")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecExpertBundle:RecentNews')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecentNews entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a RecentNews entity.
     *
     * @param RecentNews $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(RecentNews $entity) {
        $form = $this->createForm(new RecentNewsType(), $entity, array(
            'action' => $this->generateUrl('recentnews_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing RecentNews entity.
     *
     * @Route("/{id}", name="recentnews_update")
     * @Method("PUT")
     * @Template("AbleSpecExpertBundle:RecentNews:edit.html.twig")
     * @Security("has_role('ROLE_USER')")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecExpertBundle:RecentNews')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecentNews entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recentnews_show', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a RecentNews entity.
     *
     * @Route("/{id}", name="recentnews_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AbleSpecExpertBundle:RecentNews')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RecentNews entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('recentnews'));
    }

    /**
     * Creates a form to delete a RecentNews entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('recentnews_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}

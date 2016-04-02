<?php

/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: RecentCasesController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */

namespace AbleSpec\ExpertBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AbleSpec\ExpertBundle\Entity\RecentCases;
use AbleSpec\ExpertBundle\Form\RecentCasesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * RecentCases controller.
 *
 * @Route("/recentcases")
 */
class RecentCasesController extends Controller {

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
     * Lists all RecentCases entities.
     *
     * @Route("/", name="recentcases")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        // ODO: Admin should also get only News of the expert on which he clicked
        if ($this->isGranted("ROLE_ADMIN")) {
            $entities = $em->getRepository('AbleSpecExpertBundle:RecentCases')->findAll();
        } elseif ($this->isGranted("ROLE_USER")) {
            $expert = $this->getExpert();
            // var_dump($expert);exit();
            $entities = $em->getRepository('AbleSpecExpertBundle:RecentCases')->findBy(array('expert' => $expert));
        } else {
            // Annonymous user read-only view of a particuler expert, will need ?id= query string
            $expertId = $request->get('id');
           // var_dump($expertId);exit();
            if (!is_numeric($expertId)) {
                // Target the news written by admin
                $expertId = 0;
            }
            $entities = $em->getRepository('AbleSpecExpertBundle:RecentCases')->findBy(array('expert' => $this->getExpert($expertId)));
        }
        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new RecentCases entity.
     *
     * @Route("/", name="recentcases_create")
     * @Method("POST")
     * @Template("AbleSpecExpertBundle:RecentCases:new.html.twig")
     * @Security("has_role('ROLE_USER')")
     */
    public function createAction(Request $request) {
        $entity = new RecentCases();
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

            return $this->redirect($this->generateUrl('recentcases_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a RecentCases entity.
     *
     * @param RecentCases $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RecentCases $entity) {
        $form = $this->createForm(new RecentCasesType(), $entity, array(
            'action' => $this->generateUrl('recentcases_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RecentCases entity.
     *
     * @Route("/new", name="recentcases_new")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction() {
        $entity = new RecentCases();
        $entity->setCreationdate(new \DateTime("now"));
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a RecentCases entity.
     *
     * @Route("/{id}", name="recentcases_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecExpertBundle:RecentCases')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecentCases entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RecentCases entity.
     *
     * @Route("/{id}/edit", name="recentcases_edit")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecExpertBundle:RecentCases')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecentCases entity.');
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
     * Creates a form to edit a RecentCases entity.
     *
     * @param RecentCases $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(RecentCases $entity) {
        $form = $this->createForm(new RecentCasesType(), $entity, array(
            'action' => $this->generateUrl('recentcases_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing RecentCases entity.
     *
     * @Route("/{id}", name="recentcases_update")
     * @Method("PUT")
     * @Template("AbleSpecExpertBundle:RecentCases:edit.html.twig")
     * @Security("has_role('ROLE_USER')")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecExpertBundle:RecentCases')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RecentCases entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('recentcases_show', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a RecentCases entity.
     *
     * @Route("/{id}", name="recentcases_delete")
     * @Method("DELETE")
     * @Security("has_role('ROLE_USER')")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AbleSpecExpertBundle:RecentCases')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RecentCases entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('recentcases'));
    }

    /**
     * Creates a form to delete a RecentCases entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('recentcases_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}

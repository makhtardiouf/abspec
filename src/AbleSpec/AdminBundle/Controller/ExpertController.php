<?php

/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: ExpertController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */

namespace AbleSpec\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AbleSpec\AdminBundle\Entity\Expert;
use AbleSpec\AdminBundle\Form\ExpertType;

/**
 * Expert controller.
 *
 * @Route("/expert")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ExpertController extends Controller {

    /**
     * Utility function to map Expert ID with Logged in User ID
     * see in RecentNews
     */
    public function getExpertId() {
        $em = $this->getDoctrine()->getManager();
        $userId = $this->getUser()->getId();
        $expert = $em->getRepository('AbleSpecAdminBundle:Expert')->findOneBy(array('user' => "$userId"));
        if (!empty($expert)) {
            return $expert->getId();
        }
        return 0;
    }

    /**
     * Lists all Expert entities.
     *
     * @Route("/", name="expert_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AbleSpecAdminBundle:Expert')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Expert entity.
     *
     * @Route("/", name="expert_create")
     * @Method("POST")
     * @Template("AbleSpecAdminBundle:Expert:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Expert();
        $entity->setRegistrationDate(new \DateTime("now"));

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        //*** Watch out it seems to save in DB even when not valid
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('expert_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Expert entity.
     *
     * @param Expert $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Expert $entity) {
        $form = $this->createForm(new ExpertType(), $entity, array(
            'action' => $this->generateUrl('expert_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Expert entity.
     *
     * @Route("/new", name="expert_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Expert();
        //@todo mind removed rows
        $entity->setUseralias("expert" . $this->getNextExpertNumber());

        // Generation a registration number
        $bag = date("Ymd-hs");
        $bag .= "-";
        $bag .= str_shuffle("xyzabc" . rand(10, 20));
        $entity->setRegistrationNumber($bag);
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Expert entity.
     *
     * @Route("/{id}", name="expert_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecAdminBundle:Expert')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expert entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Expert entity.
     *
     * @Route("/{id}/edit", name="expert_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecAdminBundle:Expert')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expert entity.');
        }

        $entity->setPackages($this->getPackages());
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Expert entity.
     *
     * @param Expert $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Expert $entity) {
        $form = $this->createForm(new ExpertType(), $entity, array(
            'action' => $this->generateUrl('expert_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Expert entity.
     *
     * @Route("/{id}", name="expert_update")
     * @Method("PUT")
     * @Template("AbleSpecAdminBundle:Expert:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AbleSpecAdminBundle:Expert')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expert entity.');
        }

        // Check POST params
        //$request->request->all();
        $packs = $request->request->get("appbundle_expert");
//      var_dump($packs['packages']);
//      var_dump($request->request->all());
//      exit();
        if (!empty($packs['packages'])) {
            $entity->setPackages($packs['packages']);
            $em->persist($entity);  // added
        }
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $em->flush();

            return $this->redirect($this->generateUrl('expert_show', array('id' => $id)));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Expert entity.
     *
     * @Route("/{id}", name="expert_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AbleSpecAdminBundle:Expert')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Expert entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('expert_list'));
    }

    /**
     * Creates a form to delete a Expert entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('expert_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * @todo mind deleted rows
     * @return int nextNumber
     */
    private function getNextExpertNumber() {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AbleSpecAdminBundle:Expert')->findAll();
        $nextNumber = count($entity) + 1;
        if ($nextNumber < 10) {
            $nextNumber = sprintf("%02d", $nextNumber);
        }
        return $nextNumber;
    }

    private function getPackages() {
        $em = $this->getDoctrine()->getManager();
        $packs = $em->getRepository('AbleSpecAdminBundle:Package')->findAll();
        return $packs;
    }

}

<?php
/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: PackageController.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */
namespace AbleSpec\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AbleSpec\AdminBundle\Entity\Package;
use AbleSpec\AdminBundle\Form\PackageType;

/**
 * Package controller.
 *
 * @Route("/package")
 * @Security("has_role('ROLE_ADMIN')")
 */
class PackageController extends Controller
{

    /**
     * Lists all Package entities.
     *
     * @Route("/", name="package")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AbleSpecAdminBundle:Package')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Package entity.
     *
     * @Route("/", name="package_create")
     * @Method("POST")
     * @Template("AbleSpecAdminBundle:Package:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Package();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('package_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Package entity.
     *
     * @param Package $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Package $entity)
    {
        $form = $this->createForm(new PackageType(), $entity, array(
            'action' => $this->generateUrl('package_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Package entity.
     *
     * @Route("/new", name="package_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Package();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Package entity.
     *
     * @Route("/{id}", name="package_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecAdminBundle:Package')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Package entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Package entity.
     *
     * @Route("/{id}/edit", name="package_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecAdminBundle:Package')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Package entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Package entity.
    *
    * @param Package $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Package $entity)
    {
        $form = $this->createForm(new PackageType(), $entity, array(
            'action' => $this->generateUrl('package_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Package entity.
     *
     * @Route("/{id}", name="package_update")
     * @Method("PUT")
     * @Template("AbleSpecAdminBundle:Package:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AbleSpecAdminBundle:Package')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Package entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('package_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Package entity.
     *
     * @Route("/{id}", name="package_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AbleSpecAdminBundle:Package')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Package entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('package'));
    }

    /**
     * Creates a form to delete a Package entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('package_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

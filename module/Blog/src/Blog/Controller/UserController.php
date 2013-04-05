<?php

namespace Blog\Controller;

use Root\EntityAwareController as EntityAwareController;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;

use Blog\Entity\User;
use Blog\Validator\UserValidator;

class UserController extends EntityAwareController
{
    public function indexAction()
    {
        $repository = $this->getEntityManager()->getRepository('Blog\Entity\User');
        //$posts      = $repository->findAll();

        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('users')));
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(5);

        $page = $this->getEvent()->getRouteMatch()->getParam('page', 1);

        if($page) $paginator->setCurrentPageNumber($page);

        return array(
            'paginator' => $paginator,
        );
    }

    public function addAction()
    {
        $messages = array();
        $em = $this->getEntityManager();
        $saved = false;

        $post = new User();
        $request = $this->getRequest();
        $validator = new UserValidator();

        if ($request->isPost()) {
            $data = (array)$request->getPost();
            if ($validator->isValid($data)) {
                $post->populate($data);
                $em->persist($post);
                $em->flush();
                $saved = true;
                $messages[] = array(
                    'type' => 'success',
                    'message' => 'You have successfully added a new User'
                );
            } else {
                $messages[] = array(
                    'type' => 'error',
                    'message' => 'Failed to add a User'
                );
            }
        }

        return array(
            'messages' => $messages,
            'errors' => $validator->getMessages(),
            'saved' => $saved,
            'post' => $request->getPost(),
        );
    }

    public function editAction()
    {
        $messages = array();
        $em = $this->getEntityManager();
        $saved = false;

        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toUrl('/error');
        }

        $post = $em->find('Blog\Entity\User', $id);
        $request = $this->getRequest();
        $validator = new UserValidator();

        if ($request->isPost()) {
            $data = (array)$request->getPost();
            if ($validator->isValid($data)) {
                $post->populate($data);
                $em->persist($post);
                $em->flush();
                $saved = true;
                $messages[] = array(
                    'type' => 'success',
                    'message' => 'User profile\'s just been updated successfully!'
                );
            } else {
                $messages[] = array(
                    'type' => 'error',
                    'message' => 'Failed to update the User profile'
                );
            }
        }

        return array(
            'messages' => $messages,
            'errors' => $validator->getMessages(),
            'saved' => $saved,
            'post' => $post,
            'id' => $id,
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params('id', null);
        if (null === $id) {
            return $this->redirect()->toUrl('/error');
        }

        $em = $this->getEntityManager();

        $post = $em->find('Blog\Entity\User', $id);

        $em->remove($post);
        $em->flush();

        return $this->redirect()->toUrl('/blog');
    }

}

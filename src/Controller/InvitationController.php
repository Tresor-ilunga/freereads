<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Invitation;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class InvitationController
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class InvitationController extends AbstractController
{
    /**
     * This controller is responsible for handling the invitation process.
     *
     * @param Invitation $invitation
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordHasherInterface $userPasswordHasher
     * @return Response
     * @throws Exception
     */
    #[Route('/invitation/{uuid}', name: 'app_invitation', methods: ['GET', 'POST'])]
    public function index(Invitation $invitation, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        if ($invitation->getReader() === null) {
            throw new Exception('This invitation has already been used!');
        }

        $user = new User();
        $user->setEmail($invitation->getEmail());

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $invitation->setReader($user);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('admin');
        }

        return $this->render('invitation/index.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}

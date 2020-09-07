<?php

namespace Acme;

class RegistersUser
{
    public function __construct(UserRepository $userRepository, Mailer $mailer)
    {
        $this->repository = $userRepository;
        $this->mailer = $mailer;
    }

    public function register(array $user)
    {
        $this->repository->create($user);
        $this->mailer->sendWelcome($user['email']);
    }
}

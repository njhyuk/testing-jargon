<?php

namespace spec\Acme;

use Acme\RegistersUser;
use PhpSpec\ObjectBehavior;
use Acme\UserRepository;
use Acme\Mailer;

class RegistersUserSpec extends ObjectBehavior
{
    function let(UserRepository $userRepository, Mailer $mailer)
    {
        $this->beConstructedWith($userRepository, $mailer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RegistersUser::class);
    }

    function it_creates_a_new_user(UserRepository $userRepository)
    {
        $user = [
            'username' => 'JohnDoe',
            'email' => 'john@example.com'
        ];

        $userRepository->create($user)->shouldBeCalled();

        return $this->register($user);
    }

    function it_sends_a_welcome_email(Mailer $mailer)
    {
        $user = [
            'username' => 'JohnDoe',
            'email' => 'john@example.com'
        ];

        $mailer->sendWelcome('john@example.com')->shouldBeCalled();

        return $this->register($user);
    }
}

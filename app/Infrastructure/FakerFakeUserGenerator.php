<?php

namespace App\Infrastructure;

use App\Domain\FakeUser\FakeUser;
use App\Domain\FakeUser\FakeUserRepository;
use App\Domain\FakeUserGenerator;
use Faker\Generator;

class FakerFakeUserGenerator implements FakeUserGenerator
{
    /**
     * @var Generator
     */
    private $generator;

    /**
     * @var FakeUserRepository
     */
    private $fakeUserRepository;

    /**
     * @param Generator $generator
     * @param FakeUserRepository $fakeUserRepository
     */
    public function __construct(
        Generator $generator,
        FakeUserRepository $fakeUserRepository
    ) {
        $this->generator = $generator;
        $this->fakeUserRepository = $fakeUserRepository;
    }

    /**
     * @return FakeUser
     */
    public function generate()
    {
        $fakeUser = FakeUser::register(
            $this->fakeUserRepository->nextId(),
            $this->generator->firstName,
            $this->generator->lastName,
            $this->generator->userName
        );

        $this->fakeUserRepository->store($fakeUser);

        return $fakeUser;
    }

    /**
     * @param int $quantity
     *
     * @return FakeUser[]
     *
     */
    public function generateList($quantity)
    {
        $fakeUsers = [];

        while ($quantity) {
            $fakeUser = FakeUser::register(
                $this->fakeUserRepository->nextId(),
                $this->generator->firstName,
                $this->generator->lastName,
                $this->generator->userName
            );
            $this->fakeUserRepository->store($fakeUser);

            $fakeUsers[] = $fakeUser;

            $quantity--;
        }

        return $fakeUsers;
    }
}
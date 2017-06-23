<?php

namespace App\Infrastructure\Doctrine;

use App\Domain\Retailer;
use App\Domain\User;
use App\Domain\Click\ClickFilter;
use App\Domain\Core\Pagination;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use App\Domain\Click\Click;
use App\Domain\Click\ClickId;
use App\Domain\Click\ClickNotFound;
use App\Domain\Click\ClickRepository;
use Doctrine\ORM\Query\Expr\Join;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\Paginatable;

final class DoctrineClickRepository implements ClickRepository
{
    use Paginatable;
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return ClickId
     */
    public function nextId()
    {
        $lastId = $this->entityManager->createQueryBuilder()
            ->select('COALESCE( MAX(a.id), 0 )')
            ->from(Click::class, 'a')
            ->getQuery()
            ->getSingleScalarResult();

        return new ClickId($lastId + 1);
    }

    /**
     * @param ClickFilter $filter
     * @param Pagination|null $pagination
     *
     * @return Click[]|LengthAwarePaginator
     */
    public function all(ClickFilter $filter, $pagination = null)
    {
        try {
            $queryBuilder = $this->entityManager
                ->createQueryBuilder()
                ->select('v')
                ->from(Click::class, 'v');

            return $queryBuilder->getQuery()->getResult();
        } catch (NoResultException $e) {
            return [];
        }
    }

    /**
     * @param ClickId $clickId
     *
     * @return Click|null
     *
     * @throws \Doctrine\ORM\NonUniqueResultException|ClickNotFound
     */
    public function byId(ClickId $clickId)
    {
        try {
            return $this->entityManager
                ->createQueryBuilder()
                ->select('v')
                ->from(Click::class, 'v')
                ->where('v.id = :clickId')
                ->getQuery()
                ->setParameter('clickId', (string) $clickId)
                ->getSingleResult();

        } catch (NoResultException $e) {
            throw ClickNotFound::fromId($clickId);
        }
    }

    /**
     * @param Click $click
     */
    public function store(Click $click)
    {
        $this->entityManager->persist($click);
        $this->entityManager->flush($click);
    }

    /**
     * @param Click[] $clicks
     */
    public function deleteList($clicks)
    {
        foreach ($clicks as $click) {
            $this->entityManager->remove($click);
        }

        $this->entityManager->flush();
    }

    /**
     * Creates a new QueryBuilder instance that is prepopulated for this entity name.
     *
     * @param string $alias
     * @param string $indexBy The index for the from.
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createQueryBuilder($alias, $indexBy = null)
    {
        return $this->entityManager
            ->createQueryBuilder()
            ->select($alias)
            ->from(Click::class, 'a');
    }
}
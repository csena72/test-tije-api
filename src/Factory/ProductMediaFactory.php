<?php

namespace App\Factory;

use App\Entity\ProductMedia;
use App\Repository\ProductMediaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<ProductMedia>
 *
 * @method        ProductMedia|Proxy                     create(array|callable $attributes = [])
 * @method static ProductMedia|Proxy                     createOne(array $attributes = [])
 * @method static ProductMedia|Proxy                     find(object|array|mixed $criteria)
 * @method static ProductMedia|Proxy                     findOrCreate(array $attributes)
 * @method static ProductMedia|Proxy                     first(string $sortedField = 'id')
 * @method static ProductMedia|Proxy                     last(string $sortedField = 'id')
 * @method static ProductMedia|Proxy                     random(array $attributes = [])
 * @method static ProductMedia|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ProductMediaRepository|RepositoryProxy repository()
 * @method static ProductMedia[]|Proxy[]                 all()
 * @method static ProductMedia[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static ProductMedia[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static ProductMedia[]|Proxy[]                 findBy(array $attributes)
 * @method static ProductMedia[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ProductMedia[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ProductMediaFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'url' => self::faker()->url(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ProductMedia $productMedia): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ProductMedia::class;
    }
}

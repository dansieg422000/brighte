<?php

namespace App\PropertyAnalyticBundle\Services;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class SerializerService
{
    /**
     * @var DenormalizerInterface
     */
    private $denormalizer;

    /**
     * DenormalizerService constructor.
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(
        DenormalizerInterface $denormalizer
    )
    {
        $this->denormalizer = $denormalizer;
    }

    /**
     * Maps resource entity to view model.
     *
     * @param mixed  $source
     * @param string $targetClass
     *
     * @return mixed
     */
    public function denormalizeObject($source, $targetClass)
    {
        return $this->denormalizer->denormalize($source, $targetClass);
    }

    /**
     * Maps collection of entity to an array instance of class.
     *
     * @param array  $collection
     * @param string $targetClass
     *
     * @return array
     */
    public function denormalizeCollection($collection, $targetClass)
    {
        if (!is_array($collection) && !$collection instanceof \Traversable) {
            throw new \InvalidArgumentException('The provided collection should be iterable.');
        }

        $mappedResults = [];
        foreach ($collection as $source) {
            $mappedResults[] = $this->denormalizeObject($source, $targetClass);
        }

        return $mappedResults;
    }
}

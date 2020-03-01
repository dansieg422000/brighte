<?php

namespace App\PropertyAnalyticBundle\Denormalizer;

//use Elmo\PerformanceBundle\DTO\ViewData\PerformanceScoreView;
//use Elmo\PerformanceBundle\DTO\ViewData\UserView;
use App\PropertyAnalyticBundle\DTO\ViewData\PropertyAnalyticsView;
use App\PropertyAnalyticBundle\Entity\PropertyAnalytics;
use App\PropertyAnalyticBundle\Services\DataTransitionService;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
//use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

//class PropertyAnalyticDenormalizer extends SerializerAwareNormalizer implements DenormalizerInterface
class PropertyAnalyticDenormalizer implements DenormalizerInterface
{
    use SerializerAwareTrait;
    /**
     * @var DataTransitionService
     */
    private $dataTransitionService;

    /**
     * Constructor.
     *
     * @param DataTransitionService $dataTransitionService
     */
    public function __construct(DataTransitionService $dataTransitionService)
    {
        $this->dataTransitionService = $dataTransitionService;
    }

    /**
     * Handles denormalization process.
     *
     * @param PropertyAnalytics $data
     * @param string      $class
     * @param null        $format
     * @param array       $context
     *
     * @return PropertyAnalyticsView
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $propertyAnalyticsDTO = new PropertyAnalyticsView();
        $propertyAnalyticsDTO->setId($data->getId());
        $propertyAnalyticsDTO->setValue($data->getValue());

        return $this->serializer($propertyAnalyticsDTO);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $data instanceof PropertyAnalytics;
    }

    private function serializer(PropertyAnalyticsView $propertyAnalyticsView)
    {
        $encoders    = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->serialize($propertyAnalyticsView, 'json');

    }
}

<?php

namespace App\PropertyAnalyticBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Maps and converts string data based on PHP comma delimited imploding and exploding.
 */
class SimpleArrayTransformer implements DataTransformerInterface
{
    const DEFAULT_DELIMITER = ',';

    /**
     * Default delimiter for transformation.
     *
     * @var string
     */
    private $delimiter;

    /**
     * Constructor.
     *
     * @param array  $allowable Allowable list
     * @param string $delimiter Dynamic delimiter setup
     */
    public function __construct($delimiter = self::DEFAULT_DELIMITER)
    {
        $this->delimiter = $delimiter;
    }

    /**
     * Responsible for converting the response data (normally from an object) to a format that can be rendered in form
     *
     * @param array $values The response data.
     *
     * @return string The value can be rendered in form.
     */
    public function transform($values)
    {
        if (empty($values)) {
            return '';
        }

        return implode($this->delimiter, $values);
    }

    /**
     * Responsible for converting the submitted data into the format is used in code (normally into an object)
     *
     * @param string $string The submitted data.
     *
     * @return array The value is used in code.
     */
    public function reverseTransform($string)
    {
        if (!$string) {
            return [];
        }

        return array_filter(array_map('trim', explode($this->delimiter, $string)));
    }
}

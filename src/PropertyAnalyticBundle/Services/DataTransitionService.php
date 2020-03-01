<?php

namespace App\PropertyAnalyticBundle\Services;

use Elmo\PerformanceBundle\DTO\ViewData\PhaseView;
use Elmo\PerformanceBundle\Entity\Performance;
use Elmo\PmsBundle\Entity\Appraisal;
use Elmo\UserBundle\Entity\Department;
use Elmo\UserBundle\Entity\Location;
use Elmo\UserBundle\Entity\Position;
use Elmo\UserBundle\Entity\User;

/**
 * Maintains business logic to transit data for display purpose.
 */
class DataTransitionService
{
    /**
     * Generate Performance Title from its Appraisal placeholder.
     *
     * @param Performance $performance
     *
     * @return string
     */
    public function createPerformanceTitle(Performance $performance)
    {
        $managerFirstName = '';
        $managerLastName = '';
        $employeeFirstName = '';
        $employeeLastName = '';
        $employeePosition = 'N/A';
        $employeeLocation = 'N/A';
        $employeeDepartment = 'N/A';

        // Get employee placeholders value
        $employee = $performance->getEmployee();
        if ($employee instanceof User) {
            $employeeFirstName = $employee->getFirstName();
            $employeeLastName = $employee->getLastName();
            // Get performance employee position
            $position = $employee->getPosition();
            if ($position instanceof Position) {
                $employeePosition = $position->getTitle();
            }
            // Get performance employee location
            $location = $employee->getLocation();
            if ($location instanceof Location) {
                $employeeLocation = $location->getTitle();
            }
            // Get performance employee department
            $department = $employee->getDepartment();
            if ($department instanceof Department) {
                $employeeDepartment = $department->getTitle();
            }
        }

        // Get performance manager placeholders value
        $manager = $performance->getManager();
        if ($manager instanceof User) {
            $managerFirstName = $manager->getFirstName();
            $managerLastName = $manager->getLastName();
        }

        // Define the placeholders values
        $placeholders = [
            $performance->getAppraisal()->getTitle(),
            htmlentities($employeeFirstName),
            htmlentities($employeeLastName),
            htmlentities($managerFirstName),
            htmlentities($managerLastName),
            $performance->getPerformanceDefinedStartDate(),
            $performance->getPerformanceDefinedEndDate(),
            htmlentities($employeeDepartment),
            htmlentities($employeeLocation),
            htmlentities($employeePosition),
        ];

        // Compose the description
        return str_replace(
            array_keys(Appraisal::getAppraisalPlaceholders()),
            $placeholders,
            $performance->getAppraisal()->getReviewTitle()
        );
    }

    /**
     * Create phase text by its original value.
     *
     * @param int $phase
     *
     * @return string
     */
    public function createPhaseText($phase)
    {
        if (!in_array($phase, Performance::PHASES)) {
            throw new \InvalidArgumentException(sprintf('Phase %s is not available', $phase));
        }

        return PhaseView::TEXT_LIST[$phase];
    }
}

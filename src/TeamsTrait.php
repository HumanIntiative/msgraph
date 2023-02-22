<?php

namespace pkpudev\graph;

use Microsoft\Graph\Model\Team;
use Microsoft\Graph\Model\User;

trait TeamsTrait
{
    /**
     * Get Microsoft 365 Teams
     * Query $top and $search unsupported
     *
     * @param string $userId User ID
     * @return Team[] List of Teams
     */
    public function getTeams($userId)
    {
        $teams = $this->graph
            ->createRequest("GET", sprintf('/users/%s/joinedTeams', $userId))
            ->addHeaders(['ConsistencyLevel' => 'eventual'])
            ->setReturnType(Team::class)
            ->execute();
        return $teams;
    }

    /**
     * Get Microsoft 365 Teams
     * Query $top and $search unsupported
     *
     * @param string $userId User ID
     * @return Team[] List of Teams
     */
    public function getTeamMembers($teamId, $limit = 10)
    {
        $users = $this->graph
            ->createRequest("GET", sprintf('/groups/%s/members?$top=%s', $teamId, $limit))
            ->setReturnType(User::class)
            ->execute();
        return $users;
    }
}

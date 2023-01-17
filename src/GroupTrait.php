<?php

namespace pkpudev\graph;

use Microsoft\Graph\Model\Group;

trait GroupTrait
{
    /**
     * Get Microsoft 365 groups
     *
     * @param string $name Search term
     * @param int $limit Search Limit, Default to 10
     * @return Group[] List of groups
     */
    public function getGroups($name, $limit = 10)
    {
        $url = "/groups?\$top=%s&\$search=\"displayName:%s\"";
        $groups = $this->graph
            ->createRequest("GET", sprintf($url, $limit, $name))
            ->addHeaders(['ConsistencyLevel' => 'eventual'])
            ->setReturnType(Group::class)
            ->execute();
        return $groups;
    }
}

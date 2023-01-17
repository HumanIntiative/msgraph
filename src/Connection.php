<?php

namespace pkpudev\graph;

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\User;

/**
 * Connection from Ms Graph Api
 *
 * @author Zein Miftah <zmiftahdev@gmail.com>
 * @license MIT
 */
class Connection
{
    use MessagesTrait, DriveTrait, GroupTrait, TeamsTrait, PlannerTrait;

    /** @var Graph Graph object */
    protected $graph;

    /**
     * Class Constructor
     *
     * @param string $token Access Token
     * @return void
     */
    public function __construct($token)
    {
        $this->graph = new Graph;
        $this->graph->setAccessToken($token);
    }

    /**
     * Get Users with search params
     *
     * @param string $search Search Param
     * @param int $limit Search Limit, Default to 10
     * @return User[] List of Users
     */
    public function getUsers($search, $limit = 10)
    {
        $url = "/users?\$top=%s&\$filter=startswith(displayName,'%s')";
        $users = $this->graph
            ->createRequest("GET", sprintf($url, $limit, $search))
            ->setReturnType(User::class)
            ->execute();
        return $users;
    }
}

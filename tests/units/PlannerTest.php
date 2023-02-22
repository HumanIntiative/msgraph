<?php

use Microsoft\Graph\Model\Group;
use Microsoft\Graph\Model\PlannerPlan;
use Microsoft\Graph\Model\Team;
use Microsoft\Graph\Model\User;
use PHPUnit\Framework\TestCase;
use pkpudev\graph\Connection;
use tests\examples\TokenTrait;

final class PlannerTest extends TestCase
{
    /** @var Connection $connection */
    protected $connection;

    protected function setUp(): void
    {
        require_once './fn.php';
        load_env();

        $this->connection = new Connection($_ENV['WEB_TOKEN']);
    }

    public function testListPlans(): void
    {
        // $teams = $this->connection->getTeams($_ENV['USER_ZEIN_ID'], 'App');
        // $users = $this->connection->getTeamMembers('e9e2fed3-b44e-42e1-bb48-89ac620850d8');
        $plans = $this->connection->getPlans('e9e2fed3-b44e-42e1-bb48-89ac620850d8');

        var_dump($plans);

        // var_dump(array_map(function (Team $team) {
        //     return ['id' => $team->getId(), 'name' => $team->getDisplayName()];
        // }, $teams));
        
        // var_dump($teams);
    }
}

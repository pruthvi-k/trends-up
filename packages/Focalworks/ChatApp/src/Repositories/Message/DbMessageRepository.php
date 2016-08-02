<?php
namespace Focalworks\ChatApp\Http\Controllers;

use Focalworks\ChatApp\Http\Repositories\DbRepository;

class DBMessageRepository extends DbRepository implements MessageRepository
{

    /**
     * @var Message
     */
    private $model;

    public function __construct(Message $model)
    {
        $this->model = $model;
    }
}

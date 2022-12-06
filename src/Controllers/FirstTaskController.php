<?php

namespace App\Controllers;

use App\Renderable;
use App\Request;
use App\Tasks\FirstTask;
use App\View;

/**
 * Контроллер для первого задания
 */
class FirstTaskController extends Controller
{
    /**
     * @return View
     */
    public function index(Request $request): Renderable
    {
        $task      = new FirstTask();
        $customers = $task->getCustomers($request);

        return new View('tasks.first_task', ['customers' => $customers]);
    }
}

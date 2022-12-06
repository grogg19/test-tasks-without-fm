<?php

namespace App\Controllers;

use App\Renderable;
use App\View;

/**
 * Контроллер для третьего задания
 */
class ThirdTaskController extends Controller
{
    /**
     * @return View
     */
    public function index(): Renderable
    {
        return new View('tasks.third_task');
    }
}

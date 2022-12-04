<?php

namespace App\Controllers;

use App\Renderable;
use App\View;

/**
 * Контроллер для первого задания
 */
class CustomerController extends Controller
{
    /**
     * @return View
     */
    public function index(): Renderable
    {
        return new View('tasks.first_task');
    }
}

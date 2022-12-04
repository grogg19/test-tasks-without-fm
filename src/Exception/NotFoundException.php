<?php
/**
 * Класс NotFoundException
 */

namespace App\Exception;

use App\Renderable;
use App\View;
use Throwable;

/**
 * Class NotFoundException
 * @package App\Exception
 */
class NotFoundException extends HttpException implements Renderable
{
    /**
     * @var string
     */
    protected $message;

    /**
     * NotFoundException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = 'Страница не найдена', $code = 0, Throwable $previous = null)
    {
        $this->message = $message;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Метод выводит шаблон 404.php
     */
    public function render(): void
    {
        $data['message'] = $this->message;
        $data['title'] = 'Страница не найдена';


        (new View('404', $data))->render();
    }
}

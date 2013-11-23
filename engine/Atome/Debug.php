<?php
/*COMMENT*/
namespace Atome;

use \Atome\System;

/**
 * Class Debug - используется для отладки системы и отображения объектов типа Exception
 * @package Atome
 */
class Debug
{
    /**
     * Выводит информацию об ошибке
     * @param \Exception $exception
     */
    function __construct(\Exception $exception)
    {
        if (ob_get_contents() != false) {
            ob_end_clean();
        }
        echo System::getParsedTemplate(
            ATOME_ENGINE_DIR . DS . 'Templates' . DS . 'debug.tpl',
            array(
                '{message}' => $exception->getMessage(),
                '{line}' => $exception->getLine(),
                '{file}' => $exception->getFile(),
                '{code}' => $exception->getCode(),
                '{trace}' => $exception->getTraceAsString(),
            )
        );
        die;
    }

    /**
     * Выводит информацию по заданной ошибке
     * @param $message
     * @param $line
     * @param $file
     * @param $code
     * @param $trace
     */
    public static function show($message, $line, $file, $code, $trace)
    {
        if (ob_get_contents() != false) {
            ob_end_clean();
        }
        echo System::getParsedTemplate(
            ATOME_ENGINE_DIR . DS . 'Templates' . DS . 'debug.tpl',
            array(
                '{message}' => $message,
                '{line}' => $line,
                '{file}' => $file,
                '{code}' => $code,
                '{trace}' => $trace,
            )
        );
        die;
    }
} 
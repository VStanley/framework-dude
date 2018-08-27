<?php

namespace core\template;

use core\exception\ErrorHandler;

class Controller
{
    private $template;

    public function __construct()
    {
        $this->template = new Template();
    }

    /** передаем данные для генерации шаблона
     *
     * @param $uriView
     * @param array $params
     * @return bool
     */
    protected function view($uriView, array $params = array())
    {
        $params['_token'] = Token::generate();
        return $this->template->render($uriView, $params);
    }

    /** подключаем шаблон по имени
     *
     * @param $page
     * @return bool
     */
    public function systemPage($page)
    {
        return $this->template->render($page);
    }

    /** перенаправлние по адресу
     *
     * @param $uri
     */
    public function redirect($uri)
    {
        header('Location: ' . $_SERVER['HTTP_ORIGIN'] . $uri);
    }

}
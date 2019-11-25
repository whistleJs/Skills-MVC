<?php

namespace src\App;

class View
{
    private $content = "";

    public function __construct($page) {
        $this->content = file_get_contents(__VIEWS . __DS . $page . '.blade.php');

        $this->content = preg_replace_callback('/@include\(\"([^()]+)\"\)/', function($matches) {
            return self::loadTemplate($matches[1]);
        }, $this->content);
    }

    public function render($datas)
    {
        extract($datas);

        $__content = preg_replace('/\{\{([^{}]+)\}\}/', '<?= $1 ?>', $this->content);
        $__content = preg_replace('/@((if|foreach|for|while|elseif)\(.+\))/', '<?php $1: ?>', $__content);
        $__content = preg_replace('/@((php))/', '<?php', $__content);
        $__content = preg_replace('/@((endphp))/', '?>', $__content);
        $__content = preg_replace('/@((else))/', '<?php $1: ?>', $__content);
        $__content = preg_replace('/@(end(if|foreach|for|while))/', '<?php $1 ?>', $__content);

        $__tmp = __VIEWS . __DS . uniqid();

        file_put_contents($__tmp, $__content);

        require $__tmp;
        unlink($__tmp);
    }

    public function getView()
    {
        return $this->content;
    }

    private static function loadTemplate($page)
    {
        $view = new View($page);
        return $view->getView();
    }
}
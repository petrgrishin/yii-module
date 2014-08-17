<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\Module;


use CWebModule;

class BaseModule extends CWebModule {
    const CONTROLLER_DIR_NAME = 'Controller';

    public static function className() {
        return get_called_class();
    }

    protected function init() {
        if (!$this->controllerNamespace && $path = array_slice(explode('\\', get_class($this)), 0, -1)) {
            $this->controllerNamespace = implode('\\', array_merge($path, array(self::CONTROLLER_DIR_NAME)));
        }
        $this->setControllerPath($this->getBasePath() . DIRECTORY_SEPARATOR . self::CONTROLLER_DIR_NAME);
        parent::init();
    }
}

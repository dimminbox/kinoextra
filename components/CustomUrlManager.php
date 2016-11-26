<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of CustomUrlManager
 *
 * @author dimm
 */
class CustomUrlManager extends \yii\web\UrlManager {

    public $enablePrettyUrl = true;
    public $showScriptName = false;

    public function init() {
        parent::init();
    }

    public function createUrl($params) {

        if ($params[0] == 'film/index') {
            
            if (isset($params['url']))
                $url = $params['url'];
            else
                $url = '';
            if (isset($params['page']))
                return $url."/page/".$params['page'];
            else
                return '/';
        }
        
        return parent::createUrl($params);
    }

}

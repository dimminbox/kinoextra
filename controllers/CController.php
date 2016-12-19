<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Language;
use app\models\Setting;
use Yii;

/**
 * Site controller
 */
class CController extends Controller {

    public static $h1;
    public static $description;
    public static $metaTitle;
    public static $metaDescription;
    public static $style='';
    
    public function beforeAction($action) {

        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->setLanguageID();
        $this->getAllParams();
        return true;
    }

    private function getAllParams() {
        $params = Setting::find()->all();
        foreach ($params as $param) {

            Yii::$app->params[$param->code] = $param->value;
        }
    }

    private function setLanguageID() {

        $lang = Language::find()->where(['code' => Yii::$app->language])->one();
        if ($lang) {
            Yii::$app->params['langID'] = $lang->id;
        } else
            die('Not exists language ' . Yii::$app->language . ' in DB!');
    }

    public function setSEO($values) {

        $seo = '';
        $postfix = (isset(\Yii::$app->params['SEOPostfix'])) ? strip_tags(\Yii::$app->params['SEOPostfix']) : '';
        if (strpos(Yii::$app->controller->route, 'content') !== false ||
                strpos(Yii::$app->controller->route, 'order') !== false ||
                strpos(Yii::$app->controller->route, 'contact') !== false ||
                strpos(Yii::$app->controller->route, 'advice/index') !== false
        ) {

            $postfix = '';
        }

        foreach ($values as $value) {
            $value['content'] = strip_tags($value['content']);

            if ($value['type'] == 'title') {
                $seo .= "\t<title>{$this->plainText($value['content'])} {$this->plainText($postfix)}</title>\n";
            } elseif ($value['type'] == 'meta') {
                $seo .= "\t<meta {$value['property']}='{$value['propertyValue']}' content='{$value['content']}'>\n";
            }
        }

        $GLOBALS['seo'] = $seo;
    }

    public static function NOW() {
        return date("Y-m-d H:i:s");
    }

    public function notFound() {
        Yii::$app->response->setStatusCode(404);
        return $this->render('@app/views/site/notFound');
    }

}

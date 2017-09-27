<?php
namespace app\components\widgets;
use yii\bootstrap\Widget;
use kartik\widgets\Alert;
class Alerts extends Widget
{
    public $alertTypes = [
        'error'   => Alert::TYPE_DANGER,
        'danger'  => Alert::TYPE_DANGER,
        'success' => Alert::TYPE_SUCCESS,
        'info'    => Alert::TYPE_INFO,
        'warning' => Alert::TYPE_WARNING
    ];

    public $closeButton = [];

    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $data) {
                $data = (array) $data;
                foreach ($data as $message) {
                    /* initialize css class for each alert box */
                    //$this->options['class'] = $this->alertTypes[$type] . $appendCss;

                    /* assign unique id to each alert box */
                    $this->options['id'] = $this->getId();

                    echo \kartik\widgets\Alert::widget([
                        'type' => $this->alertTypes[$type],
                        'icon' => 'glyphicon glyphicon-exclamation-sign',
                        'body' =>  $message,
                        'showSeparator' => true,
                        'delay' => 3000
                    ]);

                $session->removeFlash($type);
            }
        }
    }
}

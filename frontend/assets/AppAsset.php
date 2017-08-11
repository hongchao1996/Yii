<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        // 'mycss/common.css',
        // 'mycss/templateform.css',
        // 'mycss/controls.css',
        // 'mycss/default.css',
        // 'mycss/school-select-v2.css',
        // 'mycss/frontmodule.css',
        // 'mycss/main.css',
        // 'mycss/front.css',
        // 'mycss/5_themes_default_style.css?v=0.0.0.9',
        // 'mycss/5_themes_default_flexslider.css?v=0.0.0.9',
        // 'mycss/5_themes_default_jqueryuicore.css?v=0.0.0.9',
        // 'mycss/5_themes_default_jqueryuiselectmenu.css?v=0.0.0.9',
        // 'mycss/5_themes_default_jqueryuitheme.css?v=0.0.0.9',
    ];
    public $js = [
        // 'js/require.js',
        // 'js/base_new.js',
        // 'js/widgetnew.js?v=3',
        // 'js/common.js',
        // 'js/bsdialog.js',
        // 'js/common.js',
        // 'js/controls.js',
        // 'js/underscore.js',
        // 'js/school-select-v2.js?v=6',
        // 'js/dialog_js.js',
        // 'js/WdatePicker.js',
        // 'js/jquery.validate.unobtrusive',
        // 'js/jquery.form.min.js',
        
        // 'js/5_themes_default_jquery191.js?v=0.0.0.9',
        // 'js/5_themes_default_jqueryflexslidermin.js?v=0.0.0.9',
        // 'js/5_themes_default_jqueryuicore1.js?v=0.0.0.9',
        // 'js/5_themes_default_jqueryuiposition.js?v=0.0.0.9',
        // 'js/5_themes_default_jqueryuiwidget.js?v=0.0.0.9',
        // 'js/5_themes_default_jqueryuiselectmenu1.js?v=0.0.0.9',
        // 'js/5_themes_default_demo.js?v=0.0.0.9',
        
    ];
    public $depends = [
         'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    

}
    
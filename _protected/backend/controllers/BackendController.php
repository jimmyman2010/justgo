<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * BackendController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC) for 
 * your controllers and their actions.
 */
class BackendController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'controllers' => ['page', 'news', 'slider', 'widget', 'banner', 'content-element', 'category', 'gallery', 'product', 'tag'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'checkingduplicated', 'show-in-menu', 'active', 'switch', 'sorting'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'controllers' => ['config'],
                        'actions' => ['splash-screen', 'featured'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'show-in-menu' => ['post'],
                    'active' => ['post'],
                    'switch' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // BackendController
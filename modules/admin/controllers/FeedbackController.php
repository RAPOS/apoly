<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\LContacts;
use app\models\LFeedback;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FeedbackController implements the CRUD specials for LFeedback model.
 */
class FeedbackController extends Controller
{
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all LFeedback models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);
		
        $dataProvider = new ActiveDataProvider([
            'query' => LFeedback::find(),
			'sort' => [
				'defaultOrder' => ['id' => SORT_DESC],
			],
        ]);

		$request_feedback = null;
		if (Yii::$app->getSession()->has('request_feedback')) {
			if(Yii::$app->getSession()->getFlash('request_feedback')) {
				$request_feedback = true;
			}
		}

		$delete = null;
		if (Yii::$app->getSession()->has('delete')) {
			if(Yii::$app->getSession()->getFlash('delete')){
				$delete = true;
			}
		}
		
        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'request_feedback' => $request_feedback,
			'delete' => $delete,
        ]);
    }

    /**
     * Displays a single LFeedback model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);
		
		$model = $this->findModel($id);
		if(Yii::$app->request->post()){
			$model->verifyCode = rand(1, 100);
			$model->response = $_POST['LFeedback']['response'];	
			if ($model->save()) {
				/*Yii::$app->mail->compose()
					->setTo($model->email)
					->setFrom(['baron-nt@yandex.ru' => "Мужской спа-салон «Барон»"])
					->setSubject($model->subject)
					->setHtmlBody('Вам отправлен ответ с сайта:	http://'.$_SERVER['SERVER_NAME'].' <br>'.$model->response)
					->send();*/
				Yii::$app->getSession()->setFlash('request_feedback', 'true');
				
				return $this->redirect('/admin/feedback/');
			}
        }

		return $this->render('view', [
			'model' => $model,
		]);
    }
	
    /**
     * Deletes an existing LFeedback model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);
		
		if( $this->findModel($id)->delete()){
			Yii::$app->getSession()->setFlash('delete', 'true');
		}

        return $this->redirect('/admin/feedback/');
    }

    /**
     * Finds the BFeedback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LFeedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LFeedback::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	public function actionDescription(){
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		$model = LContacts::find()->where(['site' => 1])->one();
		
		if(!$model){
			$model = new LContacts();
			$model->site = 1;
		}

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('save', 'true');
			return $this->redirect(['description']);
		}

		$save = null;
		if (Yii::$app->getSession()->has('save')) {
			if(Yii::$app->getSession()->getFlash('save')) {
				$save = true;
			}
		}

		return $this->render('description', [
			'model' => $model,
			'save' => $save
		]);
	}
}
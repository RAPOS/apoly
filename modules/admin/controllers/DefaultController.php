<?php

namespace app\modules\admin\controllers;

use app\models\LAbout;
use app\models\LActions;
use app\models\LArticles;
use app\models\LBanners;
use app\models\LProductionspage;
use app\models\LSettings;
use Yii;
use yii\web\Controller;
use app\models\LGallery;
use app\models\LAdmins;
use app\models\LImages;
use app\models\LMainpage;

class DefaultController extends Controller
{
	
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);
		
        return $this->render('index');
    }
	
	public function actionLogin()
	{
		$model = new LAdmins();
		if (Yii::$app->request->post()) {
			$model->attributes = Yii::$app->request->post('LAdmins');
			if ($model->validate()) {
				$LAdmins = LAdmins::find()->where(["name" => $model->name])->one();
				if ($LAdmins) {
					if($LAdmins->password === md5(md5($model->password))){
						if($LAdmins->login()) $this->redirect(Yii::$app->user->returnUrl);
					} else {
						Yii::$app->getSession()->setFlash('error_login', 'Не верный пароль.');
						return $this->redirect(['login']);
					}
				} else {
					Yii::$app->getSession()->setFlash('error_login', 'Не верный логин.');
					return $this->redirect(['login']);
				}
			}
		}

		$error_login = null;
		if (Yii::$app->getSession()->has('error_login')) {
			$error_login = Yii::$app->getSession()->getFlash('error_login');
		}

		return $this->render('login', [
			'model' => $model,
			'error_login' => $error_login,
		]);
	}
	
    public function actionLogout()
    {
        Yii::$app->user->logout();
		return $this->goHome();
    }
	
	public function actionMainpage()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		$model = LMainpage::find()->where(['site' => 1])->one();
		if(!$model){
			$model = new LMainpage();
			$model->site = 1;
		}
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('save', true);
			return $this->redirect(['mainpage']);
		}

		$save = null;
		if (Yii::$app->getSession()->has('save')) {
			if (Yii::$app->getSession()->getFlash('save')) {
				$save = true;
			} else {
				$save = false;
			}
		}

		return $this->render('mainpage', [
			'model' => $model,
			'save' => $save,
		]);
	}

	public function actionAbout()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		$model = LAbout::find()->where(['site' => 1])->one();
		if(!$model){
			$model = new LAbout();
			$model->site = 1;
		}
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('save', true);
			return $this->redirect(['about']);
		}

		$save = null;
		if (Yii::$app->getSession()->has('save')) {
			if (Yii::$app->getSession()->getFlash('save')) {
				$save = true;
			} else {
				$save = false;
			}
		}

		return $this->render('about', [
			'model' => $model,
			'save' => $save,
		]);
	}	
	
	public function actionGallery()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		if (Yii::$app->request->post()) {
			for ($i = 0; $i < count($_POST['id_images']); $i++) {
				$model = new LGallery();
				$model->id_image = $_POST['id_images'][$i];
				if ($model->save()) {
					$LImages = LImages::findOne(['id_image' => $model->id_image]);
					$LImages->status = 1;
					$LImages->save();
				}
			}

			Yii::$app->getSession()->setFlash('save', true);
			return $this->redirect(['gallery']);
		}

		$save = null;
		if (Yii::$app->getSession()->has('save')) {
			if (Yii::$app->getSession()->getFlash('save')) {
				$save = true;
			} else {
				$save = false;
			}
		}

		return $this->render('gallery', [
			'model' => LGallery::find()->all(),
			'save' => $save,
		]);
	}
	
	public function actionSettings()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		$model = LSettings::find()->where(['site' => 1])->one();
		if(!$model){
			$model = new LSettings();
			$model->site = 1;
		}
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('save', true);
			return $this->redirect(['settings']);
		}

		$save = null;
		if (Yii::$app->getSession()->has('save')) {
			if (Yii::$app->getSession()->getFlash('save')) {
				$save = true;
			} else {
				$save = false;
			}
		}

		return $this->render('settings', [
			'model' => $model,
			'save' => $save,
		]);
	}
	
	public function actionUserchange()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);
		
		$model = LAdmins::findOne(Yii::$app->user->id);
		if (!$model) {
			$model = new LAdmins;
		}
		
		if ($model->load(Yii::$app->request->post())) {
			if ($model->validate()) {
				$model->password = md5(md5($model->password));
				$model->save();

				Yii::$app->getSession()->setFlash('save', true);
				return $this->redirect(['userchange']);
			}
		}

		$save = null;
		if (Yii::$app->getSession()->has('save')) {
			if (Yii::$app->getSession()->getFlash('save')) {
				$save = true;
			} else {
				$save = false;
			}
		}
		
		return $this->render('userchange', [
			'model' => $model,
			'save' => $save,
		]);
	}
	
	public function actionUpload()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		if ($_FILES)  {
			$referrer = explode('/', $_SERVER['HTTP_REFERER']);

			for ($i=0;$i<count($_FILES);$i++) {
				if(!in_array(exif_imagetype($_FILES['image']['tmp_name'][$i]), array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG))){
					return false;
				}
				$path_info = pathinfo($_FILES['image']['name'][$i]);
				$name = md5($path_info['filename'].md5(rand(1,1000000)));
				$dir = 'files/images';

				$LImages = new LImages();
				$LImages->name = $name;
				$LImages->extension = $path_info['extension'];
				if ($LImages->save()) {
					$LImages->path = $dir.'/'.$LImages->id_image.'/'.$name.'.'.$path_info['extension'];
					$LImages->save();
					
					$path = $dir.'/'.$LImages->id_image;
					if (!file_exists(Yii::getAlias('@webroot').'/'.$path)){
						mkdir(Yii::getAlias('@webroot').'/'.$path, 0777, true);
					} else {
						self::delTree(Yii::getAlias('@webroot').'/'.$path);
						mkdir(Yii::getAlias('@webroot').'/'.$path, 0777, true);
					}
					if (!file_exists(Yii::getAlias('@webroot').'/files/uploads/')) {
						mkdir(Yii::getAlias('@webroot').'/files/uploads/');
					}
					if (move_uploaded_file($_FILES['image']['tmp_name'][$i], Yii::getAlias('@webroot').'/files/uploads/'.$name.'.'.$path_info['extension'])) {
						$image = Yii::$app->image->load(Yii::getAlias('@webroot/files/uploads/'.$name.'.'.$path_info['extension']));
						if (!in_array('banners', $referrer)) {
							$image->resize(800, NULL, \yii\image\drivers\Image::AUTO);
						}
						//$mark = Yii::$app->image->load(Yii::getAlias('@webroot/images/label.png'));
						//$image->watermark($mark, TRUE, TRUE);
						$image->save(Yii::getAlias('@webroot/'.$LImages->path));
						
						unlink(Yii::getAlias('@webroot').'/files/uploads/'.$name.'.'.$path_info['extension']);
						print json_encode(array('id_image' => $LImages->id_image, 'name' => $_FILES['image']['name']));
					}
				} else {
					dd($LImages->getErrors());
				}
			}
		}
		
		return false;
	}
	
	public function actionDeleteimages()
	{
		if (Yii::$app->user->isGuest)  $this->redirect(Yii::$app->user->loginUrl);

		if ($_POST) {
			$model = null;
			$save = false;

			if ($_POST['page'] == 'gallery') {
				$model = LGallery::findOne(['id_image' => $_POST['delete_id_img']]);
				if ($model->delete()) {
					$save = true;
				}
			} else if ($_POST['page'] == 'articles') {
				$model = LArticles::findOne(['id_image' => $_POST['delete_id_img']]);
				$model->id_image = 0;
				if ($model->save()) {
					$save = true;
				}
			} else if ($_POST['page'] == 'specials') {
				$model = LActions::findOne(['id_image' => $_POST['delete_id_img']]);
				$model->id_image = 0;
				if ($model->save()) {
					$save = true;
				}
			} else if ($_POST['page'] == 'banners') {
				$model = LBanners::findOne(['id_image' => $_POST['delete_id_img']]);
				$model->id_image = 0;
				if ($model->save()) {
					$save = true;
				}
			} else if ($_POST['page'] == 'productions_page') {
				$new_array_images = array();
				for($i=0;$i<count($_POST['id_images']);$i++){
					if($_POST['delete_id_img'] != $_POST['id_images'][$i]){
						$new_array_images[] = $_POST['id_images'][$i];
					}
				}

				$model = LProductionspage::find()->where(['site' => 1])->one();
				$model->images = json_encode($new_array_images);
				if ($model->save()) {
					$save = true;
				}
			}
			
			if ($save) {
				$LImages = LImages::findOne($_POST['delete_id_img']);
				if ($LImages->delete()) {
					if (!unlink(Yii::getAlias('@webroot/'.$_POST['delete_path']))) {
						return 'Не удалось удалить изображение локально';
					} else {
						return true;
					}
				} else {
					return 'Не удалось удалить изображение из базы';
				}
			} else {
				return 'Не удалось перезаписать изображения';
			}
		} else {
			return 'Не пришли данные для удаления';
		}
	}

	public function delTree($dir)
	{
		if ($objs = glob($dir."/*"))
		{
			foreach($objs as $obj)
			{
				is_dir($obj) ? $this->delTree($obj) : unlink($obj);
			}
		}
		rmdir($dir);
	}
}

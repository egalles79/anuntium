<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {

	    parent::beforeFilter();
	    $user = $this->Auth->user();
		if ($user['group_id'] === 2) {
            $this->layout = 'user';
            //$this->redirect('/Clients/index');            
        } else if ($user['group_id'] === 3) {
            $this->layout = 'partner';
            //$this->redirect('/Clients/index');
        } else {
        	$this->layout = 'logged';
        }
		header('Access-Control-Allow-Origin: *');
		//header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE'); 
  		header('Access-Control-Allow-Headers', 'Content-Type');

		$arrayPermissions = array();
		if (isset($this->request->params['ext'])) {
			if ($this->request->params['ext'] === 'json') {
				$arrayPermissions = array('add','view','getToken','register','delete','getUser','updateUserParams','uploadImages');
			}
		}
		
		$arrayPermissions[] = 'createExcel';
		$arrayPermissions[] = 'login';
		$arrayPermissions[] = 'logout';
		$arrayPermissions[] = 'recoveryPassword';
		$arrayPermissions[] = 'forgotPassword';
		$arrayPermissions[] = 'initdb';
		$arrayPermissions[] = 'logout';
		$arrayPermissions[] = 'facebookLogin';		
		$arrayPermissions[] = 'authenticationToken';
		$arrayPermissions[] = 'api_login';
		$arrayPermissions[] = 'add';

		
		$this->Auth->allow($arrayPermissions);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {		
		$this->User->recursive = -1;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

public function view($id = null) {
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	$users['User'] = $this->User->find('first', $options);
	$this->set('users', $users);
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function viewuser($id = null) {
	if (!$this->User->exists($id)) {
		throw new NotFoundException(__('Invalid user'));
	}
	$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	$users['User'] = $this->User->find('first', $options);
	$this->set('users', $users);
}

public function reestablished() {
	$this->layout = 'default';
}

public function createExcel() {
	// create new empty worksheet and set default font
	/*$this->PhpExcel->createWorksheet()
	    ->setDefaultFont('Calibri', 12);

	// define table cells
	$table = array(
	    array('label' => __('Usuario'), 'filter' => true),
	    array('label' => __('Email'), 'filter' => true),
	    array('label' => __('Fecha de alta')),
	    array('label' => __('Género')),
	    array('label' => __('Estado'), 'width' => 50, 'wrap' => true),
	);

	// add heading with different font and bold text
	$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));
	$this->User->recursive = -1;
	$data = $this->User->find('all');
	$data = Hash::extract($data,'{n}.User');
	// add data
	foreach ($data as $d) {
		$genero = ($d['gender_id'] == 1) ? 'Hombre' : 'Mujer';
		
		$this->Time    = new CakeTime();
		$fecha_created = $this->Time->format('d/m/Y',$d['created']);
		$status = ($d['is_enabled'] == 1) ? 'Activo' : 'Eliminado/Desactivado';

	    $this->PhpExcel->addTableRow(array(
	        $d['name'],
	        $d['email'],
	        $fecha_created,
	        $genero,
	        $status,
	    ));
	}

	// close table and output
	$this->PhpExcel->addTableFooter()
	    ->output();*/
	
	$this->User->recursive = -1;
	$fields = array('name','email','created','gender_id', 'is_enabled');
	$data = $this->User->find('all',array('fields' => $fields));
	$data_array = Hash::extract($data,'{n}.User');
	$arrayCute = array();
	$counter = 0;
	foreach($data_array as $dataInside) {
		$arrayCute[$counter] = $dataInside;
		$arrayCute[$counter]['gender_id'] = ($dataInside['gender_id'] == 1) ? 'Hombre' : 'Mujer';
		$arrayCute[$counter]['is_enabled'] = ($dataInside['is_enabled'] == 1) ? 'Activo' : 'Eliminado / Desactivado';
		$counter++;
	}
	$csv = "Nombre,Correo Electrónico,Fecha de Alta, Género, Estado \n";//Column headers
	foreach ($arrayCute as $record){
	    $csv.= $record['name'].','.$record['email'].','.$record['created'].','.$record['gender_id'].','.$record['is_enabled'].','."\n"; //Append data to csv
	}
	//$csv_handler   = new File('img/tmp_xls/csvfile.csv');
	//$csv_handler = fopen ('../../img/tmp_xls/csvfile.csv','w');
	$f = fopen( '/var/www/html/Hiit4All'.DS.'app'.DS.'webroot'.DS.'img/tmp_xml/export.csv', 'w');
	fwrite ($f,$csv);
	fclose ($f);
	$this->redirect('https://sheet.zoho.com/sheet/view.do?url=http://media.hiit4all.com/tmp_xml/export.csv&name=newName');	
}

public function recoveryPassword($token = null) {
	$this->layout  = 'default';
	$needsRedirect = false;
	$message       = '';
	if (empty($token)) {
		if ($this->request->is('post')) {
			$newPassword      = $this->request->data['User']['password'];
			$checkNewPassword = $this->request->data['User']['check_password'];
			$userId = $this->request->data['User']['id'];
			$this->User->recursive = -1;
			$user = $this->User->findById($this->request->data['User']['id']);
			
			$hasNotError = false;
			if (!empty($user)) {
				if ($newPassword == $checkNewPassword) {
					if (!$this->_sendNewPassword($user,$newPassword)) {
						$message = __('No se pudo enviar la nueva contraseña. Error al guardar los datos');
					} else {
						$hasNotError = true;
						$message = __('El usuario ha reestablecido su contraseña. Pulse en log in para acceder a su área de control');
					}
				} else {
					$message = __('La contraseña no coincide');
				}
			} else {
				$message = __('Usuario no definido en la base de datos');
			}
		} else {
			$message = __('Method not allowed');
		}
		$needsRedirect = true;
	} else {
		$this->User->recursive = -1;
		$userToken = $this->User->findByToken($token);
		if (empty($userToken)) {
			$message = 'token_user_not_valid';
			$needsRedirect = true;
		} 
		$this->set(compact('userToken'));
	}
	if(!empty($message)) {
		if ($hasNotError) {
			$this->Flash->success($message);
		} else {
			$this->Flash->error($message);
		}	
	}
	if ($needsRedirect) {
		$this->redirect(array('controller' =>'Users','action' => 'reestablished'));
	}
}

/**
 * initDB method > set permissions to the app
 *
 * 
  * @return void
 */
	public function initdb() {
		 $group = $this->User->Group;

			 // Allow admins to everything
	    $arrayPermissions[1] = array(
	    	'controllers'
		);
		/*$arrayPermissions[2] = array(
			'controllers',
			//'/Users/view',
		);*/
	    $group->id = 1;
	    foreach($arrayPermissions[$group->id] as $permissions) {
	    	$this->Acl->allow($group,$permissions);
	    }
	    
	    /*$group->id = 2;	    
	    foreach($arrayPermissions[$group->id] as $permissions) {
	    	$this->Acl->allow($group,$permissions);
	    }*/


	    // allow basic users to log out
	    $this->Acl->allow($group, 'controllers/Users/logout');
	    $this->Acl->allow($group, 'controllers/Pages');

	    $this->Acl->allow($group, 'controllers/users/login');
		
	    // we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
	}

public function uploadImages() {
	$status 	   = 'KO';
	$data          = '';
	$errors        = '';

	$token  	   = null;
	$headerParams  = array('token');	
	
	list($token)   = $this->getParamsFromHeader($headerParams);
	$requestedData = array();

	if (empty($_FILES['image'])) {
		$errors = 'image_not_valid';
	}
	
	if (empty($token)) {
		$errors = 'token_expired_or_not_valid';
	} else {
		$content = $this->isAuthorized($token);
	}
	if (empty($content)) {
		$errors = 'token_expired_or_not_valid';
	}
	
	if (empty($errors)) {		
		$userId = $content['User']['id'];
		$filesToAdd = $_FILES['image']['tmp_name'];
		$newFolder  = WWW_ROOT.'img'.DS.'users'.DS.$userId.DS.'img';
		$name       = explode('.',$_FILES['image']['name']);
		$extension  = $name[1];
		$returnImage = $this->_saveUserImage($filesToAdd, $newFolder,$extension);
		if ($returnImage != false) {
			$this->loadModel('ImagesUser');
			$this->ImagesUser->create();
			$userImageData = array();
			$userImageData['ImagesUser']['date']    = date('Y-m-d H:i:s');
			$userImageData['ImagesUser']['image']   = $returnImage;
			$userImageData['ImagesUser']['user_id'] = $userId;
			if ($this->ImagesUser->save($userImageData)) {
				$status = 'OK';
				$this->ImagesUser->recursive = -1;
				for($i =1 ;$i<=2;$i++) {
					$direction  = ($i == 1) ? 'ASC' : 'DESC';
					$imagesUser = $this->ImagesUser->find('first',array('order' => array('ImagesUser.date' => $direction),'conditions' => array('ImagesUser.user_id' => $userId)));
					$imagesUser = Hash::extract($imagesUser,'ImagesUser');
					$imagesFinal[] = $imagesUser;
				}
				
				$finalImages = array();
				$counter = 0;
				foreach($imagesFinal as $image) {
					$paramsToDelete = array('id','created','modified','user_id');
					$counterTxt = ($counter == 0) ? 'before' : 'after';
					$finalImages[$counterTxt]  = $this->cleanParamsFromArray($image,$paramsToDelete);
					$counter++;
				}
				$data   = (object) $finalImages;
			}			
		}
	} 

	$errors = empty($errors) ? false : $errors;
	
	$this->set('data',$data);
	$this->set('error',$errors);
	$this->set('status',$status);
	$this->set('_serialize', array('status','data','error'));

}
/**
 * updateUserParams method => if a token has been sended and validated we set the params that we are sending
 *
 * @param string $token
 * @param int $gender
 * @param int $level
 * @param int $height
 * @param int $weight
  * @return array() status , error
 */
public function updateUserParams() {
	$errors 	   = '';

	$status 	   = 'KO';
	$token  	   = null;
	$hasPassword   = false;
	$hasName       = false;
	$hasFiles 	   = false;
	$headerParams  = array('token');
	$postParams    = array('name','password','locale');
	$data 		   = array();

	list($token)   = $this->getParamsFromHeader($headerParams);

	$requestedData = array();
	
    $content = '';
	list($name,$password,$locale) = $this->getParamsFromPost($postParams);
	
	$hasIdiom = false;
	if (!empty($locale)) {
		$hasIdiom = true;
	}
	if (empty($token)) {
		$errors = 'token_expired_or_not_valid';
	} else {
		$content = $this->isAuthorized($token);
	}
	
	
	if (!empty($name)) {
		$hasName = true;
	}
	if (!empty($password)) {
		$hasPassword = true;
	}
	if (!empty($_FILES['picture'])) {
		$hasFiles  = true;
	}
	if (empty($content)) {
		if (empty($errors)) {
			$errors = 'token_expired_or_not_valid';
		}
	}	
	if ($hasPremium) {
		$validPremiums = array('N','P','C','A','W');
		if (!in_array($is_premium,$validPremiums)) {
			$errors = 'has_premium_not_valid';
		}
	}
	if ($hasIdiom) {
		$validIdioms = Configure::read('Config.languages');
		if (!in_array($locale,$validIdioms)) {
			$errors = 'idiom_not_valid';
		}
	}
	$userSaveData = array();
	if (empty($errors)) {		
		$this->loadModel('Authentication');
		$this->Authentication->recursive = -1;
		$user = $this->Authentication->findByToken($token);
		$this->User->recursive = -1;
		
		$userSaveData = $this->User->findById($user['Authentication']['user_id']);

		if ($hasFiles) {
			$filesToAdd = $_FILES['picture']['tmp_name'];
			$name       = explode('.',$_FILES['picture']['name']);
			$extension  = $name[1];
			
			$newFolder = WWW_ROOT.'img'.DS.'users'.DS.$userSaveData['User']['id'];
			$returnAvatar = $this->_saveAvatar($filesToAdd, $newFolder, $extension);
			if ($returnAvatar != false) {				
				$userSaveData['User']['avatar'] = $returnAvatar;
			}
		}		
		if ($hasIdiom) {
			$userSaveData['User']['locale']  = $locale;	
		}
		if ($hasName) {
			$userSaveData['User']['name'] = $name;
		}
		if ($hasPassword) {
			$userSaveData['User']['password'] = $password;
		} else {
			$userSaveData['User']['notpwd'] = 1;
		}

		if ($this->User->save($userSaveData, false)) {
			$paramsToDelete  				  = array('modified','password','group_id','token','notpwd');
			$userSaveData['User'] 			  = $this->cleanParamsFromArray($userSaveData['User'],$paramsToDelete);
			$data   						  = $userSaveData;
			$status 						  = 'OK';
		} else {
			$errors = 'error_in_database';
		}		
	}
	$errors = empty($errors) ? false : $errors;

	$this->set('error',$errors);
	$this->set('data',$userSaveData);
	$this->set('status',$status);
	$this->set('_serialize', array('status','data','error'));
}

	private function _saveAvatar($file, $finalFolder = null, $extension = 'jpg') {
		$file   = new File($file);		
		$folder = new Folder($finalFolder, true, 0777);
		if ($file->exists()) {
			$nameChar = '';
			$name = substr(md5($file->name),0,7);
			for($i = 0;$i <= 6;$i++) {
				$num = rand(0,1);
				$nameChar .= ($num == 0) ? strtoupper($name[$i]) : $name[$i];
			}			
			$nameFile   = $nameChar.'.'.$extension;			
			$folderPath = $folder->path.DS.$nameFile;
			$folderToDelete = new Folder($folder->path);

			if ($this->_deleteOldFiles($folderToDelete)) {
				if(!$file->copy($folderPath, true)) {
					return false;
				}	
			}
			return $nameFile;
		}
	}

	private function _saveUserImage($file, $finalFolder = null,$extension = 'jpg') {
		$file   = new File($file);		
		$folder = new Folder($finalFolder, true, 0777);
		if ($file->exists()) {
			$nameChar = '';
			$name = substr(md5($file->name),0,7);
			for($i = 0;$i <= 6;$i++) {
				$num = rand(0,1);
				$nameChar .= ($num == 0) ? strtoupper($name[$i]) : $name[$i];
			}
			$nameFile   = $nameChar.'.'.$extension;			
			$folderPath = $folder->path.DS.$nameFile;
			if(!$file->copy($folderPath, true)) {
				return false;
			}
			return $nameFile;
		}
	}

	private function _deleteOldFiles($folder) {
		if (!empty($folder->read()[1])) {
			$files = $folder->read()[1];
			foreach($files as $file) {
				unlink($folder->path.DS.$file);
			}
		}
		return true;
	}


/**
 * forgotPassword method => Due to a token send an email to the user if exists in our db
 *
 * @return void
 */
	public function forgotPassword() {
		$this->layout = 'default';
		$status = 'KO';
		$error = '';
		if ($this->request->is('post')) {
			if (isset($this->request->params['ext'])) {
				if ($this->request->params['ext'] === 'json') {

					list($email) = $this->getParamsFromPost(array('email'));
					
					$this->User->recursive = -1;
					$user = $this->User->findByEmail($email);
					if (!empty($user)) {
						$status = ($this->_sendTokenUserToEmail($user)) ? 'OK' : 'KO';
						if ($status == 'KO') {
							$error = 'email_not_sent';
						}
					} else {
						$error = 'user_empty';
					}
				} else {
					$this->Flash->error(__('user_not_defined_in_database'));
				}
			} else {
				$email = isset($this->request->data['User']['email']) ? $this->request->data['User']['email'] : '';
			}
		} else {
			$error = __('method_not_allowed');
		}
		$this->set('status',$status);
		$this->set('error',$error);
		$this->set('_serialize', array('status','error'));
	}


private function _getInternalUser($token) {
	$content = $this->isAuthorized($token);
	//debug($content).die;
	if (!empty($content)) {
		$this->User->recursive = 1;
		$userQuery = $this->User->findByid($content['User']['id']);
		$user 				   = $userQuery['User'];
		$paramsToClean   = array('modified','description','icon','Training','Exercise','token','group_id','password');
		$data['User']    = $this->cleanParamsFromArray($content['User'],$paramsToClean);
		$paramsToClean[] = 'user_id';
		$paramsToClean[] = 'created';
		$counter = 0;

		//$data = $this->cleanParamsFromArray($data,$paramsToClean);
		//$tokenNotExpired = true;
	} else {
		$data = 'KO';
	}
	$data['User']['locale'] = $this->Session->read('Config.language');
	return $data;
}

/* getUser method > return the user filtered by a token
*
* @return array [tokenValue, status]
*/
public function getUser($token = null) {
	$token  = (!empty($token)) ? $token : null;
	if (empty($token)) {
		$token  = (isset($this->request->query['token'])) ? $this->request->query['token'] : '';
		if (empty($token)) {
			$token = $this->getParamsFromHeader(array('token'));
		}
	}
	
	$status = 'KO';
	$data   = array();
	$errors = false;
	//$tokenNotExpired = false;

	if (!empty($token)) {
		if ($this->request->is('get') || $this->request->is('post')) {
			if (isset($this->request->params['ext'])) {
				if ($this->request->params['ext'] === 'json') {
					$data = $this->_getInternalUser($token);
					if ($data != 'KO') {
						$status = 'OK';
					} else {
						$errors = 'token_expired_or_not_valid';
					}
				} else {
					$errors = 'not_valid_extension';
				}
			} else {
				$errors = 'not_valid_extension';
			}
		} else {
			$errors = 'method_not_allowed';

		}
	} else {
		$errors = 'token_expired_or_not_valid';
	}
	//if (!$tokenNotExpired) {
		//$token = '';
	//}
	if ($this->request->is('post')) {
		return (object) $data;
	}
	$this->set('status',$status);
	$this->set('data',$data);
	$this->set('token',$token);
	$this->set('error',$errors);
	$this->set('_serialize', array('status','data','error'));
}

/* getToken method > return the token of the user to make actions
*
* @return string token
*/
public function getToken() {

	$status = 'KO';
	$token = '';
	$error = '';
	if (!$this->request->is('get')) {
    	$error = 'method_not_allowed';
    } else {
    	list($password,$email) 		= $this->getParamsFromGet(array('password','email'));
    	list($token,$status,$error) = $this->_getTokenByEmailAndPassword($email,$password);
    }
	//check errors >
	//error_saving_data - Error in data access. User not saved.Please check again your data before saving.
	//access_data_repeated  - Username or email repeated. No token provided not valid. Please try with another username or email
	//method_not_allowed - This is a post method, please check it by postman
	//username_or_password_not_valid - Username or password not valid. Token not valid

    $this->set('data',(object) array());
    $this->set('error',$error);
	$this->set('token',$token);
    $this->set('status',$status);
	$this->set('_serialize', array('data','status','token','error'));

	return array($token, $error);
}

/**
 * facebooklogin method
 *
 * 
  * @return void
 */

public function facebookLogin() {
	$this->autoRender = false;
	$this->response->disableCache();

	list($facebookid,$email, $name, $locale) = $this->getParamsFromPost(array('facebookid','email','name','locale'));
	$errors   = '';
	$error   = '';
	$status   = 'KO';
	$token 	  = '';
	$userData = array();

	
	if (!empty($facebookid)) {
		
		$userExistsInDb = $this->User->findByFacebookUid($facebookid);

		$hasFacebookAccount = (!empty($userExistsInDb)) ? true : false;
		$isValidEmail = !!filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!empty($isValidEmail)) {
			$user = $this->User->findByEmail($email);




			if (empty($user)) {

				

				$user = $this->register(md5($email),$email,$name,$facebookid,$locale);

				return $user;


				$userData = json_decode($user);
				if ($userData[1] == 'KO') {
					$error = 'access_data_repeated';
				}
				$user = (array) $userData;
				$user['User'] = (array) $user[0]->User;
			} else {
				$validIdioms = Configure::read('Config.languages');
				if (in_array($locale,$validIdioms)) {
					$this->Session->write('Config.language',$locale);
				} 
				$locale = $this->Session->read('Config.language');
				$userSaveData = $user;
				if (!$hasFacebookAccount) {					
					$userSaveData['User']['password'] 	  = md5($user['User']['email']);
					$userSaveData['User']['facebook_uid'] = $facebookid;
					$userSaveData['User']['locale']       = $locale;
					$this->User->save($userSaveData);
					$user['User']['email'] = $email;
				} else {
					$userSaveData['User']['email']     = $userExistsInDb['User']['email'];
					$userSaveData['User']['notpwd']    = 1;
					$userSaveData['User']['locale']	   = $locale;

					$user['User']['email']         = $userExistsInDb['User']['email'];
					$user['User']['locale']        = $locale;					
				}

				$this->loadModel('User');
				$this->User->save($userSaveData, false);
			}
			$this->request->data = array(
				'User' => array(
					'email' => $user['User']['email'],
					'password' => md5($user['User']['email'])
				)
			);
			
	    	if ($this->Auth->login()) {    		
	    		$user = $this->Auth->user();   		
				
	    		if ($user['is_enabled'] == 0) {
					$error = __('login_parameters_invalid');
	    		} else {
					$status = 'OK';
	    		}
	    		$token = $this->_getToken($user['id']);
				$token = $this->_checkToken($token,true);
				if (!empty($token)) {
					if ($user['is_enabled'] == 0) {
						$error = __('login_parameters_invalid');
						$token = '';
		    		} else {
						$status = 'OK';
						$token = $token[1];
						$userData = $this->_getInternalUser($token);
		    		}			
				}
	    	} else {
	    		$error = __('login_parameters_invalid');
	    	}
	    	//$this->redirect(array('Controller' => 'Users','action' => 'login',$user['User']['email'],md5($user['User']['email'])));
		} else {
			$errors = 'email_not_valid';
		}
	} else {
		$errors = 'facebook_id_not_valid';
	}
	$userData = (empty($userData)) ? (object) $userData : $userData;
	$returnData = array(
		'status' => $status,
		'token' => $token,
		'data' => $userData,
		'error' => $error,
	);
	return json_encode($returnData);
}
/**
 * login method
 *
 * 
  * @return void
 */
public function login($user = null, $password = null) {
	$this->Auth->logout();
    $this->layout = 'default';
    $token  = '';
    $error  = '';
    $status = 'KO';


	$isJson = $this->request->is('json');
    if (!empty($user)) {
    	
    } else {    	
	    if ($this->request->is('post')) {

	    	if ($isJson) {
	    		list($password,$email,$locale) = $this->getParamsFromPost(array('password','username','locale'));
		        if (empty($email) || empty($password)) {
		    		$error = __('login_parameters_invalid');
		    	} else {
			    	$this->request->data['User']['username']    = $email;
			    	$this->request->data['User']['password'] = $password;
			    	if ($this->Auth->login()) {
			    		$user = $this->User->findById($this->Auth->user()['id']);
			    		$validIdioms = Configure::read('Config.languages');
						$localeValid = 'es';
				    	if (in_array($locale,$validIdioms)) {
							$localeValid = $locale;
						} else if (!empty($user['User']['locale'])) {
							$localeValid = $user['User']['locale'];
						}
						$this->Session->write('Config.language', $localeValid);

				    	$userToSaveLocale = $user;
				    	unset($userToSaveLocale['Group']);
				    	unset($userToSaveLocale['Authentication']);
				    	$userToSaveLocale['User']['notpwd'] = 1;
						$userToSaveLocale['User']['locale'] = $localeValid;
						$this->User->save($userToSaveLocale);
						//error_log('Locale: '.$localeValid.PHP_EOL, 3,'/var/www/html/Hiit4AllLog.log');
			    		if ($user['User']['is_enabled'] == 0) {
							$error = __('login_parameters_invalid');
			    		} else {
							$status = 'OK';
			    		}
			    	} else {
			    		$error = __('login_parameters_invalid');
			    	}
		    	}
		    } else {
		    	
		    	if ($this->Auth->login()) {
		    		$userId = $this->Auth->user();
		    		$user = $this->User->findById($userId['id']);
		    		if ($user['User']['is_enabled'] == 0 || $user['User']['group_id'] > 3) {
						$this->Flash->error(__('Nombre de usuario / contraseña incorrectos.'));
		    		} else {
		    			if ($user['User']['group_id'] == 3) {
		    				$this->Flash->success(__('Acceso de partner aceptado. Registrado correctamente'));	
		    			} else if($user['User']['group_id'] == 1) {
		    				//$this->Flash->success(__('Acceso de admin aceptado. Registrado correctamente'));		    		
		    			} else {
		    				$this->Flash->success(__('Acceso aceptado. Registrado correctamente'));
		    			}
		    			
			            /*if ($user['Group']['id'] == 2) {
			            	$url = '/Books/index/';
			            } else if ($user['Group']['id'] == 3) {
							$url = '/Books/indexpartner';
			            } else {
			            	$url = '/Books/index';
			            }*/   
			            $url = 'Users/index';
			            return $this->redirect($url);	
		    		}	        	
		        } else if (!empty($this->request->data)) {
		        	//debug($this->Auth).die;
	        		$this->Flash->error(__('Nombre de usuario / contraseña incorrectos.'));
	        		//debug($this->request->data).die;
		        }
		    }
		} else {
			$error = 'method_not_allowed';
		}
		$userData = array();
		if ($this->Auth->login()) {

			$user  = $this->Auth->user();
			$token = $this->_getToken($user['id']);
			$token = $this->_checkToken($token,true);
			
			if (!empty($token)) {
				if ($isJson) {
					if ($user['is_enabled'] == 0) {
						$error = __('login_parameters_invalid');
						$token = '';
		    		} else {
						$status = 'OK';
						$token = $token[1];	
						$userData = $this->getUser($token);
		    		}
				} else {
					if ($user['is_enabled'] == 0 || $user['group_id'] > 2) {
						$error = __('login_parameters_invalid');
						$token = '';
		    		} else {
						$status = 'OK';
						$token = $token[1];	
						$userData = $this->getUser($token);
		    		}
				}
			}
		}
		$userData = (empty($userData)) ? (object) $userData : $userData;
		$this->set('error', $error);
	    $this->set('status', $status);
	    $this->set('token', $token);
	    $this->set('data', $userData);
	}
    $this->set('_serialize', array('status','token','data','error'));
}



public function api_login() {
        $this->autoRender = false;
        http_response_code(401);
        $arrReturn = array();
        if ($this->request->data && isset($this->request->data['username']) && isset($this->request->data['password'])) {

            $arrUser  = $this->User->find('all',array(
                    'conditions'=>array(
                            'username'=> $this->request->data['username'],
                            'password' => $this->Auth->password($this->request->data['password']),
                    )
                )
            );



            if (count($arrUser) > 0) {
                $this->Session->write('Auth.User',$arrUser[0]['User']);
                // Do your login functions
                http_response_code(200);
                $this->loadModel('Authentication');
                $userId = $arrUser[0]['User']['id'];
                $hasAuth = $this->Authentication->findAllByUserId($userId,null,array('expires_on' => 'DESC'));

                if (!empty($hasAuth) && (date($hasAuth[0]['Authentication']['expires_on']) < date('Y-m-d H:i:s'))) {
                	$query = 'DELETE FROM authentications where user_id ='.$userId;
                	$this->Authentication->query($query);
                	
                	$authenticationData['Authentication']['user_id'] = $userId;
		    		$sessionMinutes 								 = Configure::read('Session.timeout');
		    		
		    		$authenticationData['Authentication']['expires_on'] = date("Y/m/d H:i:s", strtotime("+".$sessionMinutes." minutes"));
		    		$authenticationData['Authentication']['token']      = md5(json_encode($arrUser[0]['User']));
		    		
		    		$this->Authentication->create();
		    		if ($this->Authentication->save($authenticationData)) {
		    			$tokenValue = $this->_getToken(null, $authenticationData['Authentication']['token']);
		    			
		    		}
                } else {

                	if (!empty($hasAuth)) {
                		$tokenValue = $this->_getToken(null, $hasAuth['Authentication']['token']);
                	} else {
                		$authenticationData['Authentication']['user_id'] = $userId;
			    		$sessionMinutes 								 = Configure::read('Session.timeout');
			    		
			    		$authenticationData['Authentication']['expires_on'] = date("Y/m/d H:i:s", strtotime("+".$sessionMinutes." minutes"));
			    		$authenticationData['Authentication']['token']      = md5(json_encode($arrUser[0]['User']));
			    		
			    		$this->Authentication->create();
			    		if ($this->Authentication->save($authenticationData)) {
			    			$tokenValue = $this->_getToken(null, $authenticationData['Authentication']['token']);
			    		}
                	}
                 }
                
                $arrReturn = array('token' => $tokenValue);

            } 
        }

        echo json_encode($arrReturn);
    }




/**
 * logout method
 *
 * 
  * @return void
 */
public function logout() {
	$this->Auth->allow();
	$this->layout = 'default';
	$userAuth = $this->Auth->user();

	if (!empty($userAuth)) {
		$this->loadModel('Authentication');
		$authDelete = $this->Authentication->query("DELETE FROM authentications WHERE user_id = ".$userAuth['id'].";");
	}
	$this->Auth->logout();
	if (isset($this->request->params['ext'])) {
		if ($this->request->params['ext'] === 'json') {
			$this->set('status','OK');
			$this->set('_serialize', array('status'));
		}
	} else {
		$this->Flash->success(__('Usuario desconectado correctamente. Hasta otra'));
		$this->redirect(array('controller' =>'Users','action' => 'login'));
	}
}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'default';
		if ($this->request->is('post')) {
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario añadido correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo añadir al usuario. Por favor inténtelo más tarde.'));
			}
		}
		$groups  = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups  = $this->User->Group->find('list');
		
		$this->set(compact('groups'));
	}

public function register($password = null,$email = null,$name = null,$facebookId = null,$locale) {
	//receives $username, $password, $email
	$userData 	  = (object) array();
	$status   	  = 'KO';
	$error    	  = '';
	$tokenValue   = '';
	$postParams = array('password','email','name','locale');
	$internalCall = false;
	if (empty($email)) {
		list($password,$email,$name,$locale) = $this->getParamsFromPost($postParams);
	} else {
		$internalCall = true;
	}
	$locale = (empty($locale)) ? 'es' : $locale;
	$hasName      = (!empty($name)) ? true : false;
	$hasEmail     = (!empty($email)) ? true : false;
	$hasPassword  = (!empty($password)) ? true : false;
	$isEmailValid = $this->checkIfIsEmailValid($email);
    
	if ($isEmailValid && $hasEmail && $hasName && $hasPassword) {
		if ($this->request->is('post')) {

	    	//If the user is not registered but is sending params we check the auth to receive the token
			$userData   = [
				'User' => [
					'password' => $password,
					'email' => $email,
					'group_id' => 2,
					'name' => $name,
					'locale' => $locale
				]
			];
			$dataSource = ConnectionManager::getDataSource("default"); 
	    	/*list($isRepeated,$companyId) = $this->_checkRepeatEmailAndCheckIfComesFromCompany($email);
	    	if ($companyId == -2) {
	    		$userData 	= (object) array();
    			$tokenValue = '';
				$error 		= 'maximum_number_of_cupons_supported';
	        	$status 	= 'KO';
	    	} else {*/
	    		//if (!$isRepeated) {
		    		$dataSource->begin();
		    		$userData['now'] = date('Y-m-d H:i:s');
		    		
		    		if ($facebookId != null) {
		    			$userData['User']['facebook_uid'] = $facebookId;
		    		}

			    	if ($this->User->save($userData)) {
			    		$authenticationData['Authentication']['user_id'] = $this->User->getLastInsertID();
			    		$sessionMinutes 								 = Configure::read('Session.timeout')*60*24*7;
			    		
			    		$authenticationData['Authentication']['expires_on'] = date("Y/m/d H:i:s", strtotime("+".$sessionMinutes." minutes"));
			    		$authenticationData['Authentication']['token']      = md5(json_encode($userData));
			    		$this->loadModel('Authentication');
			    		$this->Authentication->create();
			    		if ($this->Authentication->save($authenticationData)) {
			    			$dataSource->commit(); //save userData	
			    			$status			  = 'OK';
			    			$tokenValue = $this->_getToken(null, $authenticationData['Authentication']['token']);
			    		}
			    		$paramsToClean = array('token','group_id');
			    		$userData['User'] = $this->cleanParamsFromArray($userData['User'],$paramsToClean);
			    		$paramsToClean = array('now');
			    		$userData = $this->cleanParamsFromArray($userData,$paramsToClean);
			        } else {
			        	$dataSource->rollback();
			        	$userData   = (object) array();
			        	$tokenValue = '';
			        	$error 		= 'error_saving_data';
			        	$status 	= 'KO';
			        }	
		    	/*} else {
		    			$userData 	= (object) array();
		    			$tokenValue = '';
						$error 		= 'access_data_repeated';
			        	$status 	= 'KO';
		    	}*/
			//}	    	
	    } else {
	    	$error  = 'method_not_allowed';
	    	$status = 'KO';
	    }
	} else {
		if (!$hasName) {
			$error .= 'name_not_defined | ';
		}
		if (!$hasPassword) {
			$error .= 'password_not_defined | ';
		} 
		if (!($isEmailValid) || !($hasEmail)) {
			$error .= 'email_not_valid_or_not_defined | ';
		}
	}
	
    //check errors >
    	//error_saving_data - Error in data access. User not saved.Please check again your data before saving.
    	//access_data_repeated  - Username or email repeated. No token provided not valid. Please try with another username or email
    	//method_not_allowed - This is a post method, please check it by postman
    	//email_not_valid - Email not valid
    $this->set('data',$userData);	
	$this->set('status',$status);
	$this->set('token',$tokenValue);
	$this->set('error',$error);

    if ($internalCall) {
		$this->autoRender = false;
		$this->response->disableCache();
		$returnValue = array($userData,$status,$tokenValue,$error);
		return json_encode($returnValue);
	}
	$this->set('_serialize', array('data','status','token','error'));

}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function dehabilite() {
		$status = 'KO';
		$headerParams = array('token');
		list($token) = $this->getParamsFromHeader($headerParams);
		$content     = $this->isAuthorized($token);
		$data   = array();
		$status = 'KO';
		if (empty($content)) {
			$errors = 'token_user_not_valid';
		}
		if (empty($errors)) {
		$this->User->id = $content['User']['id'];

		$isJson = false;
		if (isset($this->request->params['ext'])) {
			if ($this->request->params['ext'] === 'json') {
				$isJson = true;
			}
		}

		if (($this->request->is('post') || $this->request->is('delete'))) {
			$dataSource = ConnectionManager::getDataSource("default"); 
			
			$userArray = $this->User->findById($id);
			$userArray['User']['is_premium'] = 'N';
			$userArray['User']['notpwd'] = 1;

			if ($this->User->save($userArray)) {
				$this->loadModel('Client');
				$client = $this->Client->findByEmail($content['User']['email']);
				$client['Client']['active'] = 0;
				if ($this->Client->save($client)) {
					$dataSource->commit();	
					list($status,$error,$success) = $this->_deleteOKMessage($id);
					$this->Flash->success(__('Usuario deshabilitado correctamente'));
				} else {
					list($status,$error,$success) = $this->_deleteKOMessage('El cliente #'.$client['Client']['id'].' no se pudo deshabilitar');
					$this->Flash->error(__('No se pudo eliminar el usuario'));
				}
			} else {
				list($status,$error,$success) = $this->_deleteKOMessage('El usuario #'.$id.' no se pudo deshabilitar');
				$this->Flash->error(__('No se pudo eliminar el usuario'));
			}
		} else if (!$this->User->exists()) {
			list($status,$error,$success) = $this->_deleteKOMessage('invalid_user');
			if (!$isJson) {
				$this->Flash->error(__('The user could not be deleted. Please, try again.'));
				return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
			}
		} else {
			if ($isJson) {
				list($status,$error,$success) = $this->_deleteKOMessage('method_not_allowed');
			} else {
				$this->Flash->error(__('The user could not be deleted. Please, try again.'));
				return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
			}
			
		}
		if ($isJson) {
			$this->set('status',$status);
			$this->set('error',$error);
			$this->set('data',$success);
			$this->set('_serialize', array('status','error','data'));
		} else {
			return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
		}
	}
}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$status = 'KO';
		$this->User->recursive = -1;
		if (!is_numeric($id)) {
			list($email) = $this->getParamsFromPost(array('email'));
			$email = (empty($email)) ? $this->getParamsFromDelete(array('email')) : $email;
			$user  = $this->User->findByEmail($email);
			$id    = null;
			if (!empty($user)) {
				$id = $user['User']['id'];
			}
		}
		$this->User->id = $id;

		$isJson = false;
		if (isset($this->request->params['ext'])) {
			if ($this->request->params['ext'] === 'json') {
				$isJson = true;
			}
		}

		if (($this->request->is('post') || $this->request->is('delete'))) {
			$dataSource = ConnectionManager::getDataSource("default"); 
			/*$this->loadModel('Authentication');
			$this->loadModel('ImagesUser');
			$this->loadModel('LevelsUser');
			$this->loadModel('CopyProgram');
			$this->loadModel('CopyTraining');
			$this->loadModel('CopyExercisesTraining');
			$dataSource = ConnectionManager::getDataSource("default");
			$this->CopyProgram->recursive = 2;
			$programs = $this->CopyProgram->findAllByUserId($id);
			$programsToDelete  = Hash::extract($programs,'{n}.CopyProgram.id');
			$trainingsToDelete = Hash::extract($programs,'{n}.CopyTraining.{n}.id');
			$exercisesToDelete = Hash::extract($programs,'{n}.CopyTraining.{n}.CopyExercisesTraining.{n}.id');

			if (!empty($programs)) {
				$exerciseToDeleteString 	= (count($exercisesToDelete) > 1) ? implode(',',$exercisesToDelete) :  $exercisesToDelete[0];
				$exerciseQueryString    	= (count($exercisesToDelete) > 1) ? 'id IN ('.$exerciseToDeleteString.')' : 'id ='.$exerciseToDeleteString;
				$queryDeleteExercisesString = "DELETE FROM copy_exercises_trainings WHERE ".$exerciseQueryString;
				
				$trainingsToDeleteString   = (count($trainingsToDelete) > 1) ? implode(',',$trainingsToDelete) :  $trainingsToDelete[0];
				$trainingQueryString       = (count($trainingsToDelete) > 1) ? 'id IN ('.$trainingsToDeleteString.')' : 'id ='.$trainingsToDeleteString;
				$queryDeleteTrainingString = "DELETE FROM copy_trainings WHERE ".$trainingQueryString;

				$programsToDeleteString    = (count($programsToDelete) > 1) ? implode(',',$programsToDelete) :  $programsToDelete[0];
				$programQueryString        = (count($programsToDelete) > 1) ? 'id IN ('.$programsToDeleteString.')' : 'id ='.$programsToDeleteString ;
				$queryDeleteProgramString  = "DELETE FROM copy_programs WHERE ".$programQueryString;

				$deleteExercises = $this->CopyExercisesTraining->query($queryDeleteExercisesString);
				$deleteTrainings = $this->CopyTraining->query($queryDeleteTrainingString);
				$deletePrograms  = $this->CopyProgram->query($queryDeleteProgramString);
			}
			$authDelete   = $this->Authentication->query("DELETE FROM authentications WHERE user_id = ".$id.";");
			$deleteImages = $this->ImagesUser->query("DELETE FROM images_users WHERE user_id = ".$id.";");
			$deleteImages = $this->LevelsUser->query("DELETE FROM levels_users WHERE user_id = ".$id.";");*/

			$userArray = $this->User->findById($id);
			$userArray['User']['is_enabled'] = 0;
			$userArray['User']['is_premium'] = 'N';
			$userArray['User']['notpwd'] = 1;

			if ($this->User->save($userArray)) {
				$dataSource->commit();
				list($status,$error,$success) = $this->_deleteOKMessage($id);
				$this->Flash->success(__('Usuario eliminado correctamente'));
			} else {
				list($status,$error,$success) = $this->_deleteKOMessage('El usuario #'.$id.' no se pudo eliminar');
				$this->Flash->error(__('No se pudo eliminar el usuario'));
			}

		} else if (!$this->User->exists()) {
			list($status,$error,$success) = $this->_deleteKOMessage('invalid_user');
			if (!$isJson) {
				$this->Flash->error(__('The user could not be deleted. Please, try again.'));
				return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
			}
		} else {
			if ($isJson) {
				list($status,$error,$success) = $this->_deleteKOMessage('method_not_allowed');
			} else {
				$this->Flash->error(__('The user could not be deleted. Please, try again.'));
				return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
			}
			
		}
		
		if ($isJson) {
			$this->set('status',$status);
			$this->set('error',$error);
			$this->set('data',$success);
			$this->set('_serialize', array('status','error','data'));
		} else {
			return $this->redirect(array('controller' => 'Users', 'action' => 'index'));
		}
	}

	public function authenticationToken($token) {
		return $this->_getUserByToken($token);
	}


private function _getUserByToken($token) {
	$this->loadModel('Authentication');
	$user = $this->Authentication->findByToken($token);
	$userData  =array();
	if (!empty($user)) {
		$expiresOn = strtotime($user['Authentication']['expires_on']);
		$nowDay    = strtotime(date('Y-m-d H:i:s'));
		if ($expiresOn > $nowDay) {
			$userData = $this->User->findById($user['Authentication']['user_id']);
		}
	}
	return $userData;
}
//// private methods

private function _sendNewPassword($user,$password) {
	$user['User']['password'] = $password;
	$user['User']['token']    = null;
	if ($this->User->save($user)) {
		return true;	
	}
	return false;
}

private function _createNewToken($userId = null) {
	$user = $this->Auth->user();
	$userId = (!empty($userId)) ? $userId : $user['id'];

	if (!empty($userId)) {
		$authenticationData  = array();
		$sessionMinutes      = Configure::read('Session.timeout')*60*24*7;

		$authenticationData['Authentication']['user_id']    = $userId;
		$authenticationData['Authentication']['expires_on'] = date("Y/m/d H:i:s", strtotime("+".$sessionMinutes." minutes"));
		$authenticationData['Authentication']['token']      = md5(json_encode($authenticationData));
		
		$this->Authentication->save($authenticationData);	
		$returnValue = $authenticationData['Authentication']['token'];
	} else {
		$returnValue = '';
	}

	return $returnValue;
}

private function _updateTokenData($userToken) {
	$sessionMinutes = Configure::read('Session.timeout')*60*24*7;
	
	$this->loadModel('Authentication');
	$this->Authentication->recursive 					= -1;
	$userAuthentication 			 					= $this->Authentication->findByToken($userToken);
	$userAuthentication['Authentication']['expires_on'] = date("Y/m/d H:i:s", strtotime("+".$sessionMinutes." minutes"));

	$this->Authentication->save($userAuthentication);
	
	return $userAuthentication['Authentication']['token'];
}

private function _checkToken($token = null, $update = false) {
	
	$errors   = false;
	$token  = (isset($token)) ? $token : '';

	if (!empty($token)) {
		
		$userToken = $this->_getToken(null, $token);
		
		if (empty($userToken)) { //token not exists in database 
			if ($update) { //we force to create one token with the user saved in session
				$token = $this->_createNewToken();
			} else {
				$errors   = 'token_expired_or_not_valid';
			}
		} else { //we have the token in database and is not expired, we save the new data after check exists
			$token = $this->_updateTokenData($userToken);
		}
	} else {
		if ($update) { //we force to create one token with the user saved in session
			$token = $this->_createNewToken();
		} else {
			$errors   = 'token_expired_or_not_valid';
		}
	}
	$hasToken = (!$errors) ? true : false;

    return array($hasToken,$token,$errors);
}

private function _checkRepeatEmailAndCheckIfComesFromCompany($email) {
	$this->User->recursive = -1;
	
	$userRepeated = $this->User->findByEmail($email);
	$returnValue  = (!empty($userRepeated)) ? true : false;
	$companyId    = -1;
	$this->loadModel('Company');
	$mailDomain = explode('@',$email);
	$mailDomain = $mailDomain[1];
	$company = $this->Company->findByDomainCompany($mailDomain);

	if (!empty($company)) {
		if ($company['Company']['premium_accounts_used'] < $company['Company']['premium_accounts_amount']) {
			$company['Company']['premium_accounts_used']++;
			if ($this->Company->save($company)) {
				$companyId = $company['Company']['id'];
			}
		} else {
			$companyId = -2;
		}
	}	
	return array($returnValue,$companyId);
}

private function _getToken($userId,$token = null) {
	$paramForquery   = (empty($token)) ? $userId : $token;
	$paramConditions = (empty($token)) ? 'user_id' : 'token';
		
	$conditions = array('conditions' => array($paramConditions => $paramForquery,'expires_on >' =>date('Y-m-d H:i:s')));

	$this->loadModel('Authentication');
	$this->Authentication->recursive = -1;
	$userAuthentication  = $this->Authentication->find('first',$conditions);
	$token= (!empty($userAuthentication)) ? $userAuthentication['Authentication']['token'] : null;

	return $token;
}
private function _getTokenByEmailAndPassword($email,$password) {
	$tokenValue  = '';
	$status      = 'KO';
	$token       = '';
	$error       = '';
	$this->User->recursive = -1;
	$user = $this->User->findByEmailAndPassword($email,AuthComponent::password($password));
	
	if (!empty($user)) {
		$tokenSelected = $this->_getToken($user['User']['id']);
		
		if (empty($tokenSelected)) {
			$tokenSelected = $this->_createNewToken($user['User']['id']);
		} 
		$token = $tokenSelected;
    	$status = 'OK';	
	} else {
		$error  = 'login_parameters_invalid';
		$this->Auth->logout();
	}
	return array($token,$status,$error);
}


/**
 * _deleteOKMessage method > returns the OK data validation when a user has been deleted
 *
 * @throws NotFoundException
 * @param array $status,$error,$success
 * @return void
 */
	private function _deleteOKMessage($id) {
		$returnValues = array();
		
		$returnValues[]  = 'OK';
		$returnValues[]  = '';
		$returnValues[]  = 'User #'.$id.' has been deleted';
		
		return $returnValues;
	}


/**
 * _deleteKOMessage method > returns the KO when a user has not been deleted
 *
 * @throws NotFoundException
 * @param array $errorMessage
 * @return void
 */
	private function _deleteKOMessage($errorMessage) {
		$returnValues = array();

		$returnValues[] = 'KO';
		$returnValues[] = $errorMessage;
		$returnValues[] = '';
		
		return $returnValues;
	}


	/** 
	* sendEmail method
	*
	* @return void
	*/
	private function _sendTokenUserToEmail($user) {
		$user['User']['token']  = md5(json_encode($user));
		$user['User']['notpwd'] = 1;
		$this->User->save($user);
		
		$Email = new CakeEmail('smtp');
	    $Email->emailFormat('html');
	    $Email->from(array('no-reply@hiit4all.com' => 'no-reply.hiit4all'));
	    $Email->subject(__('ApiHiit4All  - Recuperar contraseña'));
	    $Email->to($user['User']['email']);
	    
	    if ($Email->send($this->EmailText->sendTokenUserToEmail(SERVER, $user))) {
	    	return true;
	    }
	    return false;
	}

}

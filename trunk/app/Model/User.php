<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Order $Order
 * @property WorkingSchedule $WorkingSchedule
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	
	
	public $validate = array(
		'group' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message'=> 'Nhóm chưa được chọn'
			),
		),
		'username'=> array(
			'username_must_not_be_empty'=> array(
				'rule' => 'notEmpty',
				'last' => true,
			),
			'username_must_be_unique' => array(
                'rule' => 'isUnique',
				'last' => true,
			),
		),
		'passwd' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'on' => 'create',
			),
			'min' => array(
		        'rule' => array('minLength', 6),
				'message' => 'Mật khẩu phải dài hơn 6 ký tự',
		    ),
		    'match' => array(
		        'rule' => 'validatePasswdConfirm',
		     	'message' => 'Mật khẩu nhập không trùng nhau',
        	)
		),
   		'passwd_confirm' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'on' => 'create',
			),
    	),
		'avatar' => array(
			'checksize' => array(
                'rule' => array('checkSize',false),
                'message' => 'Kích thước file bị sai',
            ),
            'checktype' =>array(
                'rule' => array('checkType',false),
                'message' => 'Không đúng loại file được cho phép.',
            ),
            'checkupload' =>array(
                'rule' => array('checkUpload', false),
                'message' => 'Lỗi khi tải file',
            ),
		),
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'WorkingSchedule' => array(
			'className' => 'WorkingSchedule',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
	
	public function validatePasswdConfirm($params,$opt){
		$assoc = each($params);
	    if ($this->data['User'][$assoc['key']] === $this->data['User'][$assoc['key'].'_confirm']) {
	      return true;
	    }
	    return false;
	}
	
	public function checkUpload($data, $required = false){
        $data = array_shift($data);
        if(!$required && $data['error'] == 4){
            return true;
        }
        //debug($data);
        if($required && $data['error'] !== 0){
            return false;
        }
        if($data['size'] == 0){
            return false;
        }
        return true;

        //if($required and $data)
    }

    public function checkType($data, $required = false,$allowedMime = null){
        $data = array_shift($data);
        if(!$required && ($data['error'] == 4)){
            return true;
        }
        if(empty($allowedMime)){
            $allowedMime = array('image/gif','image/jpeg','image/pjpeg','image/png');
        }

        if(!in_array($data['type'], $allowedMime)){
            return false;
        }
        return true;
    }

    public function checkSize($data, $required = false){
        $data = array_shift($data);
        if(!$required && ($data['error'] == 4)){
            return true;
        }
        if(($data['size'] == 0) || ($data['size']/1024 > 2050)){
            return false;
        }
        return true;
    }
	
	public function beforeSave($options = array()) {
	    if (isset($this->data['User']['avatar']) && !empty($this->data['User']['avatar']['tmp_name'])) {
	    	switch($this->data['User']['avatar']['type']){
	    		case 'type/gif':
	    			$type = 'gif';
	    			break;
	    		case 'type/png':
	    			$type = 'png';
	    			break;
	    		default:
	    			$type = 'jpg';
	    	}
	    	$filename = mt_rand(0,255)."_".time().".".$type;
	    	$destination = USER_IMAGE_PATH.DS.$filename;
	    	if(!file_exists(USER_IMAGE_PATH)){
	    		mkdir(USER_IMAGE_PATH);
	    	}
	    	move_uploaded_file($this->data['User']['avatar']['tmp_name'], $destination);
	        $this->data['User']['avatar'] = $filename;
	    }
	    
		if (isset($this->data['User']['passwd']) && !empty($this->data['User']['passwd'])){
			$this->data['User']['password'] = Security::hash($this->data['User']['passwd'], null, true);
			unset($this->data['User']['passwd']);
		}

		if (isset($this->data['User']['passwd_confirm'])){
			unset($this->data['User']['passwd_confirm']);
		}
	    return true;
	}

}

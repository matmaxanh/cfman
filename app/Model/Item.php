<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Category $Category
 * @property Warehouse $Warehouse
 */
class Item extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name1';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cost' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'thumbnail' => array(
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
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Warehouse' => array(
			'className' => 'Warehouse',
			'foreignKey' => 'item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
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
	    if (isset($this->data['Item']['thumbnail']) && !empty($this->data['Item']['thumbnail']['tmp_name'])) {
	    	switch($this->data['Item']['thumbnail']['type']){
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
	    	$destination = ITEM_IMAGE_PATH.DS.$filename;
	    	if(!file_exists(ITEM_IMAGE_PATH)){
	    		mkdir(ITEM_IMAGE_PATH);
	    	}
	    	move_uploaded_file($this->data['Item']['thumbnail']['tmp_name'], $destination);
	        $this->data['Item']['image'] = $filename;
	    }
	    return true;
	}

}

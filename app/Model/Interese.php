<?php
App::uses('AppModel', 'Model');
/**
 * Interese Model
 *
 * @property User $User
 * @property Cheque $Cheque
 */
class Interese extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'intereses';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        
        public $virtualFields = array(
            'rango'=>'IFNULL (CONCAT(Interese.porcentaje,"%"),CONCAT(Interese.minimo,"-",Interese.maximo))'
        );

        /**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'Cheque' => array(
			'className' => 'Cheque',
			'foreignKey' => 'interese_id',
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

}

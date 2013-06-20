<?php
	class Setor extends AppModel {
		public $validate = array(
			'nome' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo')
		);
	}
?>
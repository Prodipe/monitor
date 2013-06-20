<?php
	class Etapa extends AppModel {
		public $validate = array(
			'nome' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'posicao' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'prazo' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo')
		);
	}
?>
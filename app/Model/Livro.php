<?php
	class Livro extends AppModel {
		// Verifica os campos que não podem ficar vazios
		// O nome do livro é único
		public $validate = array(
			'nome' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo'),
			'professor' => array('rule' => 'notEmpty', 'message' => 'Preencha o campo')
		);
	}
?>
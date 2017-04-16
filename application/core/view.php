<?php
class View
{
	public $controller;
	public $template_view = 'template_view.php'; // здесь можно указать общий вид по умолчанию.

	function __construct(Controller $controller) {
		$this->controller = $controller;
	}

	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/

	public function generate($action = null, $data = null) {
		
		/*
		if(is_array($data)) {
			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		
		/*
			динамически подключаем общий шаблон (вид),
			внутри которого будет встраиваться вид
			для отображения контента конкретной страницы.
		*/

		if (is_null($action)) {
			$action = 'index';
		}

		include "application/views/$this->template_view";
	}
}

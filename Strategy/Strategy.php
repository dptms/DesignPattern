<?php
interface UserStrategy{
	public function show();
}

class FemaleUserStrategy implements UserStrategy{
	public function show(){
		echo '这是女性用户看到的';
	}
}

class MaleUserStrategy implements UserStrategy{
	public function show(){
		echo '这是男性用户看到的';
	}
}

class Page{
	protected $strategy;
	public function index(){
		$this->strategy->show();
	}
	public function setStrategy(UserStrategy $strategy){
		$this->strategy = $strategy;
	}
}

$strategy = new MaleUserStrategy(); // OR new FemaleUserStrategy();
$page = new Page();
$page->setStrategy($strategy);
$page->index();
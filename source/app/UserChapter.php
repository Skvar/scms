<?php
include_once("BaseChapter.php");
include_once("UserViewer.php");
//----------------------------------------------------
class JUserChapter extends JBaseChapter
{
	private $User;
//----------------------------------------------------
	public function __construct($index,$name)
	{
		parent::__construct($index,$name);
		
	}
//----------------------------------------------------	
	public function SetUser($User)
	{
		$this->User = $User;
	}
//----------------------------------------------------	
	public function GetMenuString()
	{
		
		if($this->User->Type){
			$out =  Array(
			3=>Array(
				'icon'=>'icon-key',
				'caption'=>$this->User->UserName,
				'style'=>'navbar-right',
				'subitem'=>Array(
					0=>Array(
						'caption'=>'Личный кабинет '.$User->UserName,
						'icon'=>'icon-person',
						'link'=>'index.php?cid='.chapterUser.'&id='.$User->objectID
					),
					1=>Array(
						'caption'=>'Выход',
						'icon'=>'icon-person',
						'link'=>'index.php?cid='.chapterUser
						)
					)
				)
			);
			
		}
		else{
			$out =  Array(
				3=>Array(
					'icon'=>'icon-key',
					'caption'=>'Вход в личный кабинет',
					'link'=>'index.php?cid='.chapterUser,
					'style'=>'navbar-right',
					)
				);
		}
		
		return $out;
	}
	
	
//----------------------------------------------------		
	public function Load($id=0)
	{
		$this->Viewer = new JUserViewer($this->User);
	}
	
//----------------------------------------------------		
	public function GetCommandString($tab)
	{
		
	}
	
//----------------------------------------------------	
	protected function Save($id)
	{
	}
//----------------------------------------------------		
	protected function Edit($id)
	{
		
	}
//----------------------------------------------------
	
}
?>
<?php
use Classes\JBaseChapter;
//----------------------------------------------------
class JPricesChapter extends JBaseChapter
{
//----------------------------------------------------
	public function __construct($index,$name)
	{
		parent::__construct($index,$name);
		

	}
//----------------------------------------------------	
	public function GetMenuString()
	{
		return Array(
			1=>Array(
				'icon'=>'icon-logo',
				'caption'=>'Наша организация',
				'subitem'=>Array(
					1=>Array(
						'caption'=>'Тарифы и цены',
						'icon'=>'icon-cart',
						'link'=>'index.php?cid='.chapterPrice
					)
				)
			)
		);
	}
	
	//----------------------------------------------------		
	public function GetCommandString($tab)
	{
		
	}
//----------------------------------------------------	
	protected function Load($id)
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
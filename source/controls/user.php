<?php

if(!defined("userUnAuthorized"))	define("userUnAuthorized",0);
if(!defined("userAuthorized"))		define("userAuthorized",1);
if(!defined("userAdministrator"))	define("userAdministrator",110);


include_once("BaseController.php");
//----------------------------------------------------
class JUser extends JBaseController
{
	public $UserName;
	public $Type;
	public $Email;
	
	private $Hash;
//----------------------------------------------------
	public function __construct($id)
	{
		parent::__construct("JUserControl");
		$this->objectID = $id;	
		
		if(!$id){
			$this->Clear();
		}
		
	}
//----------------------------------------------------	

		public function Load()
		{
			$uinfo = $this->LoadRow("SELECT * FROM sysUserAuth WHERE id=".$this->objectID);
			
			$this->UserName = isset($uinfo['username']) ? $uinfo['username'] : "";
			$this->Type = isset($uinfo['userright']) ? $uinfo['userright'] : 0;
			$this->Hash  = isset($uinfo['hash']) ? $uinfo['hash'] : "";

			
			unset($uinfo);
			$this->iResult = true;	
			return $this->iResult;
		}
//----------------------------------------------------
		public function LoadOnLogin($login,$pass)
		{
			$uinfo = $this->LoadData("SELECT * FROM sysUserAuth WHERE login='".$login."'");
			foreach($uinfo as $ix => $uinfo){
				if($uinfo['pwd'] == (md5($pass))){
					
					$this->UserName = isset($uinfo['username']) ? $uinfo['username'] : "";
					$this->Type = isset($uinfo['userright']) ? $uinfo['userright'] : 0;
					$this->Hash = isset($uinfo['hash']) ? $uinfo['hash'] : "";
					unset($uinfo);
					$this->iResult = true;	
					return $this->iResult;	
				}			
			}
			$this->iResult = false;
			$this->Clear();
			return $this->iResult;			
		}
		
//----------------------------------------------------			
		private function Clear()
		{
			$this->UserName = "Anonimus";
			$this->Type = userUnAuthorized;
			$this->Email = "";
			$this->Hash = "";
			$this->objectID = 0;
		}
//----------------------------------------------------	

		public function LogOut()
		{
			$sst = session_status();
			if($sst != PHP_SESSION_NONE){
				$user = GetCurrentUser();
				unset($_SESSION['user']);
				
				session_destroy();
				if(!headers_sent($filename, $linenum)){
					setcookie("uid", "", time() - cookieTime);
		    		setcookie("uhash", "", time() - cookieTime);
		    	}
		    	echo "<script>location.href = 'index.php';</script>";
			}

		}

//----------------------------------------------------	
		private function AuthHashCode($length=6) {

		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
		    $code = "";
		    $clen = strlen($chars) - 1;  
		    while (strlen($code) < $length) $code .= $chars[mt_rand(0,$clen)];  
		    return $code;

		}
//----------------------------------------------------			
		public function CheckAuthorizy()
		{



			if(isset($_SESSION['user'])) unset($_SESSION['user']) ;
			$userip = $_SERVER["REMOTE_ADDR"];

			$sst = session_status();
			if($sst != PHP_SESSION_NONE){
				if (isset($_COOKIE['uid']) and isset($_COOKIE['uhash'])){
					
					$id = intval($_COOKIE['uid']);
					$this->objectID = $id;
					$hash = $_COOKIE['uhash'];
					$this->Message("Try authorized by cookie");
					
					if($this->Load() && $this->Hash == $hash && $this->objectID == $id){
						
						session_destroy();//удаляем старую
						session_start();//запускаем новую
					
						$_SESSION['user'] = $this;
						
						$this->Message("User ".$this->UserName." authorizy by cookies");
						return $this->SaveStats($id,$userip,$hash,1);		
					}
					else{
						$res = 0;
						$res += setcookie("uid", "");
				        $res += setcookie("uhash", "");
				        $this->Clear();	    
					}
				}

				if(!isset($_SESSION['user'])){  
					
					if(isset($_REQUEST['user-name']) && isset($_REQUEST['user-pwd']) && isset($_REQUEST['user-agree'])){
						
						$username =  htmlspecialchars($_REQUEST['user-name'],ENT_QUOTES);
						$userpass =  htmlspecialchars($_REQUEST['user-pwd'],ENT_QUOTES);
						$useragree =  $_REQUEST['user-agree']=='on'?true:false;
						
						$res = $this->LoadOnLogin($username,$userpass);
						if($res){	
							
							
							$hash = md5($this->AuthHashCode(10));

							setcookie("uid", $this->objectID, time()+cookieTime);
							setcookie("uhash", $this->Hash, time()+cookieTime);
							        
							session_destroy();//удаляем старую
							session_start();//запускаем новую
							$_SESSION['user'] = $this;
							$this->SaveStats(intval($this->objectID),$userip,$hash,$useragree); 
							$this->Message("User ".$this->UserName." authorizy by login and password");
				
							return true;
						}
					}
				}
			}	    
								
			$this->SaveStats(0,$userip,"",0);
			$this->Message("Unauthorizy user");  
			return true;	
	
		}
//--------------------------------------------------------------------------------
		private function SaveStats($userid,$ip,$hash,$useragree)
		{
			
			$request = $_SERVER['REQUEST_URI'];
			$agent = $_SERVER['HTTP_USER_AGENT'];
			
			$this->Query("UPDATE sysUserAuth SET hash='".$hash."',lastlogin='".date("Y-m-d")."',lastip='$userip', agree=$useragree WHERE id=$id");

			return $this->Insert("livComStats",Array('ip'=>$id,'request'=>$request,'user'=>$userid,'agent'=>$agent));
		
		}

}
?>
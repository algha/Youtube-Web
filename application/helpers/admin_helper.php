<?php
if(!function_exists('admin_menu'))
{
	function admin_menu($menu)
	{
		$html = "";
		foreach ($menu as $_menu){
			$html .= "<li class=\"ts-label\">".$_menu["text"]."</li>";
			if (isset($_menu["menus"]) && is_array($_menu["menus"])){
				foreach ($_menu["menus"] as $sub_menu){
					$html .= "<li>".anchor($sub_menu["url"],"<i class=\"".$sub_menu["icon"]."\"></i>".$sub_menu["menutitle"]."").admin_sub_menu($sub_menu, "submenu")."</li>";
				}
			}
		}
		return $html;
	}
}

if(!function_exists('admin_sub_menu')){
	function admin_sub_menu($submenu,$key)
	{
		$html = "";
		if (isset($submenu[$key]) && is_array($submenu[$key])){
 			$html .= "<ul>";
 			foreach ($submenu[$key] as $_submenu){
 				$sub_submenu = "";
 				if (isset($_submenu[$key]) && is_array($_submenu[$key])){
 					$sub_submenu = admin_sub_menu($_submenu,$key);
 				}
 				$html .= "<li>".anchor($_submenu["url"],$_submenu["title"]).$sub_submenu."</li>";
 			}
 			$html .= "</ul>";
		}
		return $html;
	}
}



if(!function_exists('inputValue')){
	function inputValue($varible,$key){
		$value = "";
		if (!isset($varible) || !isset($key)){
			return false;
		}
		if (is_array($varible) && array_key_exists($key, $varible)){
			return "value=\"".$varible[$key]."\"";
		}
		if (!is_array($varible)){
			return "value=\"".$varible."\"";
		}
	}
}

if(!function_exists('DateTimeValue')){
	function DateTimeValue($varible,$key){
		$value = "";
		if (!isset($varible) || !isset($key)){
			return false;
		}
		//2015-09-24T12:00
		if (is_array($varible) && array_key_exists($key, $varible)){
			$ymd = date("Y-m-d",$varible[$key]);
			$hi = date("h:i",$varible[$key]);
			return "value=\"".$ymd."T".$hi."\"";
		}
		if (!is_array($varible)){
			$ymd = date("Y-m-d",$varible);
			$hi = date("h:i",$varible);
			return "value=\"".$ymd."T".$hi."\"";
		}
	}
}

if(!function_exists('textViewValue')){
	function textViewValue($varible,$key){
		$value = "";
		if (!isset($varible) || !isset($key)){
			return false;
		}
		if (is_array($varible) && array_key_exists($key, $varible)){
			return $varible[$key];
		}
		if (!is_array($varible)){
			return $varible;
		}
	}
}

if(!function_exists('inputHidden')){
	function inputHidden($varible,$key){
		$value = "";
		if (!isset($varible) || !isset($key)){
			return false;
		}
		if (is_array($varible) && array_key_exists($key, $varible)){
			return "<input type=\"hidden\" name=\"".$key."\" value=\"".$varible[$key]."\" />";
		}
		if (!is_array($varible)){
			return "<input type=\"hidden\" name=\"".$key."\" value=\"".$key."\" />";
		}
	}
}

if(!function_exists('selectValue')){
	function selectValue($key,$source){
		$value = "";
		if (strstr($source,$key)){
			$value = "selected";
		}
		return $value;
	}
}

if(!function_exists('checkedValue')){
	function checkedValue($key,$source){
		$value = "";
		if (strstr($source,$key)){
			$value = "checked";
		}
		return $value;
	}
}

if(!function_exists('checkedRadioValue')){
	function checkedRadioValue($key,$source,$value){
		if (!isset($source) || !isset($key)){
			return "";
		}
		if ($source[$key] == $value){
			return  "checked";
		}
		return "";
	}
}

if(!function_exists('stringCount')){
	function stringCount($key,$source){
		$array = explode(",", $source);
		return count($array);
	}
}
if(!function_exists('tableRequestHelper')){
	function tableRequestHelper($aColumns,$get){
		
		$start = 0;
		$length = 20;
		$sOrder = "";
		$sWhere = "";
		$sLimit = "";
		
		if ( isset($get["iDisplayStart"]) && $get["iDisplayLength"]!= '-1' ){
			$start = intval($get["iDisplayStart"]);
			$length = intval($get["iDisplayLength"]);
		}
	
		if ( isset( $get['iSortCol_0'] ) ){
			$sOrder = "";
			for ( $i=0 ; $i<intval( $get['iSortingCols'] ) ; $i++ ){
				if ( $_GET[ 'bSortable_'.intval($get['iSortCol_'.$i]) ] == "true" ){
					$sOrder .= $aColumns[intval( $get['iSortCol_'.$i])]." ".($get['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
				}
			}
			$sOrder = substr_replace( $sOrder, "", -2 );
		}
		if ($sOrder == null || $sOrder == ""){
			$sOrder = "";
		}
		
		
		if ( isset($get['sSearch']) && $get['sSearch'] != "" ){
			$sWhere = " (";
			for ( $i=0 ; $i<count($aColumns); $i++ ){
				if (isset($get['bSearchable_'.$i]) && $get['bSearchable_'.$i] == "true"){
					$sWhere .= $aColumns[$i]." LIKE '%".$get['sSearch']."%' OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		return array("start"=>$start,"length"=>$length,"order"=>$sOrder,"where"=>$sWhere,"limit"=>$sLimit);
	}
}


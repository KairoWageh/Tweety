<?php
if(!function_exists('direction')){
	function direction(){
		if(session()->has('locale')){
			if(session('locale') == 'ar'){
				return 'rtl';
			}else{
				return 'ltr';
			}
		}else{
			return 'ltr';
		}
	}
}

if(!function_exists('current_user')){
	function current_user(){
		return auth()->user();
	}
}
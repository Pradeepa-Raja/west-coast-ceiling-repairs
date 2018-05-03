<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('corgan_storage_get')) {
	function corgan_storage_get($var_name, $default='') {
		global $CORGAN_STORAGE;
		return isset($CORGAN_STORAGE[$var_name]) ? $CORGAN_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('corgan_storage_set')) {
	function corgan_storage_set($var_name, $value) {
		global $CORGAN_STORAGE;
		$CORGAN_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('corgan_storage_empty')) {
	function corgan_storage_empty($var_name, $key='', $key2='') {
		global $CORGAN_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($CORGAN_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($CORGAN_STORAGE[$var_name][$key]);
		else
			return empty($CORGAN_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('corgan_storage_isset')) {
	function corgan_storage_isset($var_name, $key='', $key2='') {
		global $CORGAN_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($CORGAN_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($CORGAN_STORAGE[$var_name][$key]);
		else
			return isset($CORGAN_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('corgan_storage_inc')) {
	function corgan_storage_inc($var_name, $value=1) {
		global $CORGAN_STORAGE;
		if (empty($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = 0;
		$CORGAN_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('corgan_storage_concat')) {
	function corgan_storage_concat($var_name, $value) {
		global $CORGAN_STORAGE;
		if (empty($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = '';
		$CORGAN_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('corgan_storage_get_array')) {
	function corgan_storage_get_array($var_name, $key, $key2='', $default='') {
		global $CORGAN_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($CORGAN_STORAGE[$var_name][$key]) ? $CORGAN_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($CORGAN_STORAGE[$var_name][$key][$key2]) ? $CORGAN_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('corgan_storage_set_array')) {
	function corgan_storage_set_array($var_name, $key, $value) {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if ($key==='')
			$CORGAN_STORAGE[$var_name][] = $value;
		else
			$CORGAN_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('corgan_storage_set_array2')) {
	function corgan_storage_set_array2($var_name, $key, $key2, $value) {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if (!isset($CORGAN_STORAGE[$var_name][$key])) $CORGAN_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$CORGAN_STORAGE[$var_name][$key][] = $value;
		else
			$CORGAN_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('corgan_storage_merge_array')) {
	function corgan_storage_merge_array($var_name, $key, $value) {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if ($key==='')
			$CORGAN_STORAGE[$var_name] = array_merge($CORGAN_STORAGE[$var_name], $value);
		else
			$CORGAN_STORAGE[$var_name][$key] = array_merge($CORGAN_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('corgan_storage_set_array_after')) {
	function corgan_storage_set_array_after($var_name, $after, $key, $value='') {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if (is_array($key))
			corgan_array_insert_after($CORGAN_STORAGE[$var_name], $after, $key);
		else
			corgan_array_insert_after($CORGAN_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('corgan_storage_set_array_before')) {
	function corgan_storage_set_array_before($var_name, $before, $key, $value='') {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if (is_array($key))
			corgan_array_insert_before($CORGAN_STORAGE[$var_name], $before, $key);
		else
			corgan_array_insert_before($CORGAN_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('corgan_storage_push_array')) {
	function corgan_storage_push_array($var_name, $key, $value) {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($CORGAN_STORAGE[$var_name], $value);
		else {
			if (!isset($CORGAN_STORAGE[$var_name][$key])) $CORGAN_STORAGE[$var_name][$key] = array();
			array_push($CORGAN_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('corgan_storage_pop_array')) {
	function corgan_storage_pop_array($var_name, $key='', $defa='') {
		global $CORGAN_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($CORGAN_STORAGE[$var_name]) && is_array($CORGAN_STORAGE[$var_name]) && count($CORGAN_STORAGE[$var_name]) > 0) 
				$rez = array_pop($CORGAN_STORAGE[$var_name]);
		} else {
			if (isset($CORGAN_STORAGE[$var_name][$key]) && is_array($CORGAN_STORAGE[$var_name][$key]) && count($CORGAN_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($CORGAN_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('corgan_storage_inc_array')) {
	function corgan_storage_inc_array($var_name, $key, $value=1) {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if (empty($CORGAN_STORAGE[$var_name][$key])) $CORGAN_STORAGE[$var_name][$key] = 0;
		$CORGAN_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('corgan_storage_concat_array')) {
	function corgan_storage_concat_array($var_name, $key, $value) {
		global $CORGAN_STORAGE;
		if (!isset($CORGAN_STORAGE[$var_name])) $CORGAN_STORAGE[$var_name] = array();
		if (empty($CORGAN_STORAGE[$var_name][$key])) $CORGAN_STORAGE[$var_name][$key] = '';
		$CORGAN_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('corgan_storage_call_obj_method')) {
	function corgan_storage_call_obj_method($var_name, $method, $param=null) {
		global $CORGAN_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($CORGAN_STORAGE[$var_name]) ? $CORGAN_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($CORGAN_STORAGE[$var_name]) ? $CORGAN_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('corgan_storage_get_obj_property')) {
	function corgan_storage_get_obj_property($var_name, $prop, $default='') {
		global $CORGAN_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($CORGAN_STORAGE[$var_name]->$prop) ? $CORGAN_STORAGE[$var_name]->$prop : $default;
	}
}
?>
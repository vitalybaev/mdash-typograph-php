<?php

namespace Emuravjev\Mdash;

class Typograph extends TypographBase
{
	public $trets = array('Quote', 'Dash', 'Symbol', 'Punctmark', 'Number',  'Space', 'Abbr',  'Nobr', 'Date', 'OptAlign', 'Etc', 'Text');

	protected $group_list  = array(
		'Quote'     => true,
		'Dash'      => true,
		'Nobr'      => true,
		'Symbol'    => true,
		'Punctmark' => true,
		'Number'    => true,
		'Date'      => true,
		'Space'     => true,
		'Abbr'      => true,
		'OptAlign'  => true,
		'Text'      => true,
		'Etc'       => true,
	);
	protected $all_options = array(

		'Quote.quotes' => array( 'description' => 'Расстановка «кавычек-елочек» первого уровня', 'selector' => "Quote.*quote" ),
		'Quote.quotation' => array( 'description' => 'Внутренние кавычки-лапки', 'selector' => "Quote", 'setting' => 'no_bdquotes', 'reversed' => true ),

		'Dash.to_libo_nibud' => 'direct',
		'Dash.iz_za_pod' => 'direct',
		'Dash.ka_de_kas' => 'direct',

		'Nobr.super_nbsp' => 'direct',
		'Nobr.nbsp_in_the_end' => 'direct',
		'Nobr.phone_builder' => 'direct',
		'Nobr.phone_builder_v2' => 'direct',
		'Nobr.ip_address' => 'direct',
		'Nobr.spaces_nobr_in_surname_abbr' => 'direct',
		'Nobr.dots_for_surname_abbr' => 'direct',
		'Nobr.nbsp_celcius' => 'direct',
		'Nobr.hyphen_nowrap_in_small_words' => 'direct',
		'Nobr.hyphen_nowrap' => 'direct',
		'Nobr.nowrap' => array('description' => 'Nobr (по умолчанию) & nowrap', 'disabled' => true, 'selector' => '*', 'setting' => 'nowrap' ),

		'Symbol.tm_replace'     => 'direct',
		'Symbol.r_sign_replace' => 'direct',
		'Symbol.copy_replace' => 'direct',
		'Symbol.apostrophe' => 'direct',
		'Symbol.degree_f' => 'direct',
		'Symbol.arrows_symbols' => 'direct',
		'Symbol.no_inches' => array( 'description' => 'Расстановка дюйма после числа', 'selector' => "Quote", 'setting' => 'no_inches', 'reversed' => true ),

		'Punctmark.auto_comma' => 'direct',
		'Punctmark.hellip' => 'direct',
		'Punctmark.fix_pmarks' => 'direct',
		'Punctmark.fix_excl_quest_marks' => 'direct',
		'Punctmark.dot_on_end' => 'direct',

		'Number.minus_between_nums' => 'direct',
		'Number.minus_in_numbers_range' => 'direct',
		'Number.auto_times_x' => 'direct',
		'Number.simple_fraction' => 'direct',
		'Number.math_chars' => 'direct',
		'Number.thinsp_between_number_triads' => 'direct',
		'Number.thinsp_between_no_and_number' => 'direct',
		'Number.thinsp_between_sect_and_number' => 'direct',

		'Date.years' => 'direct',
		'Date.mdash_month_interval' => 'direct',
		'Date.nbsp_and_dash_month_interval' => 'direct',
		'Date.nobr_year_in_date' => 'direct',

		'Space.many_spaces_to_one' => 'direct',
		'Space.clear_percent' => 'direct',
		'Space.clear_before_after_punct' => array( 'description' => 'Удаление пробелов перед и после знаков препинания в предложении', 'selector' => 'Space.remove_space_before_punctuationmarks'),
		'Space.autospace_after' => array( 'description' => 'Расстановка пробелов после знаков препинания', 'selector' => 'Space.autospace_after_*'),
		'Space.bracket_fix' => array( 'description' => 'Удаление пробелов внутри скобок, а также расстановка пробела перед скобками',
				'selector' => array('Space.nbsp_before_open_quote', 'Punctmark.fix_brackets')),

		'Abbr.nbsp_money_abbr' => array( 'description' => 'Форматирование денежных сокращений (расстановка пробелов и привязка названия валюты к числу)',
				'selector' => array('Abbr.nbsp_money_abbr', 'Abbr.nbsp_money_abbr_rev')),
		'Abbr.nobr_vtch_itd_itp' => 'direct',
		'Abbr.nobr_sm_im' => 'direct',
		'Abbr.nobr_acronym' => 'direct',
		'Abbr.nobr_locations' => 'direct',
		'Abbr.nobr_abbreviation' => 'direct',
		'Abbr.ps_pps' => 'direct',
		'Abbr.nbsp_org_abbr' => 'direct',
		'Abbr.nobr_gost' => 'direct',
		'Abbr.nobr_before_unit_volt' => 'direct',
		'Abbr.nbsp_before_unit' => 'direct',

		'OptAlign.all' => array( 'description' => 'Все настройки оптического выравнивания', 'hide' => true, 'selector' => 'OptAlign.*'),
		'OptAlign.oa_oquote' => 'direct',
		'OptAlign.oa_obracket_coma' => 'direct',
		'OptAlign.oa_oquote_extra' => 'direct',
		'OptAlign.layout' => array( 'description' => 'Inline стили или CSS' ),

		'Text.paragraphs' => 'direct',
		'Text.auto_links' => 'direct',
		'Text.email' => 'direct',
		'Text.breakline' => 'direct',
		'Text.no_repeat_words' => 'direct',


		//'Etc.no_nbsp_in_nobr' => 'direct',
		'Etc.unicode_convert' => array('description' => 'Преобразовывать html-сущности в юникод', 'selector' => array('*', 'Etc.nobr_to_nbsp'), 'setting' => array('dounicode','active'), 'exact_selector' => true ,'disabled' => true),
		'Etc.nobr_to_nbsp' => 'direct',
		'Etc.split_number_to_triads' => 'direct',

	);

	/**
	 * Получить список имеющихся опций
	 *
	 * @return array
	 *     all    - полный список
	 *     group  - сгруппированный по группам
	 */
	public function get_options_list()
	{
		$arr['all'] = array();
		$bygroup = array();
		foreach($this->all_options as $opt => $op)
		{
			$arr['all'][$opt] = $this->get_option_info($opt);
			$x = explode(".",$opt);
			$bygroup[$x[0]][] = $opt;
		}
		$arr['group'] = array();
		foreach($this->group_list as $group => $ginfo)
		{
			if($ginfo === true)
			{
				$tret = $this->get_tret($group);
				if($tret) $info['title'] = $tret->title; else $info['title'] = "Не определено";
			} else {
				$info = $ginfo;
			}
			$info['name'] = $group;
			$info['options'] = array();
			if(is_array($bygroup[$group])) foreach($bygroup[$group] as $opt) $info['options'][] = $opt;
			$arr['group'][] = $info;
		}
		return $arr;
	}


	/**
	 * Получить информацию о настройке
	 *
	 * @param string $key
	 * @return array|false
	 */
	protected function get_option_info($key)
	{
		if(!isset($this->all_options[$key])) return false;
		if(is_array($this->all_options[$key])) return $this->all_options[$key];

		if(($this->all_options[$key] == "direct") || ($this->all_options[$key] == "reverse"))
		{
			$pa = explode(".", $key);
			$tret_pattern = $pa[0];
			$tret = $this->get_tret($tret_pattern);
			if(!$tret) return false;
			if(!isset($tret->rules[$pa[1]])) return false;
			$array = $tret->rules[$pa[1]];
			$array['way'] = $this->all_options[$key];
			return $array;
		}
		return false;
	}


	/**
	 * Установка одной метанастройки
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public function do_setup($name, $value)
	{
		if(!isset($this->all_options[$name])) return;

		// эта настрока связана с правилом ядра
		if(is_string($this->all_options[$name]))
		{
			$this->set($name, "active", $value );
			return ;
		}
		if(is_array($this->all_options[$name]))
		{
			if(isset($this->all_options[$name]['selector']))
			{
				$settingname = "active";
				if(isset($this->all_options[$name]['setting'])) $settingname = $this->all_options[$name]['setting'];
				$this->set($this->all_options[$name]['selector'], $settingname, $value, isset($this->all_options[$name]['exact_selector']));
			}
		}

		if($name == "OptAlign.layout")
		{
			if($value == "style") $this->set_tag_layout(Lib::LAYOUT_STYLE);
			if($value == "class") $this->set_tag_layout(Lib::LAYOUT_CLASS);
		}

	}

	/**
	 * Запустить типограф со стандартными параметрами
	 *
	 * @param string $text
	 * @param array $options
	 * @return string
	 */
	public static function fast_apply($text, $options = null)
	{
		$obj = new self();
		if(is_array($options)) $obj->setup($options);
		$obj->set_text($text);
		return $obj->apply();
	}
}

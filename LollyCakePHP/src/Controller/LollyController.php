<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class LollyController extends AppController
{
	public function index()
	{
		$langlist = TableRegistry::get('Languages')->find()->where('LANGID > 0')->all();
		$this->set("langlist", $langlist);
	}
	
	public function dictList()
	{
		$this->autoRender = false;
		$langid = $this->request->data('selectedLangID');
		$dictList = TableRegistry::get('Dictall')->find()->where('LANGID = ' . $langid)->all();
		foreach($dictList as $dict) {
	    	echo '<option>' . $dict['DICTNAME'] . '</option>';
	    }
	}
	
	public function dictUrl()
	{
		$this->autoRender = false;
		$langid = $this->request->data('selectedLangID');
		$dictname = $this->request->data('selectedDictName');
		$word = $this->request->data('word');
		$dictList = TableRegistry::get('Dictall')->find()
			->where('LANGID = ' . $langid)
			->andWhere("DICTNAME = '$dictname'")->all();
		foreach($dictList as $dict) {
	    	echo $dict['URL'];
	    }
	}
}
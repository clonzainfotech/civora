<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\Admin\AdminController;

class AppHtmlController extends AdminController
{
	public function getting_pragnant()
	{
    	return view('Apphtml.getting_pragnant');	
	}
	public function pre_pregnancy()
	{
    	return view('Apphtml.pre_pregnancy');	
	}
	public function pregnancy_after()
	{
    	return view('Apphtml.pregnancy_after');	
	}
	public function prenatal_vitamins()
	{
    	return view('Apphtml.prenatal_vitamins');	
	}
	public function pregnancy_tests()
	{
    	return view('Apphtml.pregnancy_tests');	
	}
	public function early_pregnancy()
	{
    	return view('Apphtml.early_pregnancy');	
	}
	public function about_candor()
	{
    	return view('Apphtml.about_candor');	
	}
	
	public function what_to_expect()
	{
    	return view('Apphtml.Trimster.First.what_to_expect');	
	}
	public function weeks_1_4()
	{
    	return view('Apphtml.Trimster.First.weeks_1-4');	
	}
	public function weeks_5_8()
	{
    	return view('Apphtml.Trimster.First.weeks_5-8');	
	}
	public function weeks_9_12()
	{
    	return view('Apphtml.Trimster.First.weeks_9-12');	
	}

	public function first_trimester_tests()
	{
		return view('Apphtml.Trimster.First.first_trimester_tests');
	}

	public function whta_to_expect_second()
	{
    	return view('Apphtml.Trimster.Second.whta_to_expect_second');	
	}

	public function weeks_13_16()
	{
		return view('Apphtml.Trimster.Second.weeks_13-16');
	}

	public function weeks_36_40()
	{
    	return view('Apphtml.Trimster.Third.weeks_36-40');	
	}
	public function weeks_41()
	{
    	return view('Apphtml.Trimster.Third.weeks_41');	
	}
	
	public function weeks_26_30()
	{
    	return view('Apphtml.Trimster.Third.weeks_26-30');	
		
	}
	public function weeks_31_35()
	{
    	return view('Apphtml.Trimster.Third.weeks_31-35');	
	}
	public function weeks_21_25()
	{
    	return view('Apphtml.Trimster.Second.weeks_21-25');	
	}
	public function weeks_17_20()
	{
    	return view('Apphtml.Trimster.Second.weeks_17-20');	
	}

	

	

	

}

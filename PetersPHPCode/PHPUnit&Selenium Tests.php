<?php
//Coded by Peter Nabiswa
//Source: https://www.sitepoint.com/using-the-selenium-web-driver-api-with-phpunit/

   class HouseRegistrationTest extends PHPUnit_Extensions_Selenium2TestCase {
		public function setUp(){
			$this->setHost('localhost');
			$this->setPort(4444);
			$this->setBrowserUrl('https://freshselect.000webhostapp.com/Registeration');
			$this->setBrowser('chrome');
		}
    
		public function validInputs(){
			$inputs[] = [
				[
					'houseName' => 'Lowrey',
					'houseGender' => 'M',
					'spotsAvailable' => '17',
					'spotsFilled' => '0',
				]
			];

			return $inputs;
		}
		
		public function inValidInputs(){
			$inputs[] = [
				[
					'houseName' => '@@Lowrey',
					'houseGender' => '3',
					'spotsAvailable' => '17',
					'spotsFilled' => '0',
				], "houseGender should only have text!"
			];

			return $inputs;
		}
		public function TotalnumOfSpotsAvailable(){
			
			
		}
		
		public function FormSubmissionTestWithhouseName(){
			$this->byName('houseName')->value('Lowrey');
			$this->byId('HouseUpdate')->submit();
			$content = $this->byTag('body')->text();
			$this->assertEquals('Test Successful!!', $content);
		}

		public function fillFormAndSubmit(array $inputs){
			$form = $this->byId('HouseUpdate');
			foreach ($inputs as $input => $value) {
				$form->byName($input)->value($value);
			}
			$form->submit();
		}

		/**
		* @dataProvider validInputs
		*/
		public function ValidSubmissionTest(array $inputs){
			$this->url('/');
			$this->fillFormAndSubmit($inputs);
			$content = $this->byTag('body')->text();
			$this->assertEquals('Test Successful!!', $content);
		}
		/**
		* @dataProvider inValidInputs
		*/
		public function InvalidSubmissionTest(array $inputs, $errorMessage)
		{
			$this->url('https://freshselect.000webhostapp.com/Registeration');
			$this->fillFormAndSubmit($inputs);
			$errorDiv = $this->byCssSelector('.alert.alert-danger');
			$this->assertEquals($errorMessage, $errorDiv->text());
		}
     
	}

?>
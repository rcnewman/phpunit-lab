<?php
require_once __DIR__ . '/../classes/BookSearch.php';

class BookSearchTest extends PHPUnit_Framework_TestCase {
	public $books;

	public function setUp()
	{
		$this->books = [
  			[ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
  			[ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
  			[ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
  			[ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
  			[ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
  			[ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
			[ 'title' => 'Head First Java', 'pages' => 200 ]
		];
	}
	public function test_case_insensitive()
	{
		$search = new BookSearch($this->books);
		$results = $search->find('javascript');
		$expected = [
			[ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
  			[ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
  			[ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
		];
		$this->assertEquals($expected, $results);
	}
	public function test_case_sensitive()
	{
		$search = new BookSearch($this->books);

		// returns [ 'title' => JavaScript Web Applications', 'pages' => 99 ]
		$results = $search->find('javascript web applications', true);
		$expected = [[ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]];
		$this->assertEquals($expected, $results);
	}
	public function test_doesnt_exist()
	{
		$search = new BookSearch($this->books);
		// returns false
		$results = $search->find('The Definitive Guide to Symfony', true);
		$this->assertFalse($results);
	}

}

?>
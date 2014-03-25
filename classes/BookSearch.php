<?php

class BookSearch {
	
	protected $books;

	public function __construct($books)
	{
		$this->books = $books;
	}	
	public function find($query,$exactmatch = false)
	{
		$array = [];
		if($exactmatch == false)
		{
			foreach($this->books as $book){
				if(stristr($book["title"], $query) !== FALSE){
					array_push($array,$book);
				}
			}
		} else {
			foreach($this->books as $book){
				if(strtoLower($book["title"]) == strtoLower($query)){
					array_push($array,$book);
				}
			}
		}
		if(empty($array)){
			return false;
		}
		return $array;
	}
	
}
?>
<?php
class WordCard {
	private $id = 0;
	private $name = '';
	private $authorId = 0;
	private $description = '';
	private $category = 0;
	private $created = '';

	public function __construct($result = array()) {
		$this->id = $result['id'];
		$this->name = $result['name'];
		$this->authorId = $result['author_id'];
		$this->descrition = $result['description'];
		$thos->category = $result['category'];
		$this->created = $result['created'];
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getAuthorId() {
		return $this->authorId;
	}

	public function getCategory() {
		return $this->category;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getCreated() {
		return $this->created;
	}

	public function &setId($id) {
		$this->id = $id;
		return $this;
	}

	public function &setName($name) {
		$this->name = $name;
		return $this;
	}

	public function &setAuthorId($authorId) {
		$this->authorId = $authorId;
		return $this;
	}

	public function &setDescription($description) {
		$this->description = $description;
		return $this;
	}

	public function &setCategory($category) {
		$this->category = $category;
		return $this;
	}

	public function &setCreated($created) {
		$this->created = $created;
		return $this;
	}
}

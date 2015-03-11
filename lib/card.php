<?php
class Card {
	private $id = 0;
	private $title = '';
	private $authorId = 0;
	private $category = 0;
	private $created = '';
	private $modified = '';

	public function __construct($id = 0, $title = '', $authorId = 0, $category = 0, $created = '', $modified = '') {
		$this->id = $id;
		$this->title = $title;
		$this->authorId = $authorId;
		$this->category = $category;
		$this->created = $created;
		$this->modified = $modified;
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getAuthorId() {
		return $this->authorId;
	}

	public function getCategory() {
		return $this->category;
	}

	public function getCreated() {
		return $this->created;
	}

	public function getModified() {
		return $this->modified;
	}

	public function &setId($id) {
		$this->id = $id;
		return $this;
	}

	public function &setTitle($title) {
		$this->title = $title;
		return $this;
	}

	public function &setAuthorId($authorId) {
		$this->authorId = $authorId;
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

	public function &setModified($modified) {
		$this->modified = $modified;
		return $this;
	}
}

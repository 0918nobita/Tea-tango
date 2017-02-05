<?php
class Wordcard {
	private $id = 0;
	private $name = '';
	private $authorId = 0;
	private $description = '';
	private $category = 0;
	private $created = '';

	public function __construct($result = array()) {
		$this->id = isset($result['id']) ? $result['id'] : 0;
		$this->name = isset($result['name']) ? $result['name'] : '';
		$this->authorId = isset($result['author_id']) ? $result['author_id'] : 0;
		$this->descrition = isset($result['description']) ? $result['description'] : '';
		$this->category = isset($result['category']) ? $result['category'] : 0;
		$this->created = isset($result['created']) ? $result['created'] : '';
	}

	public static function find($id) {
		$sql = 'select * from wordcards where id = ?';
		$sth = connectDb()->prepare($sql);
		$sth->execute(array($id));
		$result = $sth->fetch();
		$wordcard = new self($result);
		return $wordcard;
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

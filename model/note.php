<?php 

class Note {
	private $table;
	private $conection;

	public function __construct() 
	{
		$this->table = 'notes';
	}
	/* Set conection */
	public function getConection()
	{
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all notes */
	public function getNotes()
	{
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/* Get note by id */
	public function getNoteById($id)
	{
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);
		return $stmt->fetch();
	}
	/* Save note */
	public function save($param)
	{
		$this->getConection();
		/* Set default values */
		$title = $content = "";
		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !='')
		{
			$actualNote = $this->getNoteById($param["id"]);
			if(isset($actualNote["id"]))
			{
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$title = $actualNote["title"];
				$content = $actualNote["content"];
			}
		}
		/* Received values */
		if(isset($param["title"])) $title = $param["title"];
		if(isset($param["content"])) $content = $param["content"];
		/* Database operations */
		if($exists)
		{
			$sql = "UPDATE ".$this->table. " SET title=?, content=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$title, $content, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (title, content) values(?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$title, $content]);
			$id = $this->conection->lastInsertId();
		}	
		return $id;	
	}
	/* Delete note by id */
	public function deleteNoteById($id)
	{
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}
}

?>
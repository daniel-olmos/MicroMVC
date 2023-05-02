<?php 

require_once 'model/note.php';

class noteController{
	public $page_title;
	public $view;
	private $noteObj;

	public function __construct() {
		$this->view = 'list_note';
		$this->page_title = '';
		$this->noteObj = new Note();
	}

	/* List all notes */
	public function list(){
		$this->page_title = 'Listado de notas';
		return $this->noteObj->getNotes();
	}

	/* Load note for edit */
	public function edit($id = null){
		$this->page_title = 'Editar nota';
		$this->view = 'edit_note';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->noteObj->getNoteById($id);
	}

	/* Create or update note */
	public function save(){
		$this->view = 'edit_note';
		$this->page_title = 'Editar nota';
		$id = $this->noteObj->save($_POST);
		$result = $this->noteObj->getNoteById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar nota';
		$this->view = 'confirm_delete_note';
		return $this->noteObj->getNoteById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de notas';
		$this->view = 'delete_note';
		return $this->noteObj->deleteNoteById($_POST["id"]);
	}

}

?>
<?php


use App\SQLiteConnection;

class deleteClass
{
    private $data_request;
    private $url_request;
    private $result;
    private $conn;

    public function getConn() {
		return $this->conn;
	}

	public function setConn($value) {
		$this->conn = $value;
	}

    public function getData_request()
    {
        return $this->data_request;
    }

    public function setData_request($value)
    {
        $this->data_request = $value;
    }

    public function getUrl_request()
    {
        return $this->url_request;
    }

    public function setUrl_request($value)
    {
        $this->url_request = $value;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($value)
    {
        $this->result = $value;
    }

    public function __construct($data)
    {
        $this->data_request = $data;
        $this->url_request = $_SERVER['REQUEST_URI'];
    }

    public function deleteMethod()
    {
        $this->conn = (new SQLiteConnection())->connect();
        if ($this->conn == null) {
            echo 'Whoops, could not connect to the SQLite database!';
        }

        switch ($this->url_request) {
            case "/delete-user":
                $this->result = $this->deleteUsers();
                // no break
            case "/user/delete-messages":
                $this->result = $this->deleteUserMessages();
                // no break
            case "/group/delete-users":
                $this->result = $this->deleteUserGroups();
                // .
                // .
                // .
        }

        echo $this->result;
    }

    public function deleteUsers()
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $this->data_request->user_id);
        $result = $stmt->execute();

        if ($result) {
            $response = array('status' => 'success', 'message' => 'User deleted successfully.');
            echo $response;
        }

        $response = array('status' => 'error', 'message' => 'Failed to delete user.');
        echo $response;
    }

    public function deleteUserMessages()
    {
    }

    public function deleteUserGroups()
    {
    }

    public function deleteGroups()
    {
    }

    public function deleteUserGroupMessages()
    {
    }

    public function deleteUserFiles()
    {
    }

    public function deleteGroupFiles()
    {
    }
}

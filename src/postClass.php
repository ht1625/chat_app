<?php


use App\SQLiteConnection;

class postClass
{
    private $data_request;
    private $url_request;
    private $result;
    private $conn;

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($value)
    {
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

    public function postMethod()
    {
        $this->conn = (new SQLiteConnection())->connect();
        if ($this->conn == null) {
            echo 'Whoops, could not connect to the SQLite database!';
        }

        switch ($this->url_request) {
            case "/set-user":
                $this->result = $this->setUserMessages();
                // no break
            case "/user/set-messages":
                $this->result = $this->setUsers();
                // no break
            case "/group/set-users":
                $this->result = $this->setUserGroups();
                // .
                // .
                // .
        }

        echo $this->result;
    }

    public function setUserMessages()
    {
        $stmt = $this->conn->prepare("INSERT INTO user_messages (user_id, message) VALUES (:user, :message)");
        $stmt->bindParam(':user', $this->data_request->user);
        $stmt->bindParam(':message', $this->data_request->message);
        $result = $stmt->execute();

        if ($result) {
            $response = array('status' => 'success', 'message' => 'Message added successfully.');
            echo $response;
        }

        $response = array('status' => 'error', 'message' => 'Failed to save message.');
        echo $response;
    }

    public function setUsers()
    {
    }

    public function setUserGroups()
    {
    }

    public function setUserOnlineStatus()
    {
    }

    public function setGroups()
    {
    }

    public function setUserGroupMessages()
    {
    }
}

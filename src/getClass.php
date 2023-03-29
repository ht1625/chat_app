<?php


use App\SQLiteConnection;

class getClass
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

    public function getMethod()
    {
        $this->conn = (new SQLiteConnection())->connect();
        if ($this->conn == null) {
            echo 'Whoops, could not connect to the SQLite database!';
        }

        switch ($this->url_request) {
            case "/get-user":
                $this->result = $this->getUsers();
                // no break
            case "/user/get-messages":
                $this->result = $this->getUserMessages();
                // no break
            case "/group/get-users":
                $this->result = $this->getUserGroups();
                // .
                // .
                // .
        }

        echo $this->result;
    }

    public function getUsers()
    {
        $result = "";
        
        try{
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE user_id = :id');
            $stmt->bindParam(':id', $this->data_request->user_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $exception){
            $result = array('status' => 'error', 'message' => $exception->getMessage());
        }

        echo $result;

    }

    public function getUserMessages()
    {
    }

    public function getUserGroups()
    {
    }

    public function getUserOnlineStatus()
    {
    }

    public function getGroups()
    {
    }

    public function getMessageGroups()
    {
    }

    public function getUserFiles()
    {
    }

    public function getGroupFiles()
    {
    }
}

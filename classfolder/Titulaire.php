<?php
class Titulaire{
    private string $lastname;
    private string $firstname;
    private DateTime $birthday;
    private string $city;
    private array $account;

    //function __construct is the constructor used for create a new object
    public function __construct(string $lastname, string $firstname, string $birthday, string $city){
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->birthday = new DateTime($birthday);
        $this->city = $city;
        $this->account = [];
    }

    //function getFullName is used for reutrn the last name and first name
    public function getFullName(){
        return "$this->lastname $this->firstname";
    }

    //function addAccount is used to add the new account created in the array
    public function addAccount($newAccount){
        $this->account[] = $newAccount;
    }

    //function getLastname is used for return the last name
    public function getLastname(){
        return $this->lastname;
    }

    //function getFirstname is used for return the first name
    public function getFirstname(){
        $date = $this->birthday->format('d,m,Y');
        return $this->firstname;
    }
    
    //function getBirthday is used for return the birthday date
    public function getBirthday(){
        return $this->birthday;
    }

    //function getDate is used for return the birthday date but in string
    public function getDate(){
        $date = $this->birthday->format('d,m,Y');
        return $date;
    }

    //function setLastname is used for set to last name a new value
    public function setLastname($newValue){
        $this->lastname = $newValue;
    }

    //function setFirstname is used for set to first name a new value
    public function setFirstname($newValue){
        $this->firstname = $newValue;
    }

    //function setBirthday is used for set to birthday a new value
    public function setBirthday($newValue){
        $this->birthday = new DateTime($newValue);
    }

    //function getAge is used for return the age
    public function getAge(){
        $today = new DateTime();
        $date = $this->birthday;
        $age = $today->diff($date)->y;
        return $age;
    }

    //function getInformation is used for return all the infomation we need
    public function getInformation(){
        $date = $this->getDate();
        $age = $this->getAge();
        echo "Le titulaire $this->lastname $this->firstname née le $date agé de $age ans <br><br> Liste des comptes: <br> ";
        foreach($this->account as $value){
            echo "- $value <br>";
        }
    }

    //function __toString is a magic function used for return all the value in string
    public function __toString(){
        return $this->lastname ." ". $this->firstname ." ". $this->birthday ." ". $this->city;
    }

}

?>
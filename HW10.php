<?php
abstract class Shape {
    abstract public function calculateArea();
}
class Circle extends Shape {
    protected $radian;
    public function __construct($radian) {
      $this->radian = $radian;
    }
    public function calculateArea() {
    return 3.14 * pow($this->radian, 2);
        }
  }
class Rectangle extends Shape {
    protected $length;
    protected $width;
 public function __construct($length, $width) {
    $this->length = $length;
    $this->width = $width;
}
public function calculateArea() {
return ($this->length + $this->width) * 2;
    }
}
$less1_1 = new Circle(10);
$less1_2 = new Rectangle(3, 4);
echo $less1_1->calculateArea()."<br>";
echo $less1_2->calculateArea()."<br>";

//bai2
abstract class Animal {
    abstract public function makeSound();
}
    class Dog extends Animal {
        public function makeSound() {
          echo "Woof!";
        }
    }
    class Cat extends Animal {
        public function makeSound() {
            echo "Meo!";
        }
    }
$less2_1 = new Dog();
$less2_2 = new Cat();
echo $less2_1->makeSound()."<br>";
echo $less2_2->makeSound()."<br>";

//bai3
abstract class Employee {
    abstract public function name();
    abstract public function salary();
}
class Manager extends Employee {
    protected $name;
    protected $salary;
    public function __construct($name, $salary) {
      $this->name = $name;
      $this->salary = $salary;
    }
    public function name() {
    // echo $this->name;
        }
    public function salary() {
        // echo $this->salary;
        }
    public function getInf() {
        echo $this->name;
        echo $this->salary;
        }
  }
class Staff extends Employee {
 public function __construct($name, $salary) {
    $this->name = $name;
    $this->salary = $salary;
}
    public function name() {
        // echo $this->name;
            }
    public function salary() {
        // echo $this->salary;
    }
    public function getInf() {
        echo $this->name;
        echo $this->salary;
        }
}
$less3_1 = new Manager("toan", "10tr");
$less3_2 = new Staff("toan", "10tr");
echo $less3_1->getInf()."<br>";
echo $less3_2->getInf()."<br>";

//bai4
abstract class Vehicle {
    abstract public function start();
}
    class Car extends Vehicle {
        public function start() {
          echo "Starting car!";
        }
    }
    class Motorcycle extends Vehicle {
        public function start() {
            echo "Starting motorcycle!";
        }
    }
$less4_1 = new Car();
$less4_2 = new Motorcycle();
echo $less4_1->start()."<br>";
echo $less4_2->start()."<br>";

//bai5
abstract class Database {
    abstract public function connect();
    abstract public function query($query, $params = []);
    abstract public function disconnect();
}
class MySQLDatabase extends Database {
	
        public	$isConn;
        protected	$datab;
        
        //CONNECT TO DB
        public	function connect($host = "localhost", $user = "root", $pass = "", $dbname = "deha", $options = [])
        {
            $this->isConn = TRUE;
            try {
                $this->datab = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, $options);
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        
        public	function	disconnect()
        {
            $this->isConn = FALSE;
            $this->datab = NULL;
        }
        
        public	function	query($query, $params = [])
        {
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return TRUE;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

// $query = "INSERT INTO products (name, price, category_id) VALUES (:name, :price, :ca_id)";
// $params = ['name'=>'Dep', 'price'=>'25.100', 'ca_id'=>3];
// $less5_1 = new MySQLDatabase();
// $less5_1->connect($host = "localhost", $user = "root", $pass = "", $dbname = "deha", $options = []);
// $less5_1->query($query, $params)."<br>";
// $less5_1->disconnect();

//bai1
interface Resizable {
    public function resize();
}
class Rectangle1 implements Resizable {
    protected $length, $width;
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }
    public function resize() {
        echo "resize length is: ". $this->length. "<br>";
        echo " resize width is: ". $this->width. "<br>";
    }
}
$less6_1 = new Rectangle1(3, 4);
echo $less6_1->resize();

//bai2 
interface Logger {
    public function logInfo();
    public function logWarning();
    public function logError();
}
class FileLogger implements Logger {
    public function logInfo() {

    }
    public function logWarning() {
        
    }
    public function logError() {
        
    }
    protected $log;
    public function __construct($log) {
        $this->log = $log;
        $this->logInfo();
        $this->logWarning();
        $this->logError();
    }
    public function getLog() {
        return $this->log;
    }
}
class DatabaseLogger implements Logger {
    public function logInfo() {

    }
    public function logWarning() {
        
    }
    public function logError() {
        
    }
    protected $log;
    public function __construct($log) {
        $this->log = $log;
        $this->logInfo();
        $this->logWarning();
        $this->logError();
    }
    public function getLog() {
        return $this->log;
    }
}
$less7_1 = new FileLogger("bug...1");
$less7_2 = new DatabaseLogger("bug...2");
echo $less7_1->getLog(). "<br>";
echo $less7_2->getLog(). "<br>";

//bai3
interface Drawable {
    public function draw();
}
class Circle1 implements Drawable {
    public function draw() {
        return "Drawing a circle:...";
    }
}
class Square1 implements Drawable {
    public function draw() {
        return "Drawing a square:...";
    }
}
$less8_1 = new Circle1();
$less8_2 = new Square1();
$draws = [$less8_1, $less8_2];
foreach($draws as $draw)
echo $draw->draw(). "<br>";

//bai4
interface Sortable {
    public function getSort();
}
class ArraySorter implements Sortable {
    protected $arr;
    public function __construct($arr) {
        $this->arr = $arr;
    }
    public function getSort() {
        sort($this->arr);
        return $this->arr;
    }
}
class LinkedListSorter implements Sortable {
    protected $arr;
    public function __construct($arr) {
        $this->arr = $arr;
    }
    public function getSort() {
        sort($this->arr);
        return $this->arr;
    }
}
$arr1 = [5,6,4,1];
$arr2 = ["Volvo", "BMW", "Toyota"];
$less9_1 = new ArraySorter($arr1);
$less9_2 = new LinkedListSorter($arr2);
$result1 = $less9_1->getSort();
$result2 = $less9_2->getSort();
echo implode(", ", $result1). "<br>";
echo implode(", ", $result2). "<br>";
?>
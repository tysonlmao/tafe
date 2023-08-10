<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>variables</title>
</head>
<body>
    <h2>variables</h2>
    <?php
    /**
     * vars in php start with a dollar $ sign
     * variables names dont start with a number
     * variables are case sensitive 
     */

     $x = "hi";
     echo "<p>hi $x</p>";

     $foo = array("banana", "apple", "pear");
     echo $foo[0];

     /**
      * classes and objects
      */
      class Student {
        public $name;
        public $age;
        public function __construct($name, $age) {
          $this->name = $name;
          $this->age = $age;
        }
        public function studentMessage() {
          return "<br> student is: " . $this->name . " with an age of " . $this->age . "!";
        }
      }
      $student = new Student("John Doe", 30);
      echo $student->studentMessage();
// a ?>
</body>
</html>
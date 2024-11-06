<?php
// **Define the `daniel` class**
class daniel { 
    // **Declare public properties for the class**
    public $name; 
    public $age; 
    public $ender; 
    public $speed;

    // **Define a method `eating` that takes a name as an argument and returns a message**
    public function eating($name) { 
        echo "I am eating, my name is $name."; 
        return $this; // **Return $this to allow method chaining**
    } 

    // **Define a method `speed` that takes a name and speed as arguments**
    public function speed($name, $speed, $age) { 
        echo "$age $name running at a speed of $speed km/h."; 
        return $this; // **Return $this to allow method chaining**
    }
}

// **Create an instance of the `daniel` class**
$call_daniel = new Daniel();

// **Set values for the instance properties `name` and `speed`**
$name = $call_daniel->name = "Ceejay Nwachukwu";
$speed = $call_daniel->speed = 1230;
$age = $call_daniel->age = 16;

// **Call the `eating` method and output the result**
$call_daniel->eating($name);
echo '<br>';

// **Call the `speed` method and output the result**
$call_daniel->speed($name, $speed, $age);

?>

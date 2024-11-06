<php

class Attendance {
    public $status1 = 'present';
    public $status2 = 'absent';
    public $name = 'Ceejay';

    public function markattendance (status) {
        return $status;
    }

    public function greet($user) {
        return "greetings $user";
    }
}
    $useattendance = new Attendance();

echo $useattendance->markattendance($useattendance->status1);


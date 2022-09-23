<?php
class PThread extends Thread {
    protected $id = "";
    public function __construct($idThread) {
        $this->id = $idThread;
    }
    public function run() {
        if ($this->id) {
            $sleep = mt_rand(1, 10);
            printf('Thread: %s  has started, sleeping for %d' . "\n", $this->id, $sleep);
            sleep($sleep);
            printf('Thread: %s  has finished' . "\n", $this->id);
        }
    }
}
// Creating the pool of threads(stored as array)
$poolArr = array();
//Initiating the threads
foreach (range("0", "3") as $i) {
    $poolArr[] = new PThread($i);
}
//Start each Thread
foreach ($poolArr as $t) {
    $t->start();
}
//Wait all thread to finish
foreach (range(0, 3) as $i) {
    $poolArr[$i]->join();
}
//Next... other sentences with all threads finished.

?>

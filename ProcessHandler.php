<?php
class ProcessHandler {
    private $query;

    public function __construct($query) {
        $this->query = $query;
    }

    public function processQuery() {
        // Appeler le script Python
        $command = escapeshellcmd('python sympy_api.py ' . escapeshellarg($this->query));
        $output = shell_exec($command);

        return $output;
    }
}
?>
